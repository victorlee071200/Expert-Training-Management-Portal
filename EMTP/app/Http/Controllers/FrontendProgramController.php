<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\CurrencyHelper;
use App\Models\Program\Program;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FrontendProgramController extends Controller
{
    public function index()
    {
        $programs = Program::orderBy('id', 'ASC',)->paginate(5);
        return view('courses', compact('programs'));
    }

    public function show($programId)
    {
        $authUser = Auth::user();
        $program = DB::table('programs')->where('id', $programId)->first();
        if(is_null($program))
        {
            abort(403, 'The program has not been found!');
        }

        $userBoughtProgram = false;
        if(!is_null($authUser))
        {
            $userProgram = DB::table('user_programs')->where('user_id', $authUser->id)->where('program_id', $program->id)->first();
            if(!is_null($userProgram))
            {
                $userBoughtProgram = true;
            }
        }

        $currency = CurrencyHelper::getCurrencyString();

        return view('program', compact('program', 'userBoughtprogram', 'currency'));
    }
}
