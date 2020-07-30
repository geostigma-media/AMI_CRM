<?php

namespace App\Mail;

use App\Clients;
use App\TemplateEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LectorAmiContado extends Mailable
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
    $templateEmails = TemplateEmail::where('type', 1)->where('id', $request->tipoContrato)->get();
    return $this->view('emails.EmailRegistro', compact('student', 'idAsesor', 'templateEmails', 'idContrato', 'client'));
  }
}
