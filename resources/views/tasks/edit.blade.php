@extends('layouts.app')
@section('content')
<div class="page-wrapper">
  <div class="container-fluid">
    <div class="row page-titles">
      <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Bienvendio</h4>
      </div>
      <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Inicio</a></li>
              <li class="breadcrumb-item"><a href="/tareas">Gestion de Tarea</a></li>
              <li class="breadcrumb-item activate"><a href="#">Editar Tarea</a></li>
            </ol>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <form action="{{route('updateTask',$task->id)}}" method="POST" id="formTarea">
              {{csrf_field()}}
              {{ method_field('put') }}
              <div class="form-group row">
                <label for="name" class="col-md-12 col-form-label">Nombre de la Tarea</label>
                <div class="col-md-12">
                  <input value="{{$task->name}}" id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                </div>
              </div>
              <div class="form-group row">
                <div class="custom-control custom-radio">
                  <input type="radio" id="privado" value="1" {{$task->type == 1 ? 'checked' : ''}} name="type" class="custom-control-input">
                  <label class="custom-control-label"  for="privado">Tarea Privada</label>
                </div>
                <div class="custom-control custom-radio ml-2">
                  <input type="radio" id="publico" value="2" {{$task->type == 2 ? 'checked' : ''}} name="type" class="custom-control-input">
                  <label class="custom-control-label"  for="publico">Tarea Publica</label>
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Editar Tarea</button>
              <a href="/tareas" class="btn btn-warning">Cancelar</a >
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
