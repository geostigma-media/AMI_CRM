<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailSendmailPayAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(){}

    public function build(Request $request)
    {
        $student = $request->all();
        return $this->view('emails.payAdmin',compact('student'));
    }
}
