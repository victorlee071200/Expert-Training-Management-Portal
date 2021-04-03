<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request...

        $program = new Program;
        $program->name = request('name');
        $program->type = request('type');
        $program->price = request('price');
        $program->option = request('option');
        $program->description = request('description');

        $program->save();

        return redirect('Staff');

        // return $request->all();
    }
}
