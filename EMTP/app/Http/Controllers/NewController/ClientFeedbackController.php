<?php

namespace App\Http\Controllers\NewController;

use App\Models\Program;
use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Models\ClientProgram;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ClientFeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $registeredprograms =  DB::table('client_programs')->where('client_email', Auth::user()->email)->where('program_id', $id)->get();
        $program_details =  DB::table('programs')->where('id', $id)->get();
        $feedbacks = DB::table('feedbacks')->where('program_id', $id)->get();
        return view('client.program.feedback', ['registeredprograms'=>$registeredprograms[0], 'program_details'=>$program_details[0], 'feedback'=>$feedbacks]);
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
        $feedback = new Feedback;
        $feedback->client_id = Auth::user()->id;
        $feedback->profile_thumbnail = Auth::user()->profile_photo_path;
        $feedback->client_name = Auth::user()->name;
        $feedback->program_id = $request->programid;
        $feedback->feedback = $request->feedback;
        if ($request->file('image') != null){
            $name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs(
                'public/feedback_images/', $name
            );
            $feedback->image_path = $name;
        }

        $feedback->save();

        return redirect('/client/registered/' . $request->clientprogramid . '/' . $request->programid . '/feedback');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(ClientProgram $registeredprogram, Program $program, Feedback $feedback)
    {
        return view('client.program.editfeedback',['registeredprogram'=>$registeredprogram, 'program'=>$program, 'feedback'=> $feedback]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit(Feedback $feedback)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feedback $feedback)
    {
        $feedback->feedback = $request->feedback;
        if ($request->file('image') != null){
            $name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs(
                'public/feedback_images/', $name
            );
            $feedback->image_path = $name;
        }

        $feedback->save();

        return redirect('/client/registered/' . $request->clientprogramid . '/' . $request->programid . '/feedback');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedback $feedback)
    {
        //
    }
}
