@extends('layouts.app')

@section('content')
<style>
  @media (max-width: 992px) {
    .btncelular {
      display: block !important;
    }
    .btngrande{
      display:none;
    }
  }
  </style>
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
            <li class="breadcrumb-item active">Asesores</li>
            <li class="breadcrumb-item">
              <button type="button" class="btn btn-info  btngrande" data-toggle="modal" data-target="#exampleModal">
              <i class="fa fa-plus-circle"></i> Agregar Asesor</button>
              <button type="button" class="btn btn-info btn-circle btncelular"  data-toggle="modal" data-target="#exampleModal">
              <i class="fa fa-plus-circle"></i> Agregar Asesor</button>
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
            @if($errors->any())
              <div class="alert alert-danger" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
                  @foreach($errors->all() as $error)
                      {{ $error }}<br/>
                  @endforeach
              </div>
            @endif
            <div class="table-responsive">
              <table class="table" id="tabla">
                <thead>
                  <tr>
                    <th>Nombre Completo</th>
                    <th>N° Cedula</th>
                    <th>Correo</th>
                    <th>Telefono</th>
                    <th>Editar</th>
                    <th>Desactivar</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($asesores as $asesor)
                      <tr>
                        <td>{{$asesor->name}}  {{$asesor->lastname}}</td>
                        <td>{{$asesor->numIdentification}}</td>
                        <td>{{$asesor->email}}</td>
                        <td>{{$asesor->phone}}</td>
                        <td><a  class="btn btn-warning" href="{{ route('editAsesor',$asesor->id) }}">Editar</a></td>
                        @if ($asesor->password == '')
                          <td>
                            <button class="btn btn-btn-outline-light" disabled>DESACTIVADO</button>
                          </td>
                        @else
                          <td>
                            <form class="user"  action="{{route('disabledAsesor', $asesor->id)}}" method="post">
                              {{ method_field('put') }}
                              {{csrf_field()}}
                              <input type="hidden" name="password" value="">
                              <button class="btn btn-btn-outline-light"  onclick="return confirm('¿Esta seguro de desactivar este asesor?')"  type="submit">DESACTIVAR</button>
                            </form>
                          </td>
                        @endif

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
        <h5 class="modal-title" id="exampleModalLabel">Crear Asesor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('asesorStore') }}" id="formAsesor">
          @csrf
          <div class="form-group row">
              <label for="name" class="col-md-12 col-form-label">Nombres</label>
              <div class="col-md-12">
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <div class="form-group row">
            <label for="lastname" class="col-md-12 col-form-label">Apellidos</label>
            <div class="col-md-12">
                <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname">
            </div>
          </div>

          <div class="form-group row">
            <label for="numIdentification" class="col-md-12 col-form-label">Numero de identificación</label>
            <div class="col-md-12">
                <input id="numIdentification" type="text" class="form-control @error('numIdentification') is-invalid @enderror" name="numIdentification" value="{{ old('numIdentification') }}" required autocomplete="numIdentification" autofocus>
                @error('numIdentification')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
          </div>

          <div class="form-group row">
              <label for="email" class="col-md-12 col-form-label">Correo Electronico</label>

              <div class="col-md-12">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>
          <div class="form-group row">
              <label for="phone" class="col-md-12 col-form-label">Numero de Telefono</label>

              <div class="col-md-12">
                  <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                  <input type="hidden" name="role" value="2">

                  @error('phone')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
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
