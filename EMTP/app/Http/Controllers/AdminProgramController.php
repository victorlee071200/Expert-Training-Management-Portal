<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendingprograms =  DB::table('programs')->where('status', 'to-be-confirmed')->get();
        $approvedprograms =  DB::table('programs')->where('status', 'approved')->get();
        $allprograms =  Program::all();
        return view('admin.program.index',['pendingprograms'=>$pendingprograms, 'allprograms'=>$allprograms, 'approvedprograms'=>$approvedprograms]);
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
    public function show_pending($id)
    {
        $program = Program::find($id);
        return view('admin.program.approve', ['program' => $program]);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $program = Program::find($id);
        return view('admin.program.approved', ['program' => $program]);

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
        $program = Program::find($id);
        $program->status = 'approved';
        $program->save();

        return redirect('/admin/view/program')->withToastSuccess('Successfully!');
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
