<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function ClientDashboard()
    {
        $registeredprograms =  DB::table('client_programs')->where('client_email', Auth::user()->email)->get();

        $ids = array();

        foreach($registeredprograms as $program) {
            array_push($ids, $program->program_id);
        }

        $programdetails =  DB::table('programs')->whereIn('id', $ids)->get();

        return view('client.dashboard.index',['registeredprograms'=>$registeredprograms,'programdetails'=>$programdetails]);
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
