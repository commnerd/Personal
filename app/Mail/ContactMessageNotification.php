<?php

namespace App\Mail;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
use App\ContactMessage as Message;
use Illuminate\Mail\Mailable;
use Illuminate\Bus\Queueable;

class ContactMessageNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $msg;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Message $msg)
    {
        $this->msg = $msg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $app = env('APP_NAME');
        $subject = "[$app] From: ".$this->msg->name." (".$this->msg->email_phone.")";
        return $this->from(env('APP_ADMIN_EMAIL'))
                    ->subject($subject)
                    ->view('emails.contact-message.notification')
                    ->text('emails.contact-message.notification-plain');
    }
}
