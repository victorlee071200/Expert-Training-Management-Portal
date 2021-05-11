<?php

namespace App\Http\Controllers\New;

use App\Models\Program;
use Illuminate\Http\Request;
use App\Helpers\CurrencyHelper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\UserProgram\UserProgram;

class FrontendProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = Program::orderBy('id', 'ASC',)->paginate(5);
        return view('programs', compact('programs'));
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
        $authUser = Auth::user();
        $program = Program::where('id', $id)->first();
        if(is_null($program))
        {
            abort(403, 'The course has not been found!');
        }

        $userBoughtProgram = false;

        if(!is_null($authUser))
        {
            $userProgram = UserProgram::where('user_id', $authUser->id)->where('program_id', $program->id)->first();
            if(!is_null($userProgram))
            {
                $userBoughtProgram = true;
            }
        }

        $currency = CurrencyHelper::getCurrencyString();

        return view('course', compact('program', 'userBoughtProgram', 'currency'));
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
