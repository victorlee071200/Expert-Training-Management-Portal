<?php

namespace App\Http\Controllers\NewController;

use App\Models\Program;
use App\Models\Material;
use Illuminate\Http\Request;
use App\Models\ClientProgram;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StaffMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = DB::table('users')->where('email', Auth::user()->email)->get();
        $assignedprograms =  DB::table('client_programs')->where('staff_id', $user[0]->id)->get();
        $program_details =  DB::table('programs')->where('id', $id)->get();
        $trainingMaterial = DB::table('materials')->get();
        return view('staff.program.material',['assignedprograms'=>$assignedprograms[0], 'program_details'=>$program_details[0], 'trainingMaterial'=> $trainingMaterial]);
    }

    public function specific_material(ClientProgram $assignedprogram, Program $program, Material $trainingMaterial)
    {

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
    public function show($id, $material)
    {
        $assignedprograms = DB::table('client_programs')->where('id', $id)->get();
        $program_details =  DB::table('programs')->where('id', $id)->get();
        $trainingMaterial = DB::table('materials')->where('id', $material)->get();
        return view('staff.program.view_material',['assignedprograms'=>$assignedprograms, 'program_details'=>$program_details, 'trainingMaterial'=> $trainingMaterial]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
