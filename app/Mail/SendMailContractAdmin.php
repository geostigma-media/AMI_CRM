<?php

namespace App\Mail;

use App\Clients;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailContractAdmin extends Mailable
{
  use Queueable, SerializesModels;

  public function __construct()
  {
  }

  public function build(Request $request)
  {
    $client = $request->all();
    $contract = Clients::where('email', $request->email)->first();
    return $this->view('emails.contractAdmin', compact('client', 'contract'));
  }
}
