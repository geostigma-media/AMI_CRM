<?php

namespace App\Mail;

use App\Clients;
use App\Contracts;
use App\TemplateEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LectorAmiContrato extends Mailable
{
  use Queueable, SerializesModels;

  public function __construct()
  {
  }

  public function build(Request $request)
  {
    $client = Clients::where('id', $request->nombreEstudiante)->first();
    $student = $request->all();
    $contract = Contracts::where('id', $request->tipoContrato)->first();
    $idAsesor = Auth()->user()->id;
    $templateEmail = TemplateEmail::where('id', $contract->emailId)->first();
    return $this->view('emails.contractTemplate', compact('templateEmail', 'contract', 'student', 'idAsesor', 'client'));
  }
}
