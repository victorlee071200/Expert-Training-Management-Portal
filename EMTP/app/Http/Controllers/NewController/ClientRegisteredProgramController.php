<?php

namespace App\Http\Controllers\NewController;

use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ClientProgram;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ClientRegisteredProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $registeredprograms =  DB::table('client_programs')->where('client_email', Auth::user()->email)->where('program_id', $id)->first();
        $program_details =  DB::table('programs')->where('id', $id)->first();

        return view('client.program.detail',['registeredprograms'=>$registeredprograms, 'program_details'=>$program_details]);
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

        $clientprogram = new ClientProgram;
        $clientprogram->client_email = Auth::user()->email;
        $clientprogram->company_name = Auth::user()->company_name;
        $clientprogram->user_id = Auth::user()->id;
        $clientprogram->program_id = request('programid');
        $clientprogram->staff_id = 0;
        $clientprogram->option = request('option');

        if ($clientprogram->option == "online"){
            $clientprogram->client_venue = "online";
        } else{
            $clientprogram->client_venue = request('client_venue');
        }

        $clientprogram->no_of_employees = request('no_of_employees');
        $clientprogram->start_date = request('start_date');
        $clientprogram->end_date = request('end_date');
        $clientprogram->payment_type = request('payment_type');
        $clientprogram->payment_status = "pending";
        $clientprogram->client_notes = request('client_notes');
        $clientprogram->status= 'to-be-confirmed';

        $clientprogram->save();

        if ($clientprogram->payment_type == 'cash'){
            return redirect('/client/dashboard')->withToastInfo('Successfully Registered');

        }
        
        else{
            $program = Program::find(request('programid'));
            $slug = $program->slug;
            error_log($slug);
            return redirect('client/checkout/'.$slug);
        }


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
        $program = Program::find($id);
        return view('client.program.edit', compact('program'));
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
        $program = Program::findOrFail($id);
        $program->option = request('option');
        $program->no_of_employees = request('no_of_employees');
        $program->start_date = request('start_date');
        $program->end_date = request('end_date');
        $program->payment_type = request('payment_type');
        $program->client_notes = request('client_notes');

        $program->update();
        return redirect(route('client.program.registered'))->withToastInfo($program->name.' Updated Successfully!');
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

    public function registerForm($id)
    {
        $program = Program::find($id);
        return view('client.new.program.register', compact('program'));
    }
}
