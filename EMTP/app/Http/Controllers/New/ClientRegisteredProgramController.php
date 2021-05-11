<?php

namespace App\Http\Controllers\New;

use App\Models\Program;
use Illuminate\Http\Request;
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
    public function index()
    {
        $programs =  ClientProgram::where('client_email', Auth::user()->email)->get();

        $ids = array();

        foreach($programs as $program) {
            array_push($ids, $program->program_id);
        }

        $details =  Program::whereIn('id', $ids)->get();

        return view('client.program.registered', compact('programs', 'details'));
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
}
