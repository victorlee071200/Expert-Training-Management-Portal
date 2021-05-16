<?php

namespace App\Http\Controllers\NewController;

use Braintree;
use App\Models\Program;
use App\Models\Order\Order;
use App\Models\ClientProgram;
use Illuminate\Http\Request;
use App\Helpers\CurrencyHelper;
use App\Models\Country\Country;
use App\Models\Setting\Setting;
use App\Helpers\OrderDataHelper;
use App\Rules\OnlyAsciiCharacters;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\UserProgram\UserProgram;
use Illuminate\Support\Facades\Validator;
use App\Models\PaymentGateway\StripeSetting;
use App\Models\PaymentGateway\BraintreeSetting;

class CheckoutController extends Controller
{
    public function index($programSlug)
    {
        $program = Program::where('slug', $programSlug)->first();
        if(is_null($program))
        {
            abort(403, 'Invalid program!');
        }

        $authUser = Auth::user();
        $userProgram = UserProgram::where('user_id', $authUser->id)->where('program_id', $program->id)->first();
        if( (!is_null($userProgram)) && ($authUser->role->id != 1) )
        {
            abort(403, 'You already have access to this program!');
        }

        $countries = Country::with('statesInOrder')->orderBy('name', 'ASC')->get();

        $email = $authUser->email;

        $settings = Setting::first();
        if(is_null($settings))
        {
            abort(403, 'Settings not found!');
        }
        $currencyTextRaw = $settings->currency;
        $currency = CurrencyHelper::getCurrencyString();
        $braintreeEnabled = $settings->enable_braintree;
        $stripeEnabled = $settings->enable_stripe;
        $payPalSmartEnabled = $settings->enable_paypal_smart;

        $btToken = "";
        $brainTreeLabel = "Credit card by Braintree";
        if($braintreeEnabled)
        {
            $payPalWithinBraintreeEnabled = $settings->enable_paypal_in_bt;
            if($payPalWithinBraintreeEnabled)
            {
                $brainTreeLabel = "Credit Card and PayPal by Braintree";
            }

            $btSettings = BraintreeSetting::first();
            if(is_null($btSettings))
            {
                abort(403, 'Braintree settings not found!');
            }
            if( $btSettings->braintree_environment == 'sandbox' )
            {
                $gateway = new Braintree\Gateway([
                    'environment' => $btSettings->braintree_environment,
                    'merchantId' => $btSettings->braintree_sandbox_merchant_id,
                    'publicKey' => $btSettings->braintree_sandbox_public_key,
                    'privateKey' => $btSettings->braintree_sandbox_private_key
                ]);
            }
            else
            {
                $gateway = new Braintree\Gateway([
                    'environment' => $btSettings->braintree_environment,
                    'merchantId' => $btSettings->braintree_production_merchant_id,
                    'publicKey' => $btSettings->braintree_production_public_key,
                    'privateKey' => $btSettings->braintree_production_private_key
                ]);
            }

            $btToken = $gateway->ClientToken()->generate();
        }

        $stripePubKey = "";
        if($stripeEnabled)
        {
            $stripeSettings = StripeSetting::first();
            if(is_null($stripeSettings))
            {
                abort(403, 'Stripe settings not found!');
            }
            if($stripeSettings->stripe_environment == "test")
            {
                $stripePubKey = $stripeSettings->stripe_test_publishable_key;
            }
            else
            {
                $stripePubKey = $stripeSettings->stripe_live_publishable_key;
            }
        }


        return view('client.new.checkout.index', compact('program', 'countries', 'email', 'currency',
                                        'braintreeEnabled', 'stripeEnabled', 'payPalSmartEnabled',
                                        'brainTreeLabel', 'btToken', 'stripePubKey', 'currencyTextRaw'));
    }

    public function prePaymentValidation(Request $request, $programId, $programSlug)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => ['required', 'string', 'max:191', new OnlyAsciiCharacters],
            'last_name' => ['required', 'string', 'max:191', new OnlyAsciiCharacters],
            'street' => ['required', 'string', 'max:191'],
            'apartment' => ['nullable', 'string', 'max:191'],
            'phone' => ['nullable', 'string', 'max:191'],
            'city' => ['required', 'string', 'max:191'],
            'state' => ['required', 'string', 'exists:states,state_code'],
            'country' => ['required', 'string', 'exists:countries,code'],
            'zip' => ['required', 'string', 'max:150'],
        ]);

        if( $validator->fails() )
        {
            return response()->json($validator->errors());
        }

        $programToBuy = Program::find($programId);
        if(is_null($programToBuy))
        {
            return response()->json(['error' => 'The program does not exist.']);
        }

        if($programToBuy->slug != $programSlug)
        {
            return response()->json(['error' => 'Discrepancy in program data.']);
        }

        if($programToBuy->price != $request->total)
        {
            return response()->json(['error' => 'Price discrepancy.']);
        }

        return response()->json(['successful_validation' => 'success']);
    }

    public function fulfillOrder(Request $request)
    {
        $user = Auth::user();
        if( is_null($user) )
        {
          return redirect()->back()->withInput()->with('failureMsg', 'Payment received but logged-in user not found!');
        }

        $program = DB::table('programs')->find($request->program);
        if(is_null($program))
        {
            return redirect()->back()->withInput()->with('failureMsg', 'Payment received but the program has not been found!');
        }

        $transactionId = $request->transaction_id;
        $orderData = array();
        OrderDataHelper::getOrderData($orderData, $request, $user, $program->name, $transactionId);
        $order = new Order;
        foreach($orderData as $key => $orderValue)
        {
            $order->$key = $orderData[$key];
        }
        $order->save();

        $clientprogram = ClientProgram::where('user_id', $user->id)->where('program_id', $program->id)->first();
        $clientprogram->payment_status = 'approved';
        $clientprogram->save();

        $userProgram = UserProgram::where('user_id', $user->id)->where('program_id', $program->id)->first();
        if(is_null($userProgram))
        {
            $newUserProgram = new UserProgram;
            $newUserProgram->user_id = $user->id;
            $newUserProgram->program_id = $program->id;
            $newUserProgram->save();

        }

        return redirect()->route('thanks');
    }

    public function showThanks() {
        $user = Auth::user();
        $users = DB::table("users")->where("id", $user->id)->first();
        $program = DB::table("user_programs")->latest()->first();
        $program_details = DB::table("programs")->where("id", $program->program_id)->first();
        $admin = DB::table('users')->where('email', 'kokwei325@gmail.com')->first();

        $data = [
            "user_id" => $users->id,
            'admin_email' =>  $admin->email,
            "user_name" => $users->name,
            "user_email" => $users->email,
            "program_id" => $program_details->id,
            "program_code" => $program_details->code,
            "program_name" => $program_details->name,
        ];

        app('App\Http\Controllers\NewController\ClientJoinEmailNotificationController')->sendEmail($data);

        return view('thank-you');
    }
}
