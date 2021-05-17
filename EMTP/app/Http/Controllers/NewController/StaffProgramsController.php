<?php

namespace App\Http\Controllers\NewController;

use App\Models\Program;
use App\Models\Feedback;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Helpers\CurrencyHelper;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\UserProgram\UserProgram;
use App\Models\ClientProgram;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class StaffProgramsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
        $currency = CurrencyHelper::getCurrencyString();
        $pending = Program::where('status', 'to-be-confirmed')->get();
        $approved =  Program::where('status', 'approved')->get();
        $all = Program::orderBy('id', 'DESC')->paginate(5);

        $clientpending = ClientProgram::where('status','pending')->get();
        $incharge = ClientProgram::where('staff_id',Auth::user()->id)->where('status','!=','pending')->get();
        $idarray = array();
        
        foreach ($incharge as $program){
            array_push($idarray, $program->id);
        }

        $inchargedetails = Program::whereIn('id',$idarray)->get();
        

        return view('staff.program.index', compact('pending', 'clientpending', 'currency', 'approved', 'all', 'incharge', 'inchargedetails'));
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
        $program->slug = Str::slug($request->name);
        $program->status = 'to-be-confirmed';

        $name = $request->file('thumbnail')->getClientOriginalName();
        $request->file('thumbnail')->storeAs(
            'public/program_thumbnails/', $name
        );
        $program->thumbnail_path = $name;

        
        if($request->file('document') != null){
        $documentName = $request->file('document')->getClientOriginalName();
        $request->file('document')->storeAs(
            'public/program_documents/', $documentName
        );
        $program->training_document = $documentName;
        }

        $program->save();
        // return $path;
        return redirect(route('staff.program.index'))->withToastSuccess($program->name.' has been Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $program = Program::where('id', $id)->first();
        $clientprogram =  ClientProgram::where('id', $id)->first();
        return view('staff.program.in-charge.index', compact('program','clientprogram'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $program = Program::findOrFail($id);
        return view('staff.program.pending.edit', compact('program'));
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
        $program = Program::findOrFail($id);
        $program->name = request('name');
        $program->code = request('code');
        $program->type = request('type');
        $program->length = request('length');
        $program->price = request('price');
        $program->option = request('option');
        $program->description = request('description');
        $program->slug = Str::slug($request->name);
        $program->status = 'to-be-confirmed';
        
        if($request->file('thumbnail') != null){
            $name = $request->file('thumbnail')->getClientOriginalName();
            $request->file('thumbnail')->storeAs(
                'public/program_thumbnails/', $name
            );
            $program->thumbnail_path = $name;
        }

        if($request->file('document') != null){
            $documentName = $request->file('document')->getClientOriginalName();
            $request->file('document')->storeAs(
                'public/program_documents/', $documentName
            );
            $program->training_document = $documentName;
        }

        $program->save();
        // return $path;
        return redirect(route('staff.program.index'))->withToastInfo($program->name.' has been Updated Successfully!');

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
        return redirect(route('staff.program.index'))->withToastError($program->name.' Deleted Successfully!');
    }

    public function pending($id)
    {
        $program = Program::find($id);
        return view('staff.program.pending.index', compact('program'));
    }

    public function approved($id)
    {
        $program = Program::find($id);
        $feedbacks = Feedback::where('program_id',$id)->get();
        return view('staff.program.approved.index', compact('program','feedbacks'));
    }

    public function approve($id)
    {
        $program = Program::where('id', $id)->first();

        $clientprogram =  ClientProgram::where('id', $id)->first();
        $clientprogram->status = 'approved';
        $clientprogram->save();

        return redirect('staff/program');
    }

    public function complete($id)
    {
        $program = Program::where('id', $id)->first();

        $clientprogram =  ClientProgram::where('id', $id)->first();
        $clientprogram->status = 'completed';
        $clientprogram->save();

        return redirect('staff/program');
    }


}
