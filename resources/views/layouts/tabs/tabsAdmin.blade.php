<div class="tab-pane active" id="tabs-1" role="tabpanel">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 formcontent">
        <h1>Clientes Matriculados</h1>
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
                <th>Fecha de contrato</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($clientesPaySuccess as $client)
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
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-md-12 formcontent">
        <h1>Clientes Pendientes Pago (Frios)</h1>
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
                <th>Editar</th>
                <th>Pagado</th>
                <th>Fecha de contrato</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($clientesPayPending as $client)
              <tr>
                <td>{{$client->name}}</td>
                <td>{{$client->numIdenficication}}</td>
                <td>{{$client->city}}</td>
                <td>{{$client->addrees}}</td>
                <td>{{$client->phone}}</td>
                <td>{{$client->email}}</td>
                <td>{{$client->titleContract}}</td>
                <td>{{$client->asesor->name}}</td>
                <td>
                  <a class="btn btn-warning btn-sm" href="{{ route('clientsEdit',$client->id) }}">Editar</a>
                </td>
                <td>
                  <form action="{{ route('paySuccess',$client->id) }}" method="POST">
                    {{csrf_field()}}
                    {{ method_field('put') }}
                    <input type="hidden" name="pay" value="SI">
                    <button type="submit" class="btn btn-success">Matriculado</button>
                  </form>
                <td>{{ Carbon\Carbon::parse($client->created_at)->format('d-m-Y') }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="tab-pane " id="tabs-2" role="tabpanel">
  <div class="container">
    <div class="row">
      <div class="col-12 formcontent">
        <h1>Enviar contrato</h1>
        <form class="ui form" id="formularioInfoPago" action="{{route('sendinfopay')}}" method="POST">
          {{ method_field('post') }}
          {{csrf_field()}}
          <div class="alert alert-info" role="alert">
            <label>Información del titular del Contrato</label>
            <div class="form-group col-md-12">
              <select class="form-control datoCliente select2" onchange="dataClient()" style="width: 100%" name="nombreEstudiante">
                <option value=""></option>
                @foreach ($allClients as $client)
                <option value="{{$client->id}}">{{$client->name}} ({{$client->email}})</option>
                @endforeach
              </select>
              <input type="hidden" name="email" id="email" />
              <input type="hidden" name="scholl" id="scholl" />
              <input type="hidden" name="nombre" id="nombre" />
              <input type="hidden" name="idtemplate" id="idtemplate" />
              <input type="hidden" name="linkPago" id="link" />
            </div>
          </div>
          <div class="form-group">
            <label>Tipo de Contrato</label>
            <select class="form-control select2" onchange="dataTemplateEmailSendContract()" style="width: 100%" name="tipoContrato" id="tipoContrato">
              <option value=""></option>
              @foreach ($contracts as $contract)
              <option value="{{$contract->id}}">{{$contract->title}}</option>
              @endforeach
            </select>
          </div>
          {{-- <div class="form-group">
            <label>Link de pago</label>
            <input type="text" class="form-control" name="linkPago" id="linkPago" placeholder="Ingresa el link de pago" />
          </div> --}}
          <div class="form-group">
            <input type="hidden" name="emailAsesor" id="emailAsesor" value="{{Auth()->user()->email}}" />
          </div>
          <button type="submit" id="infopago" class="btn btn-success btn-block"> Enviar email </button>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="tab-pane " id="tabs-3" role="tabpanel">
  <div class="container">
    <div class="row">
      <div class="col-12 formcontent">
        <h1>Enviar correos promocionales</h1>
        <form class="ui form" id="formularioInfoPago" action="{{route('sendinfopay')}}" method="POST">
          {{ method_field('post') }}
          {{csrf_field()}}
          <div class="alert alert-info" role="alert">
            <label>Nombre del Cliente</label>
            <div class="form-group col-md-12">
              <select class="form-control datoClienteEmail select2" onchange="dataClientEmial()" style="width: 100%" name="nombreEstudiante">
                <option value=""></option>
                @foreach ($allClientsPromocion as $client)
                <option value="{{$client->id}}">{{$client->name}}</option>
                @endforeach
              </select>
              <input type="hidden" name="email" id="emailEmail" />
              <input type="hidden" name="name" id="nameEmail" />
              <input type="hidden" name="idtemplate" id="idtemplateEmial" />
            </div>
          </div>
          <div class="form-group">
            <label>Tipo de Email Promocional</label>
            <select class="form-control select2" onchange="dataTemplateEmailSendEmialPromotion()" style="width: 100%" name="tipoContrato" id="promocion">
              <option value=""></option>
              @foreach ($emailsPromotions as $contract)
              <option value="{{$contract->id}}">{{$contract->title}}</option>
              @endforeach
            </select>
          </div>

          <button type="submit" id="infopago" class="btn btn-success btn-block"> Enviar email </button>
        </form>
      </div>
    </div>
  </div>
</div>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js">
<script>
  $(document).ready(function() {
    $('.table').DataTable();
  });
</script>
