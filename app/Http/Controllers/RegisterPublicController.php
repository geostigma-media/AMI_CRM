<?php

namespace App\Http\Controllers;

use App\Clients;
use App\Http\Requests\ClientsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RegisterPublicController extends Controller
{
  public function index()
  {
    return view('registrerClientes');
  }

  public function store(ClientsRequest $request)
  {
    Clients::create($request->all());
    Session::flash('message', 'Cliente registrado con Exito');
    return redirect()->route('login');
  }
}
