@extends('layouts.app')
@section('content')
<div class="page-wrapper">
  <div class="container-fluid">
    <div class="row page-titles">
      <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Bienvenido</h4>
      </div>

      <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Inicio</a></li>
            <li class="breadcrumb-item active">Tareas</li>
            <li class="breadcrumb-item">
              <button type="button" class="btn btn-info btngrande" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus-circle"></i> Agregar Tarea</button>
              <button type="button" class="btn btn-info btncelular btn-circle" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus-circle"></i> </button>
            </li>
          </ol>

        </div>
      </div>
  </div>
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="card">
          <div class="card-body">
            @if(Session::has('message'))
              <div class="alert alert-success">
                {!! Session::get('message') !!}
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              </div>
            @endif
            <div class="table-responsive">
              <table class="table" id="tabla">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Tipo de Tarea</th>
                    <th>Fecha de Creación</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($tasks as $task)
                      <tr>
                        <td>{{$task->id}}</td>
                        <td>{{$task->name}}</td>
                        <td>{{$task->type == 1 ? 'PRIVADA' : 'PUBLICA'}}</td>
                        <td>{{ Carbon\Carbon::parse($task->created_at)->format('d-m-Y') }}</td>
                        <td><a  class="btn btn-warning" href="{{ route('editTask',$task->id) }}">Editar</a></td>
                        <td>
                          <form class="user"  action="{{route('deleteTask', $task->id)}}" method="post">
                            {{ method_field('delete') }}
                            {{csrf_field()}}
                            <button class="btn btn-btn-outline-light"  onclick="return confirm('¿Esta seguro de eliminar este registro?')"  type="submit">ELIMINAR</button>
                          </form>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear Tarea</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('createTask') }}" id="formTarea">
          @csrf
          <div class="form-group row">
              <label for="name" class="col-md-12 col-form-label">Nombre de la Tarea</label>
              <div class="col-md-12">
                  <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
              </div>
          </div>
          <div class="form-group row">
            <div class="custom-control custom-radio">
              <input type="radio" id="privado" value="1" checked name="type" class="custom-control-input">
              <label class="custom-control-label"  for="privado">Tarea Privada</label>
            </div>
            <div class="custom-control custom-radio">
              <input type="radio" id="publico" value="2"  name="type" class="custom-control-input">
              <label class="custom-control-label"  for="publico">Tarea Publica</label>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </form>
      </div>
    </div>
  </div>
</div>
@endsection
