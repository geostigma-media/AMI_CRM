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
            <li class="breadcrumb-item"><a href="{{ route('clients') }}">Gestion de Clientes</a></li>
            <li class="breadcrumb-item activate"><a href="#">Editar {{Auth()->user()->name}}</a></li>
          </ol>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <form action="{{route('updateCliente',$client->id)}}" method="POST" id="formClienteEdit">
              {{csrf_field()}}
              {{ method_field('put') }}
              <div class="form-group row">
                <label for="name" class="col-md-12 col-form-label">Asesor Encargado</label>
                <div class="col-md-12">
                  <select class="form-control select2" id="select2" name="asesorId">
                    <option value="{{$client->asesorId}}">{{$client->asesor->name}}</option>
                    @foreach ($asesores as $asesor)
                    <option value="{{$asesor->id}}">{{$asesor->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <h3>Información personal</h3>
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name" class="col-form-label">Nombres</label>
                  <input value="{{$client->name}}" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                  @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group col-md-6">
                  <label for="email" class="col-form-label">Correo Electronico</label>
                  <input value="{{$client->email}}" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group col-md-6">
                  <label for="numIdenficication" class="col-md-12 col-form-label">Numero de identificación</label>

                  <input value="{{$client->numIdenficication}}" id="numIdenficication" type="text" class="form-control @error('numIdenficication') is-invalid @enderror" name="numIdenficication" value="{{ old('numIdenficication') }}" autocomplete="numIdenficication" autofocus>
                  @error('numIdenficication')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group col-md-6">
                  <label for="phone" class="col-form-label">Teléfono</label>
                  <input value="{{$client->phone}}" id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                  @error('phone')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group col-md-6">
                  <label for="addrees" class="col-form-label">Dirección</label>

                  <input value="{{$client->addrees}}" id="addrees" type="text" class="form-control @error('addrees') is-invalid @enderror" name="addrees" value="{{ old('addrees') }}" autocomplete="addrees" autofocus>
                  @error('addrees')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror

                </div>

                <div class="form-group col-md-6">
                  <label for="city" class="col-form-label">Ciudad</label>
                  <input value="{{$client->city}}" id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}">
                </div>
              </div>
              <hr>
              <h3>Empresa</h3>
              <div class="row">
                <div class="form-group col-md-6">
                  <label class="col-form-label">Nombre de la empresa</label>
                  <input value="{{$client->empresa_nombre}}" type="text" class="form-control" name="empresa_nombre" value="{{ old('empresa_nombre') }}">
                </div>

                <div class="form-group col-md-6">
                  <label class="col-form-label">Dirección de la empresa</label>
                  <input value="{{$client->empresa_direccion}}" type="text" class="form-control" name="empresa_direccion" value="{{ old('empresa_direccion') }}">
                </div>
              </div>

              <hr>
              <h3>Referencia personal</h3>
              <div class="row">
                <div class="form-group col-md-6">
                  <label class="col-form-label">Nombre</label>
                  <input value="{{$client->referencia_nombre}}" type="text" class="form-control" name="referencia_nombre" value="{{ old('referencia_nombre') }}">
                </div>

                <div class="form-group col-md-6">
                  <label class="col-form-label">Dirección</label>
                  <input value="{{$client->referencia_direccion}}" type="text" class="form-control" name="referencia_direccion" value="{{ old('referencia_direccion') }}">
                </div>

                <div class="form-group col-md-6">
                  <label class="col-form-label">Teléfono</label>
                  <input value="{{$client->referencia_telefono}}" type="text" class="form-control" name="referencia_telefono" value="{{ old('referencia_telefono') }}">
                </div>

                <div class="form-group col-md-6">
                  <label class="col-form-label">Ocupación</label>
                  <input value="{{$client->referencia_ocupacion}}" type="text" class="form-control" name="referencia_ocupacion" value="{{ old('referencia_ocupacion') }}">
                </div>

                <div class="form-group col-md-6">
                  <label>Tipo de relación</label>
                  <select class="form-control" name="referencia_tipo">
                    <option value="{{$client->referencia_tipo}}">{{$client->referencia_tipo}}</option>
                    <option value="Familiar">Familiar</option>
                    <option value="Comercial">Comercial</option>
                    <option value="Personal">Personal</option>
                  </select>
                </div>


              </div>

              <h3>Beneficiario</h3>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Nombre</label>
                  <input type="text" value="{{$client->beneficiario_nombre }}" class="form-control" name="beneficiario_nombre" />
                </div>
                <div class="form-group col-md-6">
                  <label>Número de identificación</label>
                  <input type="text" value="{{$client->beneficiario_identificacion }}" class="form-control" name="beneficiario_identificacion" />
                </div>
                <div class="form-group col-md-6">
                  <label>Ocupación</label>
                  <input type="text" value="{{$client->beneficiario_ocupacion }}" class="form-control" name="beneficiario_ocupacion" />
                </div>
                <div class="form-group col-md-6">
                  <label>Fecha de nacimiento</label>
                  <input type="date" value="{{$client->beneficiario_fecha_nacimiento }}" class="form-control" name="beneficiario_fecha_nacimiento" />
                </div>
              </div>


              <h3>Contrato</h3>
              <h4>Número de contrato # <strong>{{$client->id}}</strong></h4>
              <div class="form-group row">

                <label for="phone" class="col-md-12 col-form-label">Contrato</label>
                <div class="col-md-12">
                  <textarea class="form-control" id="" rows="10" style="resize: none" disabled>{{$client->contract}}</textarea>
                  <a href="{{ route('dowloadContract',$client->id ) }}">Descargar Contrato</a>
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Editar Cliente</button>
              <a href="{{ route('home') }}" class="btn btn-warning">Cancelar</a>

            </form>
            <form class="user" action="{{route('deleteClient', $client->id)}}" method="post">
              {{ method_field('delete') }}
              {{csrf_field()}}
              <button class="btn btn-danger pull-right" onclick="return confirm('¿Esta seguro de eliminar este registro?')" type="submit">ELIMINAR</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
