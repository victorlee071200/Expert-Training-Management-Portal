<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupportTicketController extends Controller
{
    public function AdminViewAllTickets()
    {
        return view('client.support.index');
    }
}
