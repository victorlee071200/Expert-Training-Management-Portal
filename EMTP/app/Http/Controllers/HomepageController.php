<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function show()
    {
        return view('client.homepage.view');
    }
}
