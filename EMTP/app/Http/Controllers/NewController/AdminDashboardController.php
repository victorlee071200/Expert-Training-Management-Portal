<?php

namespace App\Http\Controllers\NewController;

use App\Models\User;
use App\Models\Program;
use App\Models\Order\Order;
use Illuminate\Http\Request;
use App\Helpers\CurrencyHelper;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meta_title = "Dashboard";
        $userCount = User::count();
        $programCount = Program::count();
        $currency = CurrencyHelper::getCurrencyString();
        $salesTotalSum = Order::sum('price');
        $salesTotalSum = CurrencyHelper::getSetPriceFormat($salesTotalSum);
        $orderSum = Order::count();

        return view('admin.dashboard.index', compact('meta_title', 'userCount', 'programCount', 'currency', 'salesTotalSum', 'orderSum'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
