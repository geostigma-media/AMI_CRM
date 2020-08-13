<?php

namespace App\Http\Controllers;

use App\Clients;
use App\Exports\ClientsExport;
use App\Http\Requests\ClientsRequest;
use App\Task;
use App\TracingClient;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class ClientsController extends Controller
{
  public function index()
  {
    $clientsListAdmin = Clients::where('pay', 'SI')->get();
    $clientsList = Clients::where('asesorId', '!=', 1)->where('pay', null)->get();
    $clientsListAsesorMatriculado = Clients::with('asesor')
      ->where('asesorId', Auth()->user()->id)
      ->where('pay', 'SI')
      ->get();
    $clientsListAsesorSinMatricula = Clients::with('asesor')
      ->where('asesorId', Auth()->user()->id)
      ->where('pay', null)
      ->get();
    return view('clients.index', compact('clientsListAdmin', 'clientsList', 'clientsListAsesorMatriculado', 'clientsListAsesorSinMatricula'));
  }

  public function store(ClientsRequest $request)
  {

    Clients::create($request->all())->save();
    Session::flash('message', 'Cliente registrado con Exito');
    return redirect()->route('clients');
  }

  public function edit($id)
  {
    $client = Clients::with('asesor')->find($id);
    $asesores = User::where('role', 2)->where('password', '!=', '')->get();
    return view('clients.edit', compact('client', 'asesores'));
  }

  public function updateCliente(Request $request, $id)
  {
    $client = Clients::find($id);
    $client->update($request->all());
    Session::flash('message', 'Cliente Editar con Exito');
    return redirect()->route('clients');
  }

  public function tracing($id)
  {
    $client = Clients::find($id);
    $tasksAdmin = Task::where('type', 1)->get();
    $tasksAsesor = Task::where('type', 2)->get();
    $tracing = TracingClient::with('client', 'task')->where('clientId', $id)->get();
    return view('clients.tracing', compact(
      'tracing',
      'client',
      'tasksAdmin',
      'tasksAsesor'
    ));
  }

  public function storeTracing(Request $request)
  {
    TracingClient::create($request->all())->save();
    Session::flash('message', 'Seguimiento creado con Exito');
    return redirect()->back();
  }

  public function deleteTracing($id)
  {
    TracingClient::find($id)->delete();
    Session::flash('message', 'Seguimiento Eliminado con Exito');
    return redirect()->route('clients');
  }

  public function loadExcel()
  {
    return Excel::download(new ClientsExport, 'Clientes.xlsx');
  }

  public function dowloadContract($id)
  {
    $contrato = Clients::select('id', 'contract')->where('id', $id)->get();
    $pdf = \PDF::loadView('clients.contrato', compact('contrato'));
    return $pdf->download('Contrato.pdf');
  }

  public function delete($id)
  {
    Clients::find($id)->delete();
    Session::flash('message', 'Cliente Eliminado con Exito');
    return redirect()->route('clients');
  }
}
