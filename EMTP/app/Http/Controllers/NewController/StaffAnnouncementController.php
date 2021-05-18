<?php

namespace App\Http\Controllers\NewController;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StaffAnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $assignedprograms =  DB::table('client_programs')->where('staff_id', Auth::user()->id)->where('program_id', $id)->get();
        $program_details =  DB::table('programs')->where('id', $id)->get();
        $announcement = DB::table('announcements')->where('program_id', $program_details[0]->id)->get();

        return view('staff.program.announcement',['assignedprograms'=>$assignedprograms[0], 'program_details'=>$program_details[0], 'announcement'=>$announcement]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $assignedprograms =  DB::table('client_programs')->where('staff_id', Auth::user()->id)->where('program_id', $id)->get();
        $program_details =  DB::table('programs')->where('id', $id)->get();

        return view('staff.program.create_announcement',['assignedprograms'=>$assignedprograms[0], '$program_details'=>$program_details[0]]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $assignedprograms =  DB::table('client_programs')->where('staff_id', Auth::user()->id)->where('program_id', $id)->get();
        $program_details =  DB::table('programs')->where('id', $id)->get();
        $announcement = DB::table('announcements')->get();

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'state' => 'required',
        ]);
        date_default_timezone_set("Asia/Kuala_Lumpur");
        Announcement::create([
            'program_id' => $program_details[0]->id,
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'state' => $request->input('state'),
        ]);

        return redirect(route('staff.program-announcement',['assignedprograms'=>$assignedprograms[0], 'program'=>$program_details[0], 'announcement'=>$announcement, $id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $announcement)
    {
        $assignedprograms =  DB::table('client_programs')->where('staff_id', Auth::user()->id)->where('program_id', $id)->get();
        $program_details =  DB::table('programs')->where('id', $id)->get();
        $announcements = DB::table('announcements')->where('id', $announcement)->get();

        return view('staff.program.view_announcement',['assignedprograms'=>$assignedprograms[0], 'program_details'=>$program_details[0], 'announcement'=>$announcements[0]]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $announcement)
    {
        $assignedprograms =  DB::table('client_programs')->where('staff_id', Auth::user()->id)->where('program_id', $id)->get();
        $program_details =  DB::table('programs')->where('id', $id)->get();
        $announcements = DB::table('announcements')->where('id', $announcement)->get();

        return view('staff.program.edit_announcement',['assignedprograms'=>$assignedprograms[0], 'program_details'=>$program_details[0], 'announcements'=>$announcements[0]]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $announcement)
    {
        $assignedprograms =  DB::table('client_programs')->where('staff_id', Auth::user()->id)->where('program_id', $id)->get();
        $program_details =  DB::table('programs')->where('id', $id)->get();
        $announcements = DB::table('announcements')->where('id', $announcement)->get();

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'state' => 'required',
        ]);

        date_default_timezone_set("Asia/Kuala_Lumpur");

        Announcement::where('id', $announcement)->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'state' => $request->input('state'),
        ]);

        return redirect(route('staff.program-announcement',['assignedprograms'=>$assignedprograms, 'program_details'=>$program_details, 'announcement'=>$announcements, $id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $announcement)
    {
        $assignedprograms =  DB::table('client_programs')->where('staff_id', Auth::user()->id)->where('program_id', $id)->get();
        $program_details =  DB::table('programs')->where('id', $id)->get();
        $announcements = DB::table('announcements')->where('id', $announcement)->get();
        Announcement::find($announcement)->delete();

        return redirect(route('staff.program-announcement',['assignedprograms'=>$assignedprograms, 'program_details'=>$program_details, 'announcement'=>$announcements, $id]));
    }
}
