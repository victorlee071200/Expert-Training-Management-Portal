<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Models\ClientJoinNotification;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ClientJoinEmailNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->notification_mail_data = $data;
        $this->subject = "New Client Join [".$data['program_code']." ".$data['program_name']."]";

        ClientJoinNotification::create([
            'subject' => $this->subject,
            'content' => "Welcome ".$data['user_name']." joins ".$data['program_code']."!",
        ]);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('notification.emtp.dp2@gmail.com', 'notification emtp')->subject($this->subject)->view('mail.notify_new_client_join',['mail_data'=>$this->notification_mail_data]);
    }
}
