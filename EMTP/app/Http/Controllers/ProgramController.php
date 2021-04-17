<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Program;
use App\Models\ClientProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


class ProgramController extends Controller
{
    public function ClientViewAllProgram()
    {
        $approvedprograms =  DB::table('programs')->where('status', 'approved')->get();
        return view('client.program.view-all',['approvedprograms'=>$approvedprograms]);  
        
    }

    public function ClientViewSpecificProgram()
    {
        $approvedprograms =  DB::table('programs')->where('status', 'approved')->get();
        return view('client.program.view-specific',['approvedprograms'=>$approvedprograms]);  
    }    

    public function ClientShowProgram(Program $program)
    {
        return view('client.program.submit', ['program' => $program]);

        // return $program;
        // return view('Admin.approve_program');
    }

    public function ClientRegisterProgram(Program $program)
    {
        return view('client.program.register', ['program' => $program]);
        $program->session()->flash('flash.banner', 'Yay it works!');
        $program->session()->flash('flash.bannerStyle', 'success');
    }

    public function ClientStoreProgram($program, Request $request)
    {
        // Validate the request...

        $clientprogram = new ClientProgram;
        //to-do: get client's email
        $clientprogram->client_email = "TODO@gmail.com";
        $clientprogram->company_name = request('company_name');
        $clientprogram->program_id = $program;
        $clientprogram->client_venue = request('client_venue');
        $clientprogram->no_of_employees = request('no_of_employees');
        $clientprogram->start_date = request('start_date');
        $clientprogram->end_date = request('end_date');
        $clientprogram->payment_type = request('payment_type');
        $clientprogram->payment_status = "pending";
        $clientprogram->client_notes = request('client_notes');
        $clientprogram->status= 'to-be-confirmed';

        $clientprogram->save();

        // return redirect('Client/allprogram');

        // return $request->all();
    }

    public function ClientViewRegisteredProgram()
    {
        $registeredprograms =  DB::table('client_programs')->where('client_email', 'TODO@gmail.com')->get();

        $ids = array();

        foreach($registeredprograms as $program) {
            array_push($ids, $program->program_id);
        }

        $programdetails =  DB::table('programs')->whereIn('id', $ids)->get();

        return view('client.program.registered',['registeredprograms'=>$registeredprograms,'programdetails'=>$programdetails]);
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
        $program->status= 'to-be-confirmed';

        $program->save();

        return view('staff.dashboard.index');

        // return $request->all();
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
