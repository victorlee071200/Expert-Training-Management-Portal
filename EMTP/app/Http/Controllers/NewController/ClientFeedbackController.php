<?php

namespace App\Http\Controllers\NewController;

use App\Models\Program;
use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Models\ClientProgram;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\FeedbackNotification;
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
        $registeredprograms =  DB::table('client_programs')->where('client_email', Auth::user()->email)->where('program_id', $id)->first();
        $program_details =  DB::table('programs')->where('id', $id)->first();
        $feedbacks = DB::table('feedbacks')->where('program_id', $id)->where('client_id', '!=', Auth::user()->id)->get();
        $clientfeedback = DB::table('feedbacks')->where('program_id', $id)->where('client_id', '=', Auth::user()->id)->first();
        return view('client.program.feedback', ['registeredprograms'=>$registeredprograms, 'program_details'=>$program_details, 'feedbacks'=>$feedbacks, 'clientfeedback'=>$clientfeedback]);
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
    public function store(Request $request, $id)
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

        $admin = DB::table('users')->where('email', 'kokwei325@gmail.com')->get();
        $program_details = DB::table('programs')->where('id', $id)->get();

        $data = [
            'feedback_id' => $feedback->id,
            'name' => $feedback->client_name,
            'admin_email' =>  $admin[0]->email,
            'content' => $feedback->feedback,
            'profile_path' => $feedback->profile_thumbnail,
            'image_path' => $feedback->image_path,
            'program_code' => $program_details[0]->code,
            'program_name' => $program_details[0]->name,
        ];

        app('App\Http\Controllers\NewController\EmailController')->sendEmail($data, 'new');

        return redirect('/client/dashboard/'. $request->clientprogramid. '/feedback');

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

        $admin = DB::table('users')->where('email', 'kokwei325@gmail.com')->get();
        $program_details = DB::table('programs')->where('id', $request->clientprogramid)->get();

        $data = [
            'feedback_id' => $feedback->id,
            'name' => $feedback->client_name,
            'admin_email' =>  $admin[0]->email,
            'content' => $feedback->feedback,
            'profile_path' => $feedback->profile_thumbnail,
            'image_path' => $feedback->image_path,
            'program_code' => $program_details[0]->code,
            'program_name' => $program_details[0]->name,
        ];

        app('App\Http\Controllers\NewController\EmailController')->sendEmail($data, 'updated');

        return redirect('client/dashboard/'. $request->clientprogramid .'/feedback');
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
