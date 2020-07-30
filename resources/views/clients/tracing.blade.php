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
            <li class="breadcrumb-item"><a href="{{ route('clients') }}">Clientes</a></li>
            <li class="breadcrumb-item active">Seguimiento</li>
            <li class="breadcrumb-item">
              <button type="button" class="btn btn-info btngrande" data-toggle="modal" data-target="#exampleModal">
              <i class="fa fa-plus-circle"></i> Agregar Seguimiento</button>
              <button type="button" class="btn btn-info btncelular btn-circle" data-toggle="modal" data-target="#exampleModal">
              <i class="fa fa-plus-circle"></i> Agregar Seguimiento</button>
            </li>
          </ol>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-body">
              <h4 class="card-title">Historial de seguimiento para {{$client->name}}</h4>
                  @if(Session::has('message'))
                  <div class="alert alert-success">
                    {!! Session::get('message') !!}
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  </div>
                @endif
                  <div class="table-responsive">
                    <table id="tabla" class="table m-t-30 table-hover no-wrap contact-list footable-loaded footable" data-page-size="10">
                      <thead>
                        <tr>
                          <th class="footable-sortable">#<span class="footable-sort-indicator"></span></th>
                          <th class="footable-sortable">Nombre Cliente<span class="footable-sort-indicator"></span></th>
                          <th class="footable-sortable">Correo Electronico<span class="footable-sort-indicator"></span></th>
                          <th class="footable-sortable">Observación<span class="footable-sort-indicator"></span></th>
                          <th class="footable-sortable">Tarea<span class="footable-sort-indicator"></span></th>
                          <th class="footable-sortable">Fecha y Hora<span class="footable-sort-indicator"></span></th>
                          @if (Auth()->user()->role == 1)
                            <th class="footable-sortable">Eliminar<span class="footable-sort-indicator"></span></th>
                          @endIf
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($tracing as $item)
                          <tr class="footable-even" style="">
                            <td><span class="footable-toggle"></span>{{$item->id}}</td>
                            <td><span class="footable-toggle"></span>{{$item->client->name}}</td>
                            <td><span class="footable-toggle"></span>{{$item->client->email}}</td>
                            <td><span class="footable-toggle"></span>{{$item->observation}}</td>
                            <td><span class="label label-success">{{$item->task->name}}</span> </td>
                            <td><span class="">{{Carbon\Carbon::parse($item->task->created_at)->format('d-m-Y h:m')}}</span> </td>
                            @if (Auth()->user()->role == 1)
                              <td>
                                <form class="user"  action="{{route('deleteTracing', $item->id)}}" method="post">
                                  {{ method_field('delete') }}
                                  {{csrf_field()}}
                                  <button type="submit" onclick="return confirm('¿Esta seguro de eliminar este registro?')" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip"
                                  data-original-title="Delete">
                                  <i class="fas fa-close" aria-hidden="true"></i></button>
                                </form>
                              </td>
                            @endIf
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
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
        <h5 class="modal-title" id="exampleModalLabel">Agregar Seguimiento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form
          class="ui form"
          action="{{route('storeTracing')}}"
          id="seguimiento"
          method="POST">
          {{ method_field('post') }}
          {{csrf_field()}}
          <input type="hidden" name="clientId" id="clientId" value="{{$client->id}}" />
          <div class="form-group">
            <label>Tarea</label>
            @if (Auth()->user()->role == 1)
              <select class="form-control select2" style="width: 100%;" id="taskId" name="taskId">
                <option value=""></option>
                @foreach ($tasksAdmin as $task)
                  <option value="{{$task->id}}">{{$task->name}}</option>
                @endforeach
              </select>
            @else
              <select class="form-control select2" style="width: 100%;" id="taskId" name="taskId">
                <option value=""></option>
                @foreach ($tasksAsesor as $task)
                  <option value="{{$task->id}}">{{$task->name}}</option>
                @endforeach
              </select>
            @endif
          </div>
          <div class="form-group">
            <label>Observación</label>
            <textarea class="form-control" style="resize: none" id="observation" name="observation"></textarea>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </form>
      </div>
    </div>
  </div>
</div>
@endsection
