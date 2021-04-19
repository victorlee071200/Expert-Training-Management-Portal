<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SupportTicket;

class SupportTicketController extends Controller
{
    public function AdminViewAllTickets()
    {
        $tickets = SupportTicket::all();

        return view('admin.support.index', ['tickets' => $tickets]);


    }

    public function AdminViewSpecificTicket(SupportTicket $ticket)
    {

    }
}
