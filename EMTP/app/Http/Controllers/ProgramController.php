<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Program;
use Illuminate\Http\Request;
use App\Models\ClientProgram;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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
