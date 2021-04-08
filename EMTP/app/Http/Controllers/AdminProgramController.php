<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class AdminProgramController extends Controller
{
    protected $table = 'programs';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendingprograms =  DB::table('programs')->where('status', 'to-be-confirmed')->get();
        $approvedprograms =  DB::table('programs')->where('status', 'approved')->get();
        $allprograms =  DB::table('programs')->get();
        return view('Admin.view_program',['pendingprograms'=>$pendingprograms, 'allprograms'=>$allprograms, 'approvedprograms'=>$approvedprograms]);
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

    public function showapproved(Program $program)
    {
        return view('Admin.edit_program', ['program' => $program]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $program = new Program;
        $program->name = request('name');
        $program->type = request('type');
        $program->price = request('price');
        $program->option = request('option');
        $program->description = request('description');

        $program->save();

        return redirect('Staff');

        // return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function show(Program $program)
    {

        return view('Admin.approve_program', ['program' => $program]);

        // return $program;
        // return view('Admin.approve_program');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function edit(Program $program)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Program $program)
    {
        $program->status = 'approved';
        $program->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function destroy(Program $program)
    {
        //
    }
}
