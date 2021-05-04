<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\ClientProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffProgramController extends Controller
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
        return view('staff.program.index',['pendingprograms'=>$pendingprograms, 'allprograms'=>$allprograms, 'approvedprograms'=>$approvedprograms]);
    }

    public function StaffViewSpecificProgramDetail(ClientProgram $registeredprogram, Program $program)
    {
        $registeredprogram_ = DB::table('client_programs')->where('id', $registeredprogram)->get();
        $program_ =  DB::table('programs')->where('id', $program)->get();
        return view('staff.program.detail',['registeredprogram'=>$registeredprogram, 'program'=>$program]);
    }

    public function StaffViewSpecificProgramAnnouncement(ClientProgram $registeredprogram, Program $program)
    {
        $registeredprogram_ = DB::table('client_programs')->where('id', $registeredprogram)->get();
        $program_ =  DB::table('programs')->where('id', $program)->get();
        return view('staff.program.announcement',['registeredprogram'=>$registeredprogram, 'program'=>$program]);
    }

    public function StaffViewSpecificProgramMaterial(ClientProgram $registeredprogram, Program $program)
    {
        $registeredprogram_ = DB::table('client_programs')->where('id', $registeredprogram)->get();
        $program_ =  DB::table('programs')->where('id', $program)->get();
        $trainingMaterial = DB::table('materials')->where('state', 'ACTIVE')->get();
        return view('staff.program.material',['registeredprogram'=>$registeredprogram, 'program'=>$program, 'trainingMaterial'=> $trainingMaterial]);
    }

    public function StaffViewSpecificProgramMaterialView(ClientProgram $registeredprogram, Program $program, Material $trainingMaterial)
    {
        $registeredprogram_ = DB::table('client_programs')->where('id', $registeredprogram)->get();
        $program_ =  DB::table('programs')->where('id', $program)->get();
        $trainingMaterial_ = DB::table('materials')->where('id', $trainingMaterial)->get();
        return view('staff.program.view_material',['registeredprogram'=>$registeredprogram, 'program'=>$program, 'trainingMaterial'=> $trainingMaterial]);
    }

    public function StaffViewSpecificProgramFeedback(ClientProgram $registeredprogram, Program $program)
    {
        $registeredprogram_ = DB::table('client_programs')->where('id', $registeredprogram)->get();
        $program_ =  DB::table('programs')->where('id', $program)->get();
        return view('staff.program.feedback',['registeredprogram'=>$registeredprogram, 'program'=>$program]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.program.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // Validate the request...
         $program = new Program;
         $program->name = request('name');
         $program->code = request('code');
         $program->type = request('type');
         $program->length = request('length');
         $program->price = request('price');
         $program->option = request('option');
         $program->description = request('description');
         $program->status = 'to-be-confirmed';

         $name = $request->file('thumbnail')->getClientOriginalName();
         $request->file('thumbnail')->storeAs(
             'public/program_thumbnails/', $name
         );
         $program->thumbnail_path = $name;

         $program->save();
         // return $path;
         return view('staff.program.index');
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

    // public function StaffViewPendingProgram(Request $request)
    // {
    //     $pendingprograms =  DB::table('client_programs')->where('status', 'pending')->get();

    //     $ids = array();

    //     foreach($pendingprograms as $program) {
    //         array_push($ids, $program->program_id);
    //     }

    //     $pendingprogramdetails = DB::table('programs')->whereIn('id', $ids)->get();

    //     $staffprograms =  DB::table('client_programs')->where('staff_id', Auth::user()->id)
    //     ->where('status', 'to-be-confirmed')->orWhere('status', 'approved')->orWhere('status', 'completed')->get();

    //     $ids = array();

    //     foreach($pendingprograms as $program) {
    //         array_push($ids, $program->program_id);
    //     }

    //     $staffprogramdetails = DB::table('programs')->whereIn('id', $ids)->get();

    //     // return ($ids);
    //     return view('staff.program.view_pendings',['pendingprograms'=>$pendingprograms, 'pendingprogramdetails'=>$pendingprogramdetails,
    //     'staffprograms'=>$staffprograms, 'staffprogramdetails'=>$staffprogramdetails]);
    // }

    // public function StaffApproveSpecificPendingProgram(ClientProgram $clientprogram){

    //     $clientprogram->status = "to-be-confirmed";
    //     $clientprogram->staff_id = Auth::user()->id;
    //     $clientprogram->save();

    //     return redirect('/staff/view/pendings');
    // }

    // public function StaffViewSpecificPendingProgram(Request $request, $programid, $pendingprogramid)
    // {
    //     $pendingprogram_ = DB::table('client_programs')->where('id', $pendingprogramid)->get();
    //     $pendingprogram = $pendingprogram_[0];
    //     $program_ = DB::table('programs')->where('id', $programid)->get();
    //     $program = $program_[0];
    //     return view('staff.program.view-specific-pending',['pendingprogram'=>$pendingprogram,'program'=>$program]);
    // }

    // public function StaffViewSpecificProgram($id, ClientProgram $clientprogram)
    // {
    //     $programs = DB::table('programs')->where('id', $clientprogram->program_id)->get();
    //     $program = $programs[0];
    //     // return $clientprogram;
    //     return view('staff.program.view-specific-incharge',['clientprogram'=>$clientprogram,'program'=>$program]);
    // }

    // public function StaffMarkProgramComplete(ClientProgram $clientprogram)
    // {
    //     $clientprogram->status = "completed";
    //     $clientprogram->save();
    //     return redirect('/staff/view/pendings');

    // }
}
