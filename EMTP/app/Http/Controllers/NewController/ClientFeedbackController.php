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

        date_default_timezone_set("Asia/Kuala_Lumpur");

        $feedback->save();

        $users = DB::table("users")->where('id', Auth::user()->id)->first();
        $admin = DB::table('users')->where('email', 'kokwei325@gmail.com')->first();
        $client_program = DB::table("client_programs")->where('program_id', $id)->where('user_id',Auth::user()->id)->first();
        $program_details = DB::table('programs')->where('id', $id)->first();

        $data = [
            'admin_email' =>  $admin->email,
            "program_id" => $program_details->id,
            "program_code" => $program_details->code,
            "program_name" => $program_details->name,
            'datetime_join' => $client_program->created_at,
            "payment_type" => $client_program->payment_type,
            "payment_status" => $client_program->payment_status,
            "no_of_employees" => $client_program->no_of_employees,
            "venue" => $client_program->client_venue,
            "option" => $client_program->option,
            "start_date" => $client_program->start_date,
            "end_date" => $client_program->end_date,
            "client_notes" => $client_program->client_notes,

            'feedback_id' => $feedback->id,
            'feedback_content' => $feedback->feedback,
            'image_path' => $feedback->image_path,
            'created_at' => $feedback->created_at,
            'updated_at' => $feedback->updated_at,

            "user_id" => $users->id,
            'user_name' => $feedback->client_name,
            'user_email' => $users->email,
            "company_name" => $client_program->company_name,
        ];

        app('App\Http\Controllers\NewController\ClientFeedbackEmailNotificationController')->sendEmail($data, 'new');

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

        date_default_timezone_set("Asia/Kuala_Lumpur");

        $feedback->save();

        $users = DB::table("users")->where('id', Auth::user()->id)->first();
        $admin = DB::table('users')->where('email', 'kokwei325@gmail.com')->first();
        $client_program = DB::table("client_programs")->where('program_id', $feedback->program_id)->where('user_id',Auth::user()->id)->first();
        $program_details = DB::table('programs')->where('id', $request->clientprogramid)->first();

        $data = [
            'admin_email' =>  $admin->email,
            "program_id" => $program_details->id,
            "program_code" => $program_details->code,
            "program_name" => $program_details->name,
            'datetime_join' => $client_program->created_at,
            "payment_type" => $client_program->payment_type,
            "payment_status" => $client_program->payment_status,
            "no_of_employees" => $client_program->no_of_employees,
            "venue" => $client_program->client_venue,
            "option" => $client_program->option,
            "start_date" => $client_program->start_date,
            "end_date" => $client_program->end_date,
            "client_notes" => $client_program->client_notes,

            'feedback_id' => $feedback->id,
            'feedback_content' => $feedback->feedback,
            'image_path' => $feedback->image_path,
            'created_at' => $feedback->created_at,
            'updated_at' => $feedback->updated_at,

            "user_id" => $users->id,
            'user_name' => $feedback->client_name,
            'user_email' => $users->email,
            "company_name" => $client_program->company_name,
        ];

        app('App\Http\Controllers\NewController\ClientFeedbackEmailNotificationController')->sendEmail($data, 'updated');

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
