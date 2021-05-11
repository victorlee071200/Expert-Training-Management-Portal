<?php

namespace App\Http\Controllers\NewController;

use App\Models\Program;
use App\Models\Material;
use Illuminate\Http\Request;
use App\Models\ClientProgram;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class StaffMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function material(ClientProgram $assignedprogram, Program $program)
    {
        $assignedprogram_ = DB::table('client_programs')->where('id', $assignedprogram)->get();
        $program_ =  DB::table('programs')->where('id', $program)->get();
        $trainingMaterial = DB::table('materials')->get();
        return view('staff.program.material',['assignedprogram'=>$assignedprogram, 'program'=>$program, 'trainingMaterial'=> $trainingMaterial]);
    }

    public function specific_material(ClientProgram $assignedprogram, Program $program, Material $trainingMaterial)
    {
        $assignedprogram_ = DB::table('client_programs')->where('id', $assignedprogram)->get();
        $program_ =  DB::table('programs')->where('id', $program)->get();
        $trainingMaterial_ = DB::table('materials')->where('id', $trainingMaterial)->get();
        return view('staff.program.view_material',['assignedprogram'=>$assignedprogram, 'program'=>$program, 'trainingMaterial'=> $trainingMaterial]);
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
