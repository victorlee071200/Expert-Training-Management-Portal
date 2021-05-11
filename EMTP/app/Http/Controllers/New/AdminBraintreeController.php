<?php

namespace App\Http\Controllers\New;

use Braintree;
use App\Models\Order\Order;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Helpers\OrderDataHelper;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Helpers\AmountConverterHelper;
use App\Models\UserProgram\UserProgram;
use Illuminate\Support\Facades\Validator;
use App\Models\PaymentGateway\BraintreeSetting;

class AdminBraintreeController extends Controller
{
    public function index()
    {
        $meta_title = "Braintree Settings";
        $braintreeSettings = DB::table('braintree_settings')->first();
        if(is_null($braintreeSettings))
        {
            abort(403, 'Braintree settings not found!');
        }
        return view('admin.payments.braintree', compact('meta_title', 'braintreeSettings'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'braintree_environment' => ['required', Rule::in(['sandbox', 'production'])],
            'braintree_sandbox_merchant_id' => ['nullable', 'string'],
            'braintree_sandbox_public_key' => ['nullable', 'string'],
            'braintree_sandbox_private_key' => ['nullable', 'string'],
            'braintree_production_merchant_id' => ['nullable', 'string'],
            'braintree_production_public_key' => ['nullable', 'string'],
            'braintree_production_private_key' => ['nullable', 'string'],
        ]);

        if( $validator->fails() )
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $braintreeSettings = BraintreeSetting::first();
        if(is_null($braintreeSettings))
        {
            abort(403, 'Braintree Settings not found!');
        }

        $braintreeSettings->fill($request->all());
        $braintreeSettings->save();

        return redirect()->back()->with('successMsg', 'The Braintree Settings have been successfully updated!');
    }

    public function braintreePayment(Request $request)
    {
        $user = Auth::user();
        if( is_null($user) )
        {
          return redirect()->back()->withInput()->with('failureMsg', 'Logged-in user not found!');
        }

        $braintreeSettings = DB::table('braintree_settings')->first();
        if( is_null($braintreeSettings) )
        {
          return redirect()->back()->withInput()->with('failureMsg', 'Braintree settings not found!');
        }

        $program = DB::table('programs')->find($request->program);
        if(is_null($program))
        {
            return redirect()->back()->withInput()->with('failureMsg', 'The program has not been found!');
        }

        if( $braintreeSettings->braintree_environment == 'sandbox' )
        {
            $gateway = new Braintree\Gateway([
                'environment' => $braintreeSettings->braintree_environment,
                'merchantId' => $braintreeSettings->braintree_sandbox_merchant_id,
                'publicKey' => $braintreeSettings->braintree_sandbox_public_key,
                'privateKey' => $braintreeSettings->braintree_sandbox_private_key
            ]);
        }
        else
        {
            $gateway = new Braintree\Gateway([
                'environment' => $braintreeSettings->braintree_environment,
                'merchantId' => $braintreeSettings->braintree_production_merchant_id,
                'publicKey' => $braintreeSettings->braintree_production_public_key,
                'privateKey' => $braintreeSettings->braintree_production_private_key
            ]);
        }

        $total = AmountConverterHelper::getBraintreeAmountBasedOnCurrency($request->total);
        $nonce = $request->nonce;

        $result = $gateway->transaction()->sale([
            'amount' => $total,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success)
        {
            $transaction = $result->transaction;
            if( !is_null($transaction) )
            {
                $transactionId = $transaction->id;
            }
            else
            {
                $transactionId = "000";
            }

            $orderData = array();
            OrderDataHelper::getOrderData($orderData, $request, $user, $program->title, $transactionId);
            $order = new Order;
            foreach($orderData as $key => $orderValue)
            {
                $order->$key = $orderData[$key];
            }
            $order->save();

            $userProgram = DB::table('user_programs')->where('user_id', $user->id)->where('program_id', $program->id)->first();
            if(is_null($userProgram))
            {
                $newUserProgram = new UserProgram;
                $newUserProgram->user_id = $user->id;
                $newUserProgram->program_id = $program->id;
                $newUserProgram->save();
            }

            return redirect()->route('thanks');
        }
        else
        {
            $errorString = "";

            foreach($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }

            return redirect()->back()->withInput()->with('failureMsg', $result->message);
        }
    }
}
