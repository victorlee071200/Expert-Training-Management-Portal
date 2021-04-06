<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\ClientProgram;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ClientProgramController extends Controller
{
    public function index()
    {
        $programs =  DB::table('client_programs')->where('client_email', 'TODO@gmail.com')->get();

        $ids = array();

        foreach($programs as $program) {
            array_push($ids, $program->program_id);
        }

        $programdetails =  DB::table('programs')->whereIn('id', $ids)->get();

        return view('Client.registeredprograms',['registeredprograms'=>$registeredprograms,'programdetails'=>$programdetails]);  
    }

    public function show(ClientProgram $registeredprogram, Program $program)
    {
        $registeredprogram_ = DB::table('client_programs')->where('id', $registeredprogram)->get();
        $program_ =  DB::table('programs')->where('id', $program)->get();
        return view('Client.registeredprogram',['registeredprogram' => $registeredprogram, 'program' => $program]);  
    }
}
