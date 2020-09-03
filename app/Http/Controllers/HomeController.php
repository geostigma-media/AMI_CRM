<?php

namespace App\Http\Controllers;

use App\Clients;
use App\Contracts;
use App\Mail\LectorAmiContrato;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $clientesPaySuccess = Clients::with('asesor')->where('pay', 'SI')->get();
    $clientesPayPending = Clients::with('asesor')->where('pay', null)->get();
    $clientesAsesor = Clients::with('asesor')
      ->where('pay', 'SI')
      ->where('asesorId', Auth()->user()->id)
      ->get();
    $contracts = Contracts::all();
    $emailsPromotions = Contracts::where('emailId', '!=', null)->get();
    $clientesPaySuccessCount = Clients::with('asesor')->where('pay', 'SI')->count();
    $clientesPayPendingCount = Clients::with('asesor')->where('pay', null)->count();
    $asesorCount  = User::where('role', 2)->count();

    $clientesPaySuccessAsesorCount = Clients::with('asesor')
      ->where('pay', 'SI')
      ->where('asesorId', Auth()->user()->id)
      ->count();
    $clientesPayPendingAsesorCount = Clients::with('asesor')
      ->where('pay', null)
      ->where('asesorId', Auth()->user()->id)
      ->count();

    $clients = Clients::with('asesor')
      ->where('pay', null)
      ->where('asesorId', Auth()->user()->id)
      ->get();

    $allClients = Clients::where('pay', null)->get();
    $allClientsPromocion = Clients::where('pay', 'SI')->get();
    $allClientsAsesor = Clients::with('asesor')
      ->where('pay', 'SI')
      ->where('asesorId', Auth()->user()->id)
      ->get();
    return view('home', compact(
      'clientesPaySuccess',
      'clientesPayPending',
      'clientesAsesor',
      'contracts',
      'clientesPaySuccessCount',
      'clientesPayPendingCount',
      'asesorCount',
      'clientesPaySuccessAsesorCount',
      'clientesPayPendingAsesorCount',
      'clients',
      'emailsPromotions',
      'allClients',
      'allClientsAsesor',
      'allClientsPromocion'
    ));
  }

  public function sendinfopay(Request $request)
  {

    if ($request->email) {
      Mail::to($request->email)->send(new LectorAmiContrato());
      Session::flash('message', 'Correo electronico enviado con exito');
      return redirect()->route('home');
    } else {
      Session::flash('messageErrorEmail', 'Ocurrio un error, por favor selecciona nuevamente el cliente o actualiza la pagina');
      return redirect()->route('home');
    }
  }

  public function loadClient($id)
  {
    return response()->json(Clients::where('id', $id)->get());
  }

  public function loadClientSendEmail($id)
  {
    return response()->json(Clients::where('id', $id)->get());
  }
  public function loadClientSendEmail2($id)
  {
    return response()->json(Clients::where('id', $id)->get());
  }

  public function paySuccess(Request $request, $id)
  {
    $client = Clients::find($id);
    $client->pay = $request->pay;
    $client->save();
    Session::flash('message', 'Pago validado con exito');
    return redirect()->route('home');
  }
}
