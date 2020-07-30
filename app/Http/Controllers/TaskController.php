<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TaskController extends Controller
{
  public function index()
  {
    $tasks = Task::all();
    return view('tasks.index',compact('tasks'));
  }

  public function store(Request $request)
  {
    Task::create($request->all())->save();
    Session::flash('message', 'Tarea registrada con Exito');
    return redirect()->route('task');
  }

  public function edit($id)
  {
    $task = Task::find($id);
    return view('tasks.edit',compact('task'));
  }

  public function update(Request $request, $id)
  {
    $task = Task::find($id);
    $task->update($request->all());
    Session::flash('message', 'Tarea Edita con Exito');
    return redirect()->route('task');
  }

  public function delete($id)
  {
    Task::find($id)->delete();
    Session::flash('message', 'Tarea Eliminada con Exito');
    return redirect()->route('task');
  }

}
