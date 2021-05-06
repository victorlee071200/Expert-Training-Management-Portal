<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\CurrencyHelper;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $meta_title = "Dashboard";
        $userCount = DB::table('users')->count();
        $courseCount = DB::table('courses')->count();
        $currency = CurrencyHelper::getCurrencyString();
        $salesTotalSum = DB::table('orders')->sum('price');
        $salesTotalSum = CurrencyHelper::getSetPriceFormat($salesTotalSum);
        $orderSum = DB::table('orders')->count();

        return view('admin.dashboard', compact('meta_title', 'userCount', 'courseCount', 'currency', 'salesTotalSum', 'orderSum'));
    }
}
