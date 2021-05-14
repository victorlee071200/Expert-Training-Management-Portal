<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Models\FeedbackNotification;
use App\Models\ClientJoinNotification;
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
        $this->profile_image = $data['profile_path'];
        $this->image = $data['image_path'];
        $this->notification_mail_data = $data;
        $this->action_status = $status;

        if ($this->action_status == "new") {
            $this->subject = "New Client Feedback [".$data['program_code']." ".$data['program_name']."]";

            FeedbackNotification::create([
                'subject' => $this->subject,
                'content' => $data['content'],
            ]);
        }
        if ($this->action_status == "new_client_join") {
            $this->subject = "New Client Join [".$data['program_code']." ".$data['program_name']."]";

            ClientJoinNotification::create([
                'subject' => $this->subject,
                'content' => "Welcome ".$data['user_name']." joins ".$data['program_code']."!",
            ]);
        }
        if ($this->action_status == "updated") {
            $this->subject = "Updated Client Feedback [".$data['program_code']." ".$data['program_name']."]";

            FeedbackNotification::create([
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
        if ($this->action_status == "new") {
            return $this->from('notification.emtp.dp2@gmail.com', 'notification emtp')->subject($this->subject)->view('mail.notify_new_client_feedback',['mail_data'=>$this->notification_mail_data,'profile'=>$this->profile_image, 'image'=>$this->image]);
        }
        if ($this->action_status == "new_client_join") {
            return $this->from('notification.emtp.dp2@gmail.com', 'notification emtp')->subject($this->subject)->view('mail.notify_new_client_join',['mail_data'=>$this->notification_mail_data]);
        }
        if ($this->action_status == "updated") {
            return $this->from('notification.emtp.dp2@gmail.com', 'notification emtp')->subject($this->subject)->view('mail.notify_updated_client_feedback',['mail_data'=>$this->notification_mail_data,'profile'=>$this->profile_image, 'image'=>$this->image]);
        }
    }
}
