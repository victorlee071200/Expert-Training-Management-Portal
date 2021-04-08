<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Program;
use App\Models\ClientProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ProgramController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $approvedprograms =  DB::table('programs')->where('status', 'approved')->get();
        return view('client.program.index',['approvedprograms'=>$approvedprograms]);  
    }

    public function searchbar()
    {
        $approvedprograms =  DB::table('programs')->where('status', 'approved')->get();
        return view('client.program.program',['approvedprograms'=>$approvedprograms]);  
    }    

    public function client_showprogram(Program $program)
    {
        return view('client.program.submit', ['program' => $program]);

        // return $program;
        // return view('Admin.approve_program');
    }

    public function create()
    {
        //
    }

    public function register(Program $program)
    {
        return view('Client.submit', ['program' => $program]);
    }

    public function client_store($program, Request $request)
    {
        // Validate the request...

        $clientprogram = new ClientProgram;
        //to-do: get client's email
        $clientprogram->client_email = "TODO@gmail.com";
        $clientprogram->company_name = request('company_name');
        $clientprogram->program_id = $program;
        $clientprogram->client_venue = request('client_venue');
        $clientprogram->no_of_employees = request('no_of_employees');
        $clientprogram->start_date = request('start_date');
        $clientprogram->end_date = request('end_date');
        $clientprogram->payment_type = request('payment_type');
        $clientprogram->payment_status = "pending";
        $clientprogram->client_notes = request('client_notes');
        $clientprogram->status= 'to-be-confirmed';

        $clientprogram->save();

        // return redirect('Client/allprogram');

        // return $request->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request...

        $program = new Program;
        $program->name = request('name');
        $program->type = request('type');
        $program->price = request('price');
        $program->option = request('option');
        $program->description = request('description');
        $program->status= 'to-be-confirmed';

        $program->save();

        return redirect('Staff/create_program');

        // return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $approvedprograms =  DB::table('programs')->where('status', 'approved')->get();
        return view('Client.program.index',['approvedprograms'=>$approvedprograms]);  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function edit(c $c)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, c $c)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function destroy(c $c)
    {
        //
    }
}
