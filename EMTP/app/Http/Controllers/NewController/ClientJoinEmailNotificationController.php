<?php

namespace App\Http\Controllers\NewController;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\ClientJoinEmailNotification;

class ClientJoinEmailNotificationController extends Controller
{
    public function sendEmail($data)
    {
        Mail::to($data['admin_email'])->send(new ClientJoinEmailNotification($data));
        return back();
    }
}
