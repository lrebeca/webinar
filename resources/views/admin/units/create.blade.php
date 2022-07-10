@extends('adminlte::page')

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
        {!! Form::open(['route'=>'admin.units.store']) !!}
        
        {{-- Unidad --}}
        <div class="form-group">
            {!! Form::label('unidad', 'Unidad') !!}
            {!! Form::text('unidad', null, ['class' => 'form-control', 'placeholder'=>'Ingrese la unidad']) !!}
        </div>

        @error('unidad')
            <span class="text-danger">{{$message}}</span>
        @enderror

         {{-- Descripcion --}}
         <div class="form-group">
            {!! Form::label('descripcion', 'Descripcion') !!}
            {!! Form::text('descripcion', null, ['class' => 'form-control', 'placeholder'=>'Ingrese la descripcion ']) !!}
        </div>

        @error('descripcion')
            <span class="text-danger">{{$message}}</span>
        @enderror

        {{-- Provincia o Ciudad --}}

        <div class="form-group">
            {!! Form::label('id_provincia', 'Provincia o Ciudad') !!}
            {!! Form::select('id_provincia', $provinces, null, ['class' => 'form-control', 'placeholder'=>'Seleccione la provincia a la que pertenece']) !!}
        </div>

        @error('id_provincia')
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