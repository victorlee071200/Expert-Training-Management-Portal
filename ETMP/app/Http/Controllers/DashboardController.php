<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientProgram;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function ClientDashboard()
    {
        $programs =  ClientProgram::where('client_email', Auth::user()->email)->get();

        $ids = array();

        foreach($programs as $program) {
            array_push($ids, $program->program_id);
        }

        $details =  DB::table('programs')->whereIn('id', $ids)->get();

        return view('client.dashboard.index',compact('programs', 'details'));
    }



}
