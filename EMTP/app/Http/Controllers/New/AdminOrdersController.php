<?php

namespace App\Http\Controllers\New;

use App\Models\Order\Order;
use Illuminate\Http\Request;
use App\Helpers\CurrencyHelper;
use App\Http\Controllers\Controller;
use App\Models\UserProgram\UserProgram;

class AdminOrdersController extends Controller
{
    public function index()
    {
        $meta_title = "Order Management";
        $orders = Order::orderBy('id', 'DESC')->paginate(5);
        $currency = CurrencyHelper::getCurrencyString();
        return view('admin.orders', compact('meta_title', 'orders', 'currency'));
    }

    public function destroy(Request $request, $orderId)
    {
        $order = Order::find($orderId);
        if(is_null($order))
        {
            return redirect()->route('admin.orders')->with('failureMsg', 'The Order with the following id could NOT be deleted: ' . $orderId);
        }

        $userPrograms = UserProgram::where('user_id', $order->user_id)->where('program_id', $order->purchased_program_id)->get();
        foreach($userPrograms as $item)
        {
            $item->delete();
        }

        $order->delete();

        return redirect()->route('admin.orders')->with('successMsg', 'The Order with the following id has been successfully deleted: ' . $orderId);
    }
}
