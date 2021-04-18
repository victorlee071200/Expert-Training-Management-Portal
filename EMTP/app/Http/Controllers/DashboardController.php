<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function ClientDashboard()
    {
        $approvedprograms =  DB::table('programs')->where('status', 'approved')->get();
        return view('client.dashboard.index',['approvedprograms'=>$approvedprograms]);
    }

    public function StaffDashboard()
    {
        return view('staff.dashboard.index');
    }

    public function AdminDashboard()
    {
        return view('admin.dashboard.index');
    }


    
}
