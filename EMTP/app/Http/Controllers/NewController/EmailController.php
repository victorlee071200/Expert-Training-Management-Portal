<?php

namespace App\Http\Controllers\NewController;

use App\Mail\NotificationEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail($data, $status)
    {
        // Mail::send('notification.emtp.dp2@gmail.com', $data, function($message) use ($data) {
        //   $message->to($data['email'])->subject($data['subject']);
        // });
        Mail::to($data['admin_email'])->send(new NotificationEmail($data, $status));

        return back();
    }
}
