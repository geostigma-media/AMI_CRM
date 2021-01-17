<?php

namespace App\Mail;

use App\TemplateEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailContractClient extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct()
    {}

    public function build(Request $request)
    {
      $this->subject('Lector AMI Contrato');

      $contract = $request->all();
      $templateEmails = TemplateEmail::where('type',2)->get();

      return $this->view('emails.contractClient',compact('contract','templateEmails'));
    }
}
