<?php

namespace App\Http\Controllers\New;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\SupportTicket;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ClientSupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('client.new.support.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view('client.new.support.create', compact('departments'));
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
        $ticket = new SupportTicket;
        $ticket->name = Auth::user()->name;
        $ticket->email = Auth::user()->email;
        $ticket->subject = request('subject');
        $ticket->department = request('department');
        $ticket->priority = request('priority');
        $ticket->description = request('description');
        $ticket->status = ('open');
        $name = $request->file('thumbnail')->getClientOriginalName();
        $request->file('thumbnail')->storeAs(
            'public/ticket_thumbnails/', $name
        );
        $ticket->thumbnail_path = $name;

        $ticket->save();
        // return $path;
        return redirect('/client/view/support')->withToastSuccess('Support Ticket has been created Successfully!');
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
