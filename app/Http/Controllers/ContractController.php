<?php

namespace App\Http\Controllers;


use App\Clients;
use App\Contracts;
use App\Mail\SendMailContractAdmin;
use App\Mail\SendMailContractClient;
use App\TemplateEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;

class ContractController extends Controller
{
  public function index()
  {
    $contracts = Contracts::all();
    $templatesEmail = TemplateEmail::all();
    return view('formsContrato.index', compact('contracts', 'templatesEmail'));
  }

  public function contract()
  {
    $contractsCount = Contracts::count();
    $s = $_GET['contrato'];
    $contract = Contracts::where('id', $_GET['contrato'])->get();
    $tituloContrato = $contract[0]->title;
    $date_now = date("Y-m-d");
    $date_now_hours = date("Y-m-d H:i:s");
    return view('formsContrato.contract', compact('contractsCount', 'contract', 'date_now', 'date_now_hours', 'tituloContrato'));
  }

  public function store(Request $request)
  {
    Contracts::create($request->all());
    Session::flash('message', 'Contrato creado con exito');
    return redirect()->route('contracs');
  }

  public function editContract(Request $request, $id)
  {
    $contract = Contracts::with('emails')->find($id);
    $templatesEmail = TemplateEmail::all();
    return view('formsContrato.edit', compact('contract', 'templatesEmail'));
  }

  public function updateContract(Request $request, $id)
  {

    $contract = Contracts::find($id);
    $contract->title = $request->title;
    $contract->firstText = $request->firstText;
    $contract->secondText = $request->secondText;
    $contract->link = $request->link;
    $contract->emailId = $request->emailId;
    $contract->save();
    Session::flash('message', 'Contrato editado con éxito');
    return redirect()->route('contracs');
  }

  public function contractPay(Request $request)
  {

    $request->validate([
      'numIdenficication' => 'required',
      'front_photo_document' => 'required|mimes:jpeg,png|max:4028',
      'back_photo_document' => 'required|mimes:jpeg,png|max:4028',
      'sign_photo' => 'required|mimes:jpeg,png|max:4028',
    ]);

    $clientDocument = $request->numIdenficication;
    
    $imgFrontDocument = Image::make($request->front_photo_document)
      ->resize(null, 500, function ($constraint) {
        $constraint->aspectRatio();
      })->encode('jpg', 65)
      ->orientate();


    $imgBackDocument = Image::make($request->back_photo_document)
      ->resize(null, 500, function ($constraint) {
        $constraint->aspectRatio();
      })->encode('jpg', 65)
      ->orientate();

    $imgSign = Image::make($request->sign_photo)
      ->resize(null, 500, function ($constraint) {
        $constraint->aspectRatio();
      })->encode('jpg', 65)
      ->orientate();

    $frontDocumentFilename = $clientDocument . '-foto-cedula-frente-' . time() . '.jpg';
    $backDocumentFilename = $clientDocument . '-foto-cedula-trasera-' . time() . '.jpg';
    $signFilename = $clientDocument . '-foto-firma-' . time() . '.jpg';
    
    

    $imgFrontDocument->save(public_path('/documentos/' . $frontDocumentFilename));
    $imgBackDocument->save(public_path('/documentos/' . $backDocumentFilename));
    $imgSign->save(public_path('/documentos/' . $signFilename));


    $request->request->add(['front_document_photo' => $frontDocumentFilename]);
    $request->request->add(['back_document_photo' => $backDocumentFilename]);
    $request->request->add(['sign_client_photo' => $signFilename]);
    

    $client = Clients::find($request->clientId);
    $client->fill($request->all());
    $client->save();

    Mail::to($request->email)->send(new  SendMailContractClient());
    Mail::to('gerencia@lectorami.com')->send(new SendMailContractAdmin());
    Mail::to('desarrollo@geostigmamedia.com')->send(new SendMailContractAdmin());
    Session::flash('message', 'Correo electronico enviado y Cliente registrado con exito');
    return Redirect::to('https://marketing.lectorami.co/');
  }

  public function destroy($id)
  {
    Contracts::find($id)->delete();
    Session::flash('message', 'Contrato eliminada con exito');
    return redirect()->route('contracs');
  }
}
