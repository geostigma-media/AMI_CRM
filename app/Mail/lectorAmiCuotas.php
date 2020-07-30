<?php

namespace App\Mail;

use App\Clients;
use App\TemplateEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;

class lectorAmiCuotas  extends Mailable
{
  use Queueable, SerializesModels;

  public function __construct()
  {
  }

  public function build(Request $request)
  {
    $client = Clients::where('id', $request->nombreEstudiante)->first();
    $student = $request->all();
    $idContrato = intval($request->tipoContrato);
    $idAsesor = Auth()->user()->id;
    $templateEmails = TemplateEmail::where('id', 2)->get();
    return $this->view('emails.EmialInfo', compact('student', 'idAsesor', 'templateEmails', 'idContrato', 'client'));
  }
}
