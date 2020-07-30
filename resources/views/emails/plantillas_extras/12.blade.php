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
  @foreach ($templateSelected as $item)
  <div class="contenedor" style="width: 650px; background: #fff; margin: auto;">
    <h3 style="text-align: center;">{{ $client['name'] }} Gracias por elegirnos. </h3>
    <img style='display: block; width: 100%; padding-bottom: 40px;' src='{{ asset('img/01.png') }}'>
    <p>{{$item->firstText}}</p>
    <img src="{{asset('images/'.$item->image)}}" style="width: 50%" alt="">
    <a  style="background: #ec1a24; color: #fff; display: block; padding: 5px 25px; text-align: center; border-radius: 25px;font-size: 24px;text-decoration: none;width: 70%;margin: auto;"
       href="https://marketing.lectorami.co/" target="_blank">INFORMATE MAS AQUI</a>
    <h6 style="text-align: center;">
      <b>NOTA:</b>Por favor, no responder a este correo automático.
    </h6>
  </div>
@endforeach
</body>
</html>
