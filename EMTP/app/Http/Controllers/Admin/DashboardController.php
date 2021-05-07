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
        $programCount = DB::table('programs')->count();
        $currency = CurrencyHelper::getCurrencyString();
        $salesTotalSum = DB::table('orders')->sum('price');
        $salesTotalSum = CurrencyHelper::getSetPriceFormat($salesTotalSum);
        $orderSum = DB::table('orders')->count();

        return view('admin.dashboard.index', compact('meta_title', 'userCount', 'programCount', 'currency', 'salesTotalSum', 'orderSum'));
    }
}
