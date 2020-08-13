<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1> Un estudiante nuevo de a registrado</h1>
    <ul>
        <li>
            <p>{{ $contract['name'] }}</p>
        </li>
        <li>
            <p>{{ $contract['addrees'] }}</p>
        </li>
        <li>
            <p>{{ $contract['city'] }}</p>
        </li>
        <li>
            <p>{{ $contract['numIdenficication'] }}</p>
        </li>
        <li>
            <p>{{ $contract['phone'] }}</p>
        </li>
        <li>
            <p>Terminos y Condiciones: {{ $contract['terminos'] }}</p>
        </li>
        <li>
            <p>Terminos de Compra: {{ $contract['terminosCompra'] }}</p>
        </li>
        <li>
            <p>Terminos de Curso: {{ $contract['terminosCusro'] }}</p>
        </li>
    </ul>
    <p>{{ $contract['contract'] }}</p>
</body>

</html>
