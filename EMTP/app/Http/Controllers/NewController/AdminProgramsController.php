<?php

namespace App\Http\Controllers\NewController;

use App\Models\Program;
use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminProgramsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pending =  Program::where('status', 'to-be-confirmed')->get();
        $approved =  Program::where('status', 'approved')->get();
        $all =  Program::all();
        return view('admin.program.index', compact('pending', 'approved', 'all'));
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


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.program.edit');
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

        return redirect(route('admin.program.index'))->withToastSuccess($program->name.' has been approved Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $program = Program::find($id);
        $program->delete();
        return redirect(route('admin.program.index'))->withToastError($program->name.' Deleted Successfully!');
    }

    public function approve($id)
    {
        $program = Program::find($id);
        return view('admin.program.approve.index', compact('program'));
    }

    public function approved($id)
    {
        $program = Program::find($id);
        $feedbacks = Feedback::where('program_id',$id)->get();
        return view('admin.program.approved.index', compact('program','feedbacks'));
    }
}
