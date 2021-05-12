<?php

namespace App\Http\Controllers\NewController;

use App\Models\Program;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Models\ClientProgram;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ClientAnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $registeredprograms =  DB::table('client_programs')->where('client_email', Auth::user()->email)->where('program_id', $id)->get();
        $program_details =  DB::table('programs')->where('id', $id)->get();
        $announcement = DB::table('announcements')->where('program_code', $program_details[0]->code)->get();
        return view('client.program.announcement',['registeredprograms'=>$registeredprograms[0], 'program_details'=>$program_details[0], 'announcement'=>$announcement]);
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
    public function show($id, $announcement)
    {
        $registeredprograms =  DB::table('client_programs')->where('client_email', Auth::user()->email)->where('program_id', $id)->get();
        $program_details =  DB::table('programs')->where('id', $id)->get();
        $announcements = DB::table('announcements')->where('id', $announcement)->get();
        return view('client.program.view_announcement',['registeredprograms'=>$registeredprograms[0], 'program_details'=>$program_details[0], 'announcement'=>$announcements[0]]);
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
