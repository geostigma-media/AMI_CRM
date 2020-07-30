<?php

namespace App\Http\Controllers;

use App\Mail\RegisterAsesorEmail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AsesorController extends Controller
{
  public function index()
  {
    $asesores = User::where('role', 2)->get();
    return view('asesores.index', compact('asesores'));
  }

  public function store(Request $request)
  {
    $asesor = new User();
    $asesor->name = $request->name;
    $asesor->email = $request->email;
    $asesor->numIdentification = $request->numIdentification;
    $asesor->password = Hash::make($request->numIdentification);
    $asesor->lastname = $request->lastname;
    $asesor->phone = $request->phone;
    $asesor->role = 2;
    $asesor->save();
    Mail::to($request->email)->send(new RegisterAsesorEmail());
    Session::flash('message', 'Asesor creado con exito');
    return redirect()->route('asesors');
  }

  public function editAsesor(Request $request, $id)
  {
    $asesor = User::find($id);
    return view('asesores.edit', compact('asesor'));
  }

  public function updateAsesor(Request $request, $id)
  {
    $asesor = User::find($id);
    if ($request->password == '') {
      $asesor->name = $request->name;
      $asesor->email = $request->email;
      $asesor->numIdentification = $request->numIdentification;
      $asesor->lastname = $request->lastname;
      $asesor->phone = $request->phone;
    } else {
      $asesor->name = $request->name;
      $asesor->email = $request->email;
      $asesor->numIdentification = $request->numIdentification;
      $asesor->lastname = $request->lastname;
      $asesor->phone = $request->phone;
      $asesor->password = Hash::make($request->password);
    }
    $asesor->update();
    Session::flash('message', 'Asesor actualizado con exito');
    return redirect()->route('asesors');
  }

  public function disabledAsesor($id)
  {
    $asesor = User::find($id);
    $asesor->password = '';
    $asesor->update();
    Session::flash('message', 'Asesor desactivado, para volver a activar debe asignarle una constraseña nuevamente');
    return redirect()->route('asesors');
  }
}
