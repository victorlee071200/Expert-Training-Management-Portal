<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Program;
use App\Models\ClientProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


class ProgramController extends Controller
{
    public function index()
    {
        $approvedprograms =  DB::table('programs')->where('status', 'approved')->get();
        return view('client.program.index',['approvedprograms'=>$approvedprograms]);
    }

    public function ClientViewAllProgram()
    {
        $approvedprograms =  DB::table('programs')->where('status', 'approved')->get();
        return view('client.program.view-all',['approvedprograms'=>$approvedprograms]);

    }

    public function ClientViewSpecificProgram(Program $program)
    {

        $clientprogram =  DB::table('client_programs')->where('client_email', Auth::user()->email)
        ->where('program_id', $program->id)->get();

        if ($clientprogram->isEmpty()){
            $registered = false;
        }else{
            $registered = true;
        }

        // return ($clientprogram);

        return view('client.program.view-specific',['program'=>$program, 'registered'=>$registered, 'clientprogram'=>$clientprogram]);
    }


    public function ClientRegisterProgram(Program $program)
    {
        if ($program->option == 'both'){
            $options = array('Physical','Online');
        } else if ($program->option == 'online'){
            $options = array('Online');
        } else if ($program->option == 'physical'){
            $options = array('Physical');
        }

        return view('client.program.register', ['program' => $program, 'options'=> $options]);
        $program->session()->flash('flash.banner', 'Yay it works!');
        $program->session()->flash('flash.bannerStyle', 'success');
    }

    public function ClientStoreProgram($id, Request $request)
    {
        // Validate the request...

        $clientprogram = new ClientProgram;
        $clientprogram->client_email = Auth::user()->email;
        $clientprogram->company_name = Auth::user()->company_name;
        $clientprogram->program_id = $id;
        $clientprogram->staff_id = 0;
        $clientprogram->option = strtolower(request('option'));

        if ($clientprogram->option == "online"){
            $clientprogram->client_venue = "online";
        } else{
            $clientprogram->client_venue = request('client_venue');
        }

        $clientprogram->no_of_employees = request('no_of_employees');
        $clientprogram->start_date = request('start_date');
        $clientprogram->end_date = request('end_date');
        $clientprogram->payment_type = request('payment_type');
        $clientprogram->payment_status = "pending";
        $clientprogram->client_notes = request('client_notes');
        $clientprogram->status= 'pending';

        $clientprogram->save();

        return redirect('/client/view/program');

        // return $request->all();
    }

    public function ClientViewRegisteredProgram()
    {
        $registeredprograms =  DB::table('client_programs')->where('client_email', Auth::user()->email)->get();

        $ids = array();

        foreach($registeredprograms as $program) {
            array_push($ids, $program->program_id);
        }

        $programdetails =  DB::table('programs')->whereIn('id', $ids)->get();

        return view('client.program.registered',['registeredprograms'=>$registeredprograms,'programdetails'=>$programdetails]);
    }

    public function ClientViewSpecificRegisteredProgramDetail(ClientProgram $registeredprogram, Program $program)
    {
        $registeredprogram_ = DB::table('client_programs')->where('id', $registeredprogram)->get();
        $program_ =  DB::table('programs')->where('id', $program)->get();
        return view('client.program.detail',['registeredprogram'=>$registeredprogram, 'program'=>$program]);
    }

    public function ClientEditSpecificRegisteredProgramDetail(ClientProgram $registeredprogram, Program $program)
    {
        return view('client.program.edit',['registeredprogram'=>$registeredprogram, 'program'=>$program]);
    }

    public function ClientSaveRegisteredProgram(Request $request, ClientProgram $registeredprogram)
    {
        $registeredprogram->option = request('option');
        $registeredprogram->no_of_employees = request('no_of_employees');
        $registeredprogram->start_date = request('start_date');
        $registeredprogram->end_date = request('end_date');
        $registeredprogram->payment_type = request('payment_type');
        $registeredprogram->client_notes = request('client_notes');

        $registeredprogram->save();

        return redirect('/client/view/registered');
    }

    public function ClientConfirmProgram(ClientProgram $registeredprogram){
        $registeredprogram->status = "approved";
        $registeredprogram->save();
        return redirect('/client/view/registered');
    }

    public function ClientViewSpecificRegisteredProgramAnnouncement(ClientProgram $registeredprogram, Program $program)
    {
        $registeredprogram_ = DB::table('client_programs')->where('id', $registeredprogram)->get();
        $program_ =  DB::table('programs')->where('id', $program)->get();
        return view('client.program.announcement',['registeredprogram'=>$registeredprogram, 'program'=>$program]);
    }

    public function ClientViewSpecificRegisteredProgramMaterial(ClientProgram $registeredprogram, Program $program)
    {
        $registeredprogram_ = DB::table('client_programs')->where('id', $registeredprogram)->get();
        $program_ =  DB::table('programs')->where('id', $program)->get();
        return view('client.program.material',['registeredprogram'=>$registeredprogram, 'program'=>$program]);
    }

    public function ClientViewSpecificRegisteredProgramFeedback(ClientProgram $registeredprogram, Program $program)
    {
        $registeredprogram_ = DB::table('client_programs')->where('id', $registeredprogram)->get();
        $program_ =  DB::table('programs')->where('id', $program)->get();
        return view('client.program.feedback',['registeredprogram'=>$registeredprogram, 'program'=>$program]);
    }

    public function StaffCreateProgram()
    {
        return view('staff.program.create');
    }

    public function StaffRegisterProgram(Request $request)
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
        return redirect('/staff/view/program')->withToastSuccess($program->name.' has been Created Successfully!');;
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

    public function AdminShowAllPrograms()
    {
        $pendingprograms =  DB::table('programs')->where('status', 'to-be-confirmed')->get();
        $approvedprograms =  DB::table('programs')->where('status', 'approved')->get();
        $allprograms =  DB::table('programs')->get();
        return view('admin.program.index',['pendingprograms'=>$pendingprograms, 'allprograms'=>$allprograms, 'approvedprograms'=>$approvedprograms]);

    }

    public function AdminViewSpecificProgram(Program $program)
    {
        return view('admin.program.approve', ['program' => $program]);
    }

    public function AdminApprovedProgram(Request $request, $id)
    {
        $program = Program::find($id);
        $program->status = 'approved';
        $program->save();
        return redirect('/admin/view/program')->withToastSuccess($program->name.' has been approved Successfully!');
    }

    public function AdminViewApprovedProgram(Program $program)
    {
        return view('admin.program.approved', ['program' => $program]);

    }

}
