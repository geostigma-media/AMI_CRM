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
              <li class="breadcrumb-item active">Plantillas de Correos</li>
              <li class="breadcrumb-item">
                @if ($templatesEmailCount == 13)
                  <button type="button" class="btn btn-danger btngrande" disabled>
                  <i class="fa fa-dismit"></i> Limite de Plantillas</button>
                  <button type="button" class="btn btn-danger btncelular btn-circle" disabled>
                  <i class="fa fa-dismit"></i></button>
                @else
                  <button type="button" class="btn btn-info btngrande" data-toggle="modal" data-target="#exampleModal">
                  <i class="fa fa-plus-circle"></i> Agregar Plantilla</button>
                  <button type="button" class="btn btn-info btncelular btn-circle" data-toggle="modal" data-target="#exampleModal">
                  <i class="fa fa-plus-circle"></i> </button>
                @endif
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
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Titulo</th>
                    <th scope="col">Texto Primario</th>
                    <th scope="col">Tipo de Plantilla</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($templatesEmail as $item)
                    <tr>
                      <th scope="row">{{$item->title}}</th>
                      <td>{{$item->firstText}}</td>
                      <td>{{$item->type == 1 ? 'Plantilla Pago' : 'Plantilla Contrato'}}</td>
                      <td>
                        <a class="btn btn-warning" href="{{ route('editPlantilla',$item->id) }}">Editar</a>
                      </td>
                      <td>
                        <form class="user"  action="{{route('deleteEmail', $item->id)}}" method="post">
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
        <h5 class="modal-title" id="exampleModalLabel">Crear Plantilla de Emial</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  action="{{route('store')}}" id="formEmails" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="form-group">
            <label for="title">Titulo</label>
            <input type="text" value="" class="form-control" id="title" name="title">
          </div>
          <div class="form-group">
            <label for="firstText">Texto Principal</label>
            <textarea name="firstText" class="form-control" id="firstText" cols="30" rows="10" style="resize: none"></textarea>
          </div>
          <div class="form-group">
            <label for="image">Imagen</label>
            <input type="file" name="image" id="image" value="">
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
