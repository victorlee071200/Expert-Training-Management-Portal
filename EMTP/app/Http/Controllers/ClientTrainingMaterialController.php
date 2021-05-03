<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\TrainingMaterial;
use Illuminate\Http\Request;

class TrainingMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registeredprogram_ = DB::table('client_programs')->where('id', $registeredprogram)->get();
        $program_ =  DB::table('programs')->where('id', $program)->get();
        $trainingMaterial = DB::table('material')->where('state', 'ACTIVE')->get();
        return view('staff.program.material',['registeredprogram'=>$registeredprogram, 'program'=>$program, 'trainingMaterial'=>$trainingMaterial]);
    }

    public function view_material()
    {
        $TrainingMaterial = DB::table('material')->where('trainingMaterial', $trainingMaterial)->get();
        return view('staff.program.view_material',['trainingMaterial'=>$trainingMaterial]);
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
     * @param  \App\Models\TrainingMaterial  $trainingMaterial
     * @return \Illuminate\Http\Response
     */
    public function show(TrainingMaterial $trainingMaterial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TrainingMaterial  $trainingMaterial
     * @return \Illuminate\Http\Response
     */
    public function edit(TrainingMaterial $trainingMaterial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TrainingMaterial  $trainingMaterial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrainingMaterial $trainingMaterial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TrainingMaterial  $trainingMaterial
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrainingMaterial $trainingMaterial)
    {
        //
    }
}
