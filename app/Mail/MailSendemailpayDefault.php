<?php

namespace App\Mail;

use App\Clients;
use App\TemplateEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailSendemailpayDefault extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct()
    {}

    public function build(Request $request)
    {
      $client = Clients::where('id',$request->nombreEstudiante)->first();
      $student = $request->all();
      $template = $request->idtemplate;
      $idContrato = intval($request->tipoContrato);
      $templateSelected = TemplateEmail::where('id',$template)->get();
      $idAsesor = Auth()->user()->id;
      $templateEmails = TemplateEmail::where('type',1)->get();
      return $this->view('emails.plantillas_extras.'.$template,compact('student','templateSelected','idAsesor','templateEmails','idContrato','client'));
    }
}
