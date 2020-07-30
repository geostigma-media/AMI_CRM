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
              <div class="form-group row">
                <label for="name" class="col-md-12 col-form-label">Nombres</label>
                <div class="col-md-12">
                    <input value="{{$client->name}}" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </div>
              <div class="form-group row">
                <label for="addrees" class="col-md-12 col-form-label">Dirección</label>
                <div class="col-md-12">
                    <input value="{{$client->addrees}}" id="addrees" type="text" class="form-control @error('addrees') is-invalid @enderror" name="addrees" value="{{ old('addrees') }}"  autocomplete="addrees" autofocus>
                    @error('addrees')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </div>
              <div class="form-group row">
                <label for="numIdenficication" class="col-md-12 col-form-label">Numero de identificación</label>
                <div class="col-md-12">
                    <input value="{{$client->numIdenficication}}" id="numIdenficication" type="text" class="form-control @error('numIdenficication') is-invalid @enderror" name="numIdenficication" value="{{ old('numIdenficication') }}"  autocomplete="numIdenficication" autofocus>
                    @error('numIdenficication')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </div>
              <div class="form-group row">
                <label for="city" class="col-md-12 col-form-label">Ciudad</label>
                <div class="col-md-12">
                    <input value="{{$client->city}}" id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}"  autocomplete="city" autofocus>

                </div>
              </div>
              <div class="form-group row">
                  <label for="email" class="col-md-12 col-form-label">Correo Electronico</label>

                  <div class="col-md-12">
                      <input value="{{$client->email}}" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                      <input value="{{$client->phone}}" id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                      @error('phone')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>
              <div class="form-group row">
                  <label for="phone" class="col-md-12 col-form-label">Contrato</label>
                  <div class="col-md-12">
                    <textarea class="form-control" id="" rows="10" style="resize: none" disabled>{{$client->contract}}</textarea>
                    <a href="{{ route('dowloadContract',$client->id ) }}">Descargar Contrato</a>
                  </div>
              </div>
              <button type="submit" class="btn btn-primary">Editar Cliente</button>
              <a href="/clientes" class="btn btn-warning">Cancelar</a>

            </form>
            <form class="user"  action="{{route('deleteClient', $client->id)}}" method="post">
              {{ method_field('delete') }}
              {{csrf_field()}}
              <button class="btn btn-danger pull-right" onclick="return confirm('¿Esta seguro de eliminar este registro?')"  type="submit">ELIMINAR</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
