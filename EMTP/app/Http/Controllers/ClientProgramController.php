<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\ClientProgram;
use App\Models\Material;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ClientProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $approvedprograms =  DB::table('programs')->where('status', 'approved')->get();
        return view('client.program.approved.index',['approvedprograms'=>$approvedprograms]);
    }

    public function ClientViewSpecificRegisteredProgramDetail(ClientProgram $registeredprogram, Program $program)
    {
        $registeredprogram_ = DB::table('client_programs')->where('id', $registeredprogram)->get();
        $program_ =  DB::table('programs')->where('id', $program)->get();
        return view('client.program.detail',['registeredprogram'=>$registeredprogram, 'program'=>$program]);
    }

    public function ClientViewSpecificRegisteredProgramAnnouncement(ClientProgram $registeredprogram, Program $program, Announcement $announcement)
    {
        $registeredprogram_ = DB::table('client_programs')->where('id', $registeredprogram)->get();
        $program_ =  DB::table('programs')->where('id', $program)->get();
        $announcement = DB::table('announcements')->where('state', 'ACTIVE')->get();
        return view('client.program.announcement',['registeredprogram'=>$registeredprogram, 'program'=>$program, 'announcement'=>$announcement]);
    }

    public function ClientViewSpecificRegisteredProgramAnnouncementView(ClientProgram $registeredprogram, Program $program, Announcement $announcement)
    {
        $registeredprogram_ = DB::table('client_programs')->where('id', $registeredprogram)->get();
        $program_ =  DB::table('programs')->where('id', $program)->get();
        $announcement_ = DB::table('announcements')->where('id', $announcement)->get();
        return view('client.program.view_announcement',['registeredprogram'=>$registeredprogram, 'program'=>$program, 'announcement'=>$announcement]);
    }

    public function ClientViewSpecificRegisteredProgramMaterial(ClientProgram $registeredprogram, Program $program)
    {
        $registeredprogram_ = DB::table('client_programs')->where('id', $registeredprogram)->get();
        $program_ =  DB::table('programs')->where('id', $program)->get();
        $trainingMaterial = DB::table('materials')->where('state', 'ACTIVE')->get();
        return view('client.program.material',['registeredprogram'=>$registeredprogram, 'program'=>$program, 'trainingMaterial'=> $trainingMaterial]);
    }

    public function ClientViewSpecificRegisteredProgramMaterialView(ClientProgram $registeredprogram, Program $program, Material $trainingMaterial)
    {
        $registeredprogram_ = DB::table('client_programs')->where('id', $registeredprogram)->get();
        $program_ =  DB::table('programs')->where('id', $program)->get();
        $trainingMaterial_ = DB::table('materials')->where('id', $trainingMaterial)->get();
        return view('client.program.view_material',['registeredprogram'=>$registeredprogram, 'program'=>$program, 'trainingMaterial'=> $trainingMaterial]);
    }

    public function ClientViewSpecificRegisteredProgramFeedback(ClientProgram $registeredprogram, Program $program)
    {
        $status = "";
        $feedback = "";
        $feedbacks = DB::table('feedbacks')->where('program_id',$program->id)
        ->where('client_id','!=',Auth::user()->id)->orderBy('updated_at', 'desc')->get();

        $feedback_ = DB::table('feedbacks')->where('program_id',$program->id)
        ->where('client_id',Auth::user()->id)->get();

        $feedback_ = DB::table('feedbacks')->where('program_id',$program->id)
        ->where('client_id',Auth::user()->id)->get();
        
        $registeredprogram_ = DB::table('client_programs')->where('id', $registeredprogram)->get();
        $program_ =  DB::table('programs')->where('id', $program)->get();
        return view('client.program.feedback',['registeredprogram'=>$registeredprogram, 'program'=>$program, 'feedbacks'=>$feedbacks, 'feedback'=>$feedback_]);
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
        $program = Program::find($id);

        $clientprogram =  DB::table('client_programs')->where('client_email', Auth::user()->email)
        ->where('program_id', $program->id)->get();

        if ($clientprogram->isEmpty()){
            $registered = false;
        }
        else
        {
            $registered = true;
        }

        // return ($clientprogram);

        return view('client.program.view-specific',['program'=>$program, 'registered'=>$registered, 'clientprogram'=>$clientprogram]);
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
