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

    public function ClientViewSpecificProgram(Program $program)
    {
        return view('client.program.view-specific',['program'=>$program]);  
    }   

    public function  ClientViewSpecificRegisteredProgram(ClientProgram $registeredprogram, Program $program)
    {
        $registeredprogram_ = DB::table('client_programs')->where('id', $registeredprogram)->get();
        $program_ =  DB::table('programs')->where('id', $program)->get();
        return view('client.program.detail',['registeredprogram' => $registeredprogram, 'program' => $program]);  
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
