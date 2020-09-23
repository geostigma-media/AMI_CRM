@extends('layouts.app')
@section('content')
<style>
  @media (max-width: 992px) {
    .btncelular {
      display: block !important;
    }

    .btngrande {
      display: none;
    }

    .breadcrumb {
      margin-top: -22px !important;
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
        <div class="d-flex justify-content-end align-items-center" aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Inicio</a></li>
            <li class="breadcrumb-item active">Clientes</li>
            <li class="breadcrumb-item">
              <a type="button" class="btn btn-info btngrande" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus-circle"></i> Agregar cliente</a>
              <a type="button" class="btn btn-info btncelular  btn-circle" data-toggle="modal" style="display:none" data-target="#exampleModal">
                <i class="fa fa-plus-circle"></i></a>
            </li>
            @if (Auth()->user()->role == 1)
            <li class="btngrande">
              <a href="{{ route('loadExcel') }}" class="btn btn-success btngrande ml-2">
                <i class="fa fa-file-excel"></i> Descargar Datos</a>
            </li>
            <li class="btncelular" style="display:none">
              <a href="{{ route('loadExcel') }}" class="btn btn-success btn-circle ml-2">
                <i class="fa fa-file-excel"></i></a>
            </li>
            @endIf
          </ol>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="card">
          <div class="card-body">
            @if($errors->any())
            <div class="alert alert-danger" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
              @foreach($errors->all() as $error)
              {{ $error }}<br />
              @endforeach
            </div>
            @endif
            @if(Session::has('message'))
            <div class="alert alert-success">
              {!! Session::get('message') !!}
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            </div>
            @endif
            @if (Auth()->user()->role == 1)
            <h2>Estudiantes Matriculados</h2>
            <div class="table-responsive">
              <table class="table" id="tabla">
                <thead>
                  <tr>
                    <th>Nombre completo</th>
                    <th>Número de documento</th>

                    <th>Ciudad</th>

                    <th>Teléfono</th>
                    <th>Numero Contrato</th>
                    <th>Tipo de Contrato</th>
                    <th>Asesor</th>
                    <th>Fecha de registro</th>
                    <th>Correo electónico</th>
                    <th>Seguimiento</th>

                    @if (Auth()->user()->role == 1)
                    <th>Editar</th>
                    @endIf
                  </tr>
                </thead>
                <tbody>
                  @foreach ($clientsListAdmin as $client)
                  <tr>
                    <td>{{$client->name}}</td>
                    <td>{{$client->numIdenficication}}</td>
                    <td>{{$client->city}}</td>
                    <td>{{$client->phone}}</td>
                    <td>{{$client->id}}</td>
                    <td>{{$client->titleContract}}</td>
                    <td>{{$client->asesor->name}}</td>
                    <td>{{ Carbon\Carbon::parse($client->created_at)->format('d-m-Y') }}</td>
                    <td>{{$client->email}}</td>
                    <td>
                      <a href="{{ route('tracing',$client->id) }}"><i class="fas fa-eye"></i></a>
                    </td>
                    @if (Auth()->user()->role == 1)
                    <td>
                      <a class="btn btn-warning btn-sm" href="{{ route('clientsEdit',$client->id) }}">Editar</a>
                    </td>
                    @endif
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            @else
            <h2>Seguimiento de mis Clientes Matriculados</h2>
            <div class="table-responsive">
              <table class="table" id="tabla">
                <thead>
                  <tr>
                    <th>Nombre completo</th>
                    <th>Numero de ID</th>
                    <th>Ciudad</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Número de contrato</th>
                    <th>Tipo de contrato</th>
                    <th>Asesor</th>
                    <th>Fecha de Registro</th>
                    <th>Seguimiento</th>
                    @if (Auth()->user()->role == 1)
                    <th>Editar</th>
                    @endIf
                  </tr>
                </thead>
                <tbody>
                  @foreach ($clientsListAsesorMatriculado as $client)
                  <tr>
                    <td>{{$client->name}}</td>
                    <td>{{$client->numIdenficication}}</td>
                    <td>{{$client->city}}</td>
                    <td>{{$client->phone}}</td>
                    <td>{{$client->email}}</td>
                    <td>{{$client->id}}</td>
                    <td>{{$client->titleContract}}</td>
                    <td>{{$client->asesor->name}}</td>
                    <td>{{ Carbon\Carbon::parse($client->created_at)->format('d-m-Y') }}</td>
                    <td>
                      <a href="{{ route('tracing',$client->id) }}"><i class="fas fa-eye"></i></a>
                    </td>
                    @if (Auth()->user()->role == 1)
                    <td>
                      <a class="btn btn-warning btn-sm" href="{{ route('clientsEdit',$client->id) }}">Editar</a>
                    </td>
                    @endif
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>

            <h2>Seguimiento de mis Clientes Pendientes por Matricular</h2>
            <div class="table-responsive">
              <table class="table" id="tabla">
                <thead>
                  <tr>
                    <th>Nombre completo</th>
                    <th>Numero de ID</th>
                    <th>Ciudad</th>
                    <th>Dirección</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Tipo de Contrato</th>
                    <th>Asesor</th>
                    <th>Fecha de Registro</th>
                    <th>Seguimiento</th>
                    @if (Auth()->user()->role == 1)
                    <th>Editar</th>
                    @endIf
                  </tr>
                </thead>
                <tbody>
                  @foreach ($clientsListAsesorSinMatricula as $client)
                  <tr>
                    <td>{{$client->name}}</td>
                    <td>{{$client->numIdenficication}}</td>
                    <td>{{$client->city}}</td>
                    <td>{{$client->addrees}}</td>
                    <td>{{$client->phone}}</td>
                    <td>{{$client->email}}</td>
                    <td>{{$client->titleContract}}</td>
                    <td>{{$client->asesor->name}}</td>
                    <td>{{ Carbon\Carbon::parse($client->created_at)->format('d-m-Y') }}</td>
                    <td>
                      <a href="{{ route('tracing',$client->id) }}"><i class="fas fa-eye"></i></a>
                    </td>
                    @if (Auth()->user()->role == 1)
                    <td>
                      <a class="btn btn-warning btn-sm" href="{{ route('clientsEdit',$client->id) }}">Editar</a>
                    </td>
                    @endif
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            @endIf
          </div>
        </div>

        <div class="card">
          <div class="card-body">
            @if(Session::has('message'))
            <div class="alert alert-success">
              {!! Session::get('message') !!}
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            </div>
            @endif
            @if (Auth()->user()->role == 1)
            <h2>Estudiantes Por Asesor</h2>
            <div class="table-responsive">
              <table class="table" id="tabla">
                <thead>
                  <tr>
                    <th>Nombre completo</th>
                    <th>Número de ID</th>
                    <th>Ciudad</th>
                    <th>Dirección</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Tipo de Contrato</th>
                    <th>Asesor</th>
                    <th>Fecha de Registro</th>
                    <th>Seguimiento</th>
                    @if (Auth()->user()->role == 1)
                    <th>Editar</th>
                    @endIf
                  </tr>
                </thead>
                <tbody>
                  @foreach ($clientsList as $client)
                  <tr>
                    <td>{{$client->name}}</td>
                    <td>{{$client->numIdenficication}}</td>
                    <td>{{$client->city}}</td>
                    <td>{{$client->addrees}}</td>
                    <td>{{$client->phone}}</td>
                    <td>{{$client->email}}</td>
                    <td>{{$client->titleContract}}</td>
                    <td>{{$client->asesor->name}}</td>
                    <td>{{ Carbon\Carbon::parse($client->created_at)->format('d-m-Y') }}</td>
                    <td>
                      <a href="{{ route('tracing',$client->id) }}"><i class="fas fa-eye"></i></a>
                    </td>
                    @if (Auth()->user()->role == 1)
                    <td>
                      <a class="btn btn-warning btn-sm" href="{{ route('clientsEdit',$client->id) }}">Editar</a>
                    </td>
                    @endif
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            @endIf

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
        <h5 class="modal-title" id="exampleModalLabel">Crear Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="ui form" action="{{route('createClient')}}" id="formCliente" method="POST">
          {{ method_field('post') }}
          {{csrf_field()}}
          <input type="hidden" name="asesorId" id="asesorId" value="{{Auth()->user()->id}}" />
          <div class="alert alert-info" role="alert">
            <div class="form-group">
              <label>Nombre Completo del Titular del Contrato</label>
              <input value="{{ old('name') }}" type="text" class="form-control" name="name" id="name" placeholder="Nombre Completo del Titular" />
            </div>
            <div class="form-group">
              <label>Teléfono</label>
              <input value="{{ old('phone') }}" type="text" class="form-control" name="phone" id="phone" placeholder="Telefono" />
            </div>
            <div class="form-group">
              <label>Correo Electrónico</label>
              <input value="{{ old('email') }}" type="email" class="form-control" name="email" id="email" placeholder="Correo Electronico" />
            </div>
          </div>
          <div class="form-group">
            <label>Colegio/Universidad</label>
            <input type="text" class="form-control" name="scholl" id="scholl" placeholder="Colegio o Universidad" />
          </div>
          <div class="form-group">
            <label>Dirección</label>
            <input value="{{ old('addrees') }}" type="text" class="form-control" name="addrees" id="addrees" placeholder="Dirección" />
          </div>
          <div class="form-group">
            <label>Ciudad</label>
            <input value="{{ old('city') }}" type="text" class="form-control" name="city" id="city" placeholder="Ciudad" />
          </div>
          <div class="form-group">
            <label>No de identificación</label>
            <input value="{{ old('numIdenficication') }}" type="text" class="form-control" name="numIdenficication" id="numIdenficication" placeholder="Número de identificación" />
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
