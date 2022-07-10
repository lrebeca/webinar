@extends('layouts.header2')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"> -->
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- <style>
        .banner-image{
            /* background-image: url('asset/img/portada1.jpg'); */
            /* background-color: rgb(18, 17, 17); */
            background-size: cover;
            height: 13vh;
        }
    </style> --}}

</head>
<body>
    <br>

<div class="container my-5 d-grid gap-5">
    <div class="mt-5 text-center">
        <h1>Facultad de Contaduría Pública y Ciencias Financieras</h1>
        <br>
    </div>

        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
            <center> <img src="{{asset('asset/img/DSC_0006.jpg')}}" class="img-thumbnail rounded mx-auto d-block" width="400" height="400"></center>
         </div><br>

        {{-- Nombre de la Actividad --}}
         <h1>{{$event->nombre_act}}</h1>
        
        {{-- Detalles de la actividad --}}
        <p>{{$event->detalle}}</p>

            @if ($event->costo > 0)
            <h5>Costo de la actividad</h5>
            {{$event->costo}}
            @else
                <h5>Evento gratuito</h5>
            @endif

        <h5>Fecha de Inicio</h5>
        {{$event->fecha_inicio}}

        <h5>Fecha de finalizacion</h5>
        {{$event->fecha_fin}}

    </div>


    {{-- Formulario para registrarse en el evento --}}

    <div class="text-center">
        <h2>Registrarse en el {{$event->nombre_act}}</h2>
    </div>
    <div class="container my-5 d-grid gap-5 content-center ">
    <p>
        <a class="btn btn-primary" data-bs-toggle="collapse" href="#form-registro" role="button" aria-expanded="false" aria-controls="form-registro">
          Registrarme
        </a>

        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#form-ingresar" aria-expanded="false" aria-controls="form-ingresar">
        Ingresar
        </button>
      </p>
      {{-- Form-registro --}}
      <div class="collapse" id="form-registro">
        <div class="card card-body">
    {{-- Formulario de registro de estudiantes --}}
            {{-- <form action="{{route('admin.students.', $event)}}" class="px-4 py-3" method="POTS">
                 @csrf
                <fieldset>
                    <legend>Datos</legend>
                    <ol>
                        <div class="mb-3 form-gro">
                            <label for="name" class="form-label">Nombre : </label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Escribe tu nombre Completo ">
                        </div>
                        <div class="mb-3">
                            <label for="CI" class="form-label">Celula de Identidad : </label>
                            <input type="num" name="CI" id="CI" class="form-control" placeholder="Ingrese el numero de carnet de identidad">
                        </div>                        
                        <div class="mb-3">
                            <label for="CU" class="form-label">Nº Carnet Universitario : </label>
                            <input type="num" name="CU" id="CU" class="form-control" placeholder="Ingrese el numero de carnet universitario">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email : </label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Ingrese su correo electronico">
                        </div>
                        <div class="mb-3">
                            <label for="celular" class="form-label">Numero de Celular : </label>
                            <input type="tel" name="celular" id="celular" class="form-control" placeholder="Ingrese el numero de celular">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña : </label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Ingrese el numero de carnet de identidad">
                        </div>
                        @if ($event->costo > 0)
                        <div class="mb-3">
                            <label for="CI" class="form-label">Nº de Deposito o transferencia bancaria : </label>
                            <input type="num" name="CI" id="CI" class="form-control" placeholder="Ingrese el numero de carnet de identidad">
                        </div>
                        <div class="mb-3">
                            <label for ="deposito" class="form-label">Deposito : </label>
                            <input type="file" name="deposito" id="deposito" class="form-control " accept="image/*">
                        </div>
                        @endif
                    </ol>
                </fieldset>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form> --}}
        </div>
      </div>
    {{-- Form-registro fin --}}

    {{-- form-ingresar --}}
    <div class="collapse" id="form-ingresar">
        <div class="card card-body">
        {{-- Formulario de registro de estudiantes --}}
            {{-- <form action="{{route('index', $event)}}" class="px-4 py-3" novalidate>
                <fieldset>
                    <legend>Datos</legend>
                    <ol>
                        <div class="mb-3">
                            <label for="CI" class="form-label">Celula de Identidad : </label>
                            <input type="num" name="CI" id="CI" class="form-control" placeholder="Ingrese el numero de carnet de identidad" required>
                            <div class="valid-tooltip">¡Campo Valido!</div>
                            <div class="invalid-tooltip">¡Campo Invalido!</div>
                        </div>
                        <div class="mb-3">
                            <label for="CU" class="form-label">Nº Carnet Universitario : </label>
                            <input type="num" name="CU" id="CU" class="form-control" placeholder="Ingrese el numero de carnet universitario" required>
                        </div>
                    </ol>
                </fieldset>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form> --}}
        </div>
      </div>
      {{-- Form-registro fin --}}
      
    </div>
    
</div>


<br>
</body>
</html>
@extends('layouts.footer')