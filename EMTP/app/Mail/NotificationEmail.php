<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Models\FeedbackNotification;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $status)
    {
        $this->notification_mail_data = $data;
        $this->action_status = $status;
        if($this->action_status == "new") {
            $this->subject = "New Client Feedback [".$data['program_code']." ".$data['program_name']."]";

            FeedbackNotification::create([
                'subject' => $this->subject,
                'content' => $data['content'],
            ]);
        }
        else {
            $this->subject = "Updated Client Feedback [".$data['program_code']." ".$data['program_name']."]";

            FeedbackNotification::where('id', $data['feedback_id'])->update([
                'subject' => $this->subject,
                'content' => $data['content'],
            ]);
        }
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->action_status == "new") {
            return $this->from('notification.emtp.dp2@gmail.com', 'notification emtp')->subject($this->subject)->view('mail.notify_new_client_feedback',['mail_data'=>$this->notification_mail_data]);
        }
        else{
            return $this->from('notification.emtp.dp2@gmail.com', 'notification emtp')->subject($this->subject)->view('mail.notify_updated_client_feedback',['mail_data'=>$this->notification_mail_data]);
        }
    }
}
