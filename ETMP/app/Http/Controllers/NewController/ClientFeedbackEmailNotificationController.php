<?php

namespace App\Http\Controllers\NewController;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\ClientFeedbackEmailNotification;

class ClientFeedbackEmailNotificationController extends Controller
{
    public function sendEmail($data, $status)
    {
        Mail::to($data['admin_email'])->send(new ClientFeedbackEmailNotification($data, $status));
        return back();
    }
}
