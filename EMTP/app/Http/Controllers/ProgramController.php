<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Program;
use Illuminate\Http\Request;
use App\Models\ClientProgram;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
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

        return view('client.program.view-specific',['program'=>$program]);
    }


    public function ClientRegisterProgram(Program $program)
    {
        return view('client.program.register', ['program' => $program]);
        $program->session()->flash('flash.banner', 'Yay it works!');
        $program->session()->flash('flash.bannerStyle', 'success');
    }

    public function ClientStoreProgram($id, Request $request)
    {
        // Validate the request...

        $clientprogram = new ClientProgram;
        $clientprogram->client_email = Auth::user()->email;
        $clientprogram->company_name = request('company_name');
        $clientprogram->program_id = $id;
        $clientprogram->client_venue = request('client_venue');
        $clientprogram->no_of_employees = request('no_of_employees');
        $clientprogram->start_date = request('start_date');
        $clientprogram->end_date = request('end_date');
        $clientprogram->payment_type = request('payment_type');
        $clientprogram->payment_status = "pending";
        $clientprogram->client_notes = request('client_notes');
        $clientprogram->status= 'to-be-confirmed';

        $clientprogram->save();

        return redirect('client/view-all');

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

    public function  ClientViewSpecificRegisteredProgram(ClientProgram $registeredprogram, Program $program)
    {
        $registeredprogram_ = DB::table('client_programs')->where('id', $registeredprogram)->get();
        $program_ =  DB::table('programs')->where('id', $program)->get();
        return view('client.program.detail',['registeredprogram' => $registeredprogram, 'program' => $program]);
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
        $program->type = request('type');
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
        return view('staff.dashboard.index');
    }

    public function StaffViewPendingProgram(Request $request)
    {
        $registeredprograms =  DB::table('client_programs')->get();
        $programdetails =  DB::table('programs')->get();
        return view('staff.program.view_pendings',['registeredprograms'=>$registeredprograms,'programdetails'=>$programdetails]);
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

        // return $program;
        // return view('Admin.approve_program');
    }

    public function AdminApprovedProgram(Request $request, Program $program)
    {
        $program->status = 'approved';
        $program->save();
        return redirect('/admin/view/program');
    }

    public function AdminViewApprovedProgram(Program $program)
    {
        return view('admin.program.approved', ['program' => $program]);

    }



}
