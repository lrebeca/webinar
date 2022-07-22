@extends('layouts.header2')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body><br><br><br><br>
    {{-- Bienvenida a la pagina de registro --}}
    <div class="alert alert-dark text-center">
        <h1>BIENVENIDO AL EVENTO </h1>
        <h1>{{$event->evento}}</h1>
    </div>

    {{-- Evento si es virtual links si es presencial información --}}
    <div class="container">
        <h3>Link para conectarse al evento</h3>
        <br>
        <h3>Lugar donde se realizará el evento</h3>
    </div>

    {{-- Material necesario para el evento --}}
    <div class="container">
        <h3>Aquí se tendrá todo el material necesario del evento como ser documentos</h3>
    </div>

    {{-- Certificado del estudiante --}}
    <div class="container">
        <h3>Puede descargar o imprimir su certificado</h3>
    </div>

</body>
</html>

@extends('layouts.footer')