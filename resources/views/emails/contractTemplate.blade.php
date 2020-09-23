<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>:.. AMI ..:</title>
  <style>
    @import url("https://fonts.googleapis.com/css?family=Roboto:300,400,700,900&display=swap");

    body {
      margin-left: 0px;
      margin-top: 0px;
      margin-right: 0px;
      margin-bottom: 0px;
      background-color: #f2f2f2;
      font-family: "Roboto", sans-serif;
    }

    img {
      display: block;
      width: 100%;
    }

    .linkpag {
      text-decoration: none;
      color: #39f;
    }
  </style>
</head>

<body>
  <div class="contenedor" style="width: 650px; background: #fff; margin: auto;">
    <h1 style="text-align: center; text-transform: uppercase; color: #205ea3">{{ $contract->title }}</h1>
    <h2 style="text-align: center;">Número de contrato #{{ $client->id }}</h2>
    <h2 style="text-align: center;">{{ $client->name }} Gracias por elegirnos.</h2>

    <img style='display: block; width: 100%; padding-bottom: 40px;' src="{{ asset('img/01.png') }}">

    <img src="{{asset('images/'.$templateEmail->image)}}" style="width: 100%" alt="">

    <h3 style="text-align: center;">Proceso de Matrícula</h3>
    <a style="
        background: #ec1a24;
        color: #fff;
        display: block;
        padding: 5px 25px;
        text-align: center;
        border-radius: 25px;
        font-size: 24px;
        text-decoration: none;
        width: 70%;
        margin: auto;" href="https://crm.lectorami.co/contrato?asesor={{$idAsesor}}&contrato={{$contract->id}}&idenClient={{encrypt($client->id)}}&name={{$client->name}}&addrees={{encrypt($client->addrees)}}&city={{encrypt($client->city)}}&numIdenficication={{encrypt($client->numIdenficication)}}&phone={{encrypt($client->phone)}}&email={{encrypt($client->email)}}&scholl={{encrypt($client->scholl)}}" target="_blank">
      Diligenciar Contrato
    </a>
    <h3 style="text-align: center;">
      <h3 style="text-align: center;">
        Desde el siguiente link puedes hacer tu pago
      </h3>
      <a style="background: #ec1a24; color: #fff; display: block; padding: 5px 25px; text-align: center; border-radius: 25px;font-size: 24px;text-decoration: none;width: 70%;margin: auto;" href="{{$student['linkPago']}}" target="_blank">Pagar Ahora</a>
      <h6 style="text-align: center;">
        <b>NOTA:</b>Por favor, no responder a este correo automático.
      </h6>
  </div>
</body>

</html>
