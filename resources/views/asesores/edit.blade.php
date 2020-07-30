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
              <li class="breadcrumb-item"><a href="/asesores">Gestion de Asesores</a></li>
              <li class="breadcrumb-item activate"><a href="#">Editar {{Auth()->user()->name}}</a></li>
            </ol>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <form action="{{route('updateAsesor',$asesor->id)}}" method="POST" id="formAsesor">
              {{csrf_field()}}
              {{ method_field('put') }}
              <div class="form-group row">
                <label for="name" class="col-md-12 col-form-label">Nombres</label>
                <div class="col-md-12">
                    <input value="{{$asesor->name}}" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
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
                  <input value="{{$asesor->lastname}}" id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
                  @error('lastname')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="numIdentification" class="col-md-12 col-form-label">Numero de identificación</label>
              <div class="col-md-12">
                  <input value="{{$asesor->numIdentification}}" id="numIdentification" type="text" class="form-control @error('numIdentification') is-invalid @enderror" name="numIdentification" value="{{ old('numIdentification') }}" required autocomplete="numIdentification" autofocus>
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
                    <input value="{{$asesor->email}}" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                    <input value="{{$asesor->phone}}" id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
              <label for="password" class="col-md-12 col-form-label">Actualizar Contraseña</label>
              <div class="col-md-12">
                  <input id="password" type="text" class="form-control" name="password" value="{{ old('password') }}" autocomplete="password" autofocus>
              </div>
            </div>
              <button type="submit" class="btn btn-primary">Editar Asesor</button>
              <a href="/asesores" class="btn btn-warning">Cancelar</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
