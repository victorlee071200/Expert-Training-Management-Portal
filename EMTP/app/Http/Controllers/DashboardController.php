<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function ClientDashboard()
    {
        return view('client.dashboard.index');
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
