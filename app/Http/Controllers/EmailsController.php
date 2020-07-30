<?php

namespace App\Http\Controllers;

use App\Contracts;
use App\TemplateEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EmailsController extends Controller
{
  public function index()
  {
    $templatesEmail = TemplateEmail::all();
    $templatesEmailCount = TemplateEmail::count();
    return view('emails.index', compact('templatesEmail', 'templatesEmailCount'));
  }

  public function editPlantilla($id)
  {
    $templateEmail = TemplateEmail::find($id);
    return view('emails.edit', compact('templateEmail'));
  }

  public function store(Request $request)
  {
    $templateEmail = new TemplateEmail;
    $templateEmail->title = $request->title;
    $templateEmail->firstText = $request->firstText;
    $templateEmail->type = 1;
    if ($request->hasFile('image')) {
      $file = $request->file('image');
      $name1 = $file->getClientOriginalName();
      $file->move(public_path() . '/images/', $name1);
      $templateEmail->image = $name1;
    }
    $templateEmail->save();
    Session::flash('message', 'Template creada con exito');
    return redirect()->route('emails');
  }

  public function updatePlantilla(Request $request, $id)
  {
    $templateEmail = TemplateEmail::find($id);
    $templateEmail->title = $request->title;
    $templateEmail->firstText = $request->firstText;
    if ($request->hasFile('image')) {
      $file = $request->file('image');
      $name1 = $file->getClientOriginalName();
      $file->move(public_path() . '/images/', $name1);
      $templateEmail->image = $name1;
    }
    $templateEmail->save();
    Session::flash('message', 'Template actualizada con exito');
    return redirect()->route('emails');
  }

  public function destroy($id)
  {
    TemplateEmail::find($id)->delete();
    Session::flash('message', 'Template eliminado con exito');
    return redirect()->route('emails');
  }

  public function loadTemplate($id)
  {
    return response()->json(Contracts::select('emailId', 'link')->where('id', $id)->get());
  }

  public function loadTemplatePromotion($id)
  {
    return response()->json(Contracts::select('emailId', 'link')->where('id', $id)->get());
  }
}
