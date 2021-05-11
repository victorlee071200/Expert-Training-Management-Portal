<?php

namespace App\Http\Controllers\NewController;

use App\Models\Program;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Helpers\CurrencyHelper;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\UserProgram\UserProgram;
use Illuminate\Support\Facades\Validator;

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
        return view('staff.programs.index', compact('pending', 'currency', 'approved', 'all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.programs.create');
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
         return redirect(route('staff.programs.index'))->withToastSuccess($program->name.' has been Created Successfully!');
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
    public function edit(Request $request, $id)
    {
        $program = Program::findOrFail($id);
        return view('staff.programs.pending.edit', compact('program'));
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

        $name = $request->file('thumbnail')->getClientOriginalName();
        $request->file('thumbnail')->storeAs(
            'public/program_thumbnails/', $name
        );
        $program->thumbnail_path = $name;

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
        return view('staff.programs.pending.index', compact('program'));
    }

    public function approved($id)
    {
        $program = Program::find($id);
        return view('staff.programs.approved.index', compact('program'));
    }

}