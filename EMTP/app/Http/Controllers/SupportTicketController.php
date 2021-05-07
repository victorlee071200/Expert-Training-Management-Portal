<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\SupportTicket;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session;

class SupportTicketController extends Controller
{
    public function ClientSupportPageView()
    {
        return view('client.support.view');

    }

    public function ClientCreateSupportPageView()
    {
        return view('client.support.create');
    }

    public function ClientCreateSupport(Request $request)
    {
        // Validate the request...
        $ticket = new SupportTicket;
        $ticket->name = Auth::user()->name;
        $ticket->email = Auth::user()->email;
        $ticket->subject = request('subject');
        $ticket->department = request('department');
        $ticket->priority = request('priority');
        $ticket->description = request('description');
        $name = $request->file('thumbnail')->getClientOriginalName();
        $request->file('thumbnail')->storeAs(
            'public/ticket_thumbnails/', $name
        );
        $ticket->thumbnail_path = $name;

        $ticket->save();
        // return $path;
        return view('client.support.view');

    }

    public function AdminViewAllTickets()
    {
        $tickets = SupportTicket::all();

        $users = User::all();

        $staffs =  DB::table('users')->where('usertype', 'staff')->get();

        return view('admin.support.index', ['tickets' => $tickets, 'users'=>$users, 'staffs'=>$staffs]);


    }

    public function AdminViewSpecificTicket(Request $request, $id)
    {
        $ticket = SupportTicket::findOrFail($id);

        $staffs =  DB::table('users')->where('usertype', 'staff')->get();

        return view('admin.support.details', ['ticket'=>$ticket, 'staffs'=>$staffs]);

    }

    public function AdminAssignTo(Request $request, $id)
    {
        $ticket = SupportTicket::find($id);
        $ticket->assign_to = $request->input('assign_to');

        $ticket->update();

        return redirect('/admin/support');

    }


}
