<?php

namespace App\Http\Controllers\NewController;

use App\Models\Announcement;
use App\Models\ClientProgram;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ClientProgram $assignedprogram, Program $program, Announcement $announcement)
    {
        $assignedprogram_ = DB::table('client_programs')->where('id', $assignedprogram)->get();
        $program_ =  DB::table('programs')->where('id', $program)->get();
        $announcement = DB::table('announcements')->get();
        return view('staff.program.announcement',['assignedprogram'=>$assignedprogram, 'program'=>$program, 'announcement'=>$announcement]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ClientProgram $assignedprogram, Program $program)
    {
        $assignedprogram_ = DB::table('client_programs')->where('id', $assignedprogram)->get();
        $program_ =  DB::table('programs')->where('id', $program)->get();
        return view('staff.program.create_announcement',['assignedprogram'=>$assignedprogram, 'program'=>$program]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ClientProgram $assignedprogram, Program $program, Announcement $announcement)
    {
        $assignedprogram_ = DB::table('client_programs')->where('id', $assignedprogram)->get();
        $program_ =  DB::table('programs')->where('id', $program)->get();
        $announcement = DB::table('announcements')->get();

        request()->validate([
            'title' => 'required',
            'content' => 'required',
            'state' => 'required',
        ]);

        Announcement::create([
            'program_code' => $program->code,
            'program_name' => $program->name,
            'title' => request('title'),
            'content' => request('content'),
            'state' => request('state'),
        ]);

        return redirect(route('staff-program-announcement',['assignedprogram'=>$assignedprogram, 'program'=>$program, 'announcement'=>$announcement]));
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
    public function edit(ClientProgram $assignedprogram, Program $program, Announcement $announcement)
    {
        return view('staff.program.edit_announcement',['assignedprogram'=>$assignedprogram, 'program'=>$program, 'announcement'=>$announcement]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClientProgram $assignedprogram, Program $program, Announcement $announcement)
    {
        request()->validate([
            'title' => 'required',
            'content' => 'required',
            'state' => 'required',
        ]);

        $announcement->update([
            'title' => request('title'),
            'content' => request('content'),
            'state' => request('state'),
        ]);

        return redirect(route('staff-program-announcement',['assignedprogram'=>$assignedprogram, 'program'=>$program, 'announcement'=>$announcement]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClientProgram $assignedprogram, Program $program, Announcement $announcement)
    {
        $announcement->delete();
        return redirect(route('staff-program-announcement',['assignedprogram'=>$assignedprogram, 'program'=>$program, 'announcement'=>$announcement]));
    }
}
