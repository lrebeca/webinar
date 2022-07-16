<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Nueva Unidad </h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>
                {{session('info')}}
            </strong>
        </div>
    @endif

<div class="card">
    <div class="card-body">
        {!! Form::open(['route'=>'admin.organizers.store']) !!}
        
        {{-- Unidad --}}
        <div class="form-group">
            {!! Form::label('unidad', 'Unidad') !!}
            {!! Form::text('unidad', null, ['class' => 'form-control', 'placeholder'=>'Ingrese la unidad']) !!}
        </div>

        @error('unidad')
            <span class="text-danger">{{$message}}</span>
        @enderror

        {{-- Provincia --}}
        <div class="form-group">
            {!! Form::label('provincia', 'Provincia') !!}
            {!! Form::text('provincia', null, ['class' => 'form-control', 'placeholder'=>'Ingrese la provincia']) !!}
        </div>

        @error('provincia')
            <span class="text-danger">{{$message}}</span>
        @enderror


         {{-- Detalle --}}
         <div class="form-group">
            {!! Form::label('detalle', 'Detalle') !!}
            {!! Form::text('detalle', null, ['class' => 'form-control', 'placeholder'=>'Ingrese el detalle ']) !!}
        </div>

        @error('detalle')
            <span class="text-danger">{{$message}}</span>
        @enderror
        
        <br>
        {!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <section class="container">
        <div class="row my-5">
            {{-- Formulario de Inscripcion --}}
             <form action="{{route('admin.students.store')}}" class="px-4 py-3" method="POTS" enctype="multipart/form-data">
                 @csrf ,
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
            </form>
        </div>
    </section>
</body>
</html>