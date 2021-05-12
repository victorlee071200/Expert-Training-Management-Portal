<?php

namespace App\Http\Controllers\NewController;

use App\Models\Program;
use App\Models\Material;
use Illuminate\Support\Str;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Models\ClientProgram;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class StaffAssignedProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = DB::table('users')->where('email', Auth::user()->email)->get();
        $assignedprograms =  DB::table('client_programs')->where('staff_id', $user[0]->id)->where('program_id', $id)->get();
        $program_details =  DB::table('programs')->where('id', $id)->get();

        return view('staff.program.detail',['assignedprograms'=>$assignedprograms[0], 'program_details'=>$program_details[0]]);
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

    public function StaffCreateMaterial(ClientProgram $assignedprogram, Program $program)
    {
        return view('staff.program.create_material',['assignedprogram'=>$assignedprogram, 'program'=>$program]);
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
         $program->slug = Str::slug($request->name);
         $program->status = 'to-be-confirmed';

         $name = $request->file('thumbnail')->getClientOriginalName();
         $request->file('thumbnail')->storeAs(
             'public/program_thumbnails/', $name
         );
         $program->thumbnail_path = $name;

         $program->save();
         // return $path;
         return redirect(route('admin.programs.index'))->withToastSuccess($program->name.' has been Created Successfully!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showpending($id)
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
        $program = Program::find($id);
        $program->delete();
        return redirect(route('staff.program.index'))->withToastError($program->name.' Deleted Successfully!');;
    }

    public function StaffViewPendingProgram(Request $request)
    {
        $pendingprograms =  DB::table('client_programs')->where('status', 'pending')->get();

        $ids = array();

        foreach($pendingprograms as $program) {
            array_push($ids, $program->program_id);
        }

        $pendingprogramdetails = DB::table('programs')->whereIn('id', $ids)->get();

        $staffprograms =  DB::table('client_programs')->where('staff_id', Auth::user()->id)
        ->where('status', 'to-be-confirmed')->orWhere('status', 'approved')->orWhere('status', 'completed')->get();

        $ids = array();

        foreach($staffprograms as $program) {
            array_push($ids, $program->program_id);
        }

        $staffprogramdetails = array();

        foreach($ids as $id){
            array_push($staffprogramdetails, DB::table('programs')->where('id', $id)->get());
        }

        return view('staff.program.view_pendings',['pendingprograms'=>$pendingprograms, 'pendingprogramdetails'=>$pendingprogramdetails,
        'staffprograms'=>$staffprograms, 'staffprogramdetails'=>$staffprogramdetails]);
    }

    public function StaffApproveSpecificPendingProgram(ClientProgram $clientprogram){

        $clientprogram->status = "to-be-confirmed";
        $clientprogram->staff_id = Auth::user()->id;
        $clientprogram->save();

        return redirect('/staff/view/pendings');
    }

    public function StaffViewSpecificPendingProgram(Request $request, $programid, $pendingprogramid)
    {
        $pendingprogram_ = DB::table('client_programs')->where('id', $pendingprogramid)->get();
        $pendingprogram = $pendingprogram_[0];
        $program_ = DB::table('programs')->where('id', $programid)->get();
        $program = $program_[0];
        return view('staff.program.view-specific-pending',['pendingprogram'=>$pendingprogram,'program'=>$program]);
    }

    public function StaffViewSpecificProgram($id, ClientProgram $clientprogram)
    {
        $programs = DB::table('programs')->where('id', $clientprogram->program_id)->get();
        $program = $programs[0];
        // return $clientprogram;
        return view('staff.program.view-specific-incharge',['clientprogram'=>$clientprogram,'program'=>$program]);
    }

    public function StaffMarkProgramComplete(ClientProgram $clientprogram)
    {
        $clientprogram->status = "completed";
        $clientprogram->save();
        return redirect('/staff/view/pendings');

    }

}
