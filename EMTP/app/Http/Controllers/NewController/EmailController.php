<?php

namespace App\Http\Controllers\NewController;

use App\Mail\NotificationEmail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail($data, $status)
    {
        Mail::to($data['admin_email'])->send(new NotificationEmail($data, $status));
        return back();
    }
}
