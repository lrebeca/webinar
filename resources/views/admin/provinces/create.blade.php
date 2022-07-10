@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Nueva Provincia </h1>
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
        {!! Form::open(['route'=>'admin.provinces.store']) !!}
        
        {{-- Provincia --}}
        <div class="form-group">
            {!! Form::label('provincia', 'Provincia') !!}
            {!! Form::text('provincia', null, ['class' => 'form-control', 'placeholder'=>'Ingrese la provincia']) !!}
        </div>

        @error('provincia')
            <span class="text-danger">{{$message}}</span>
        @enderror

         {{-- Departamento --}}
         <div class="form-group">
            {!! Form::label('departamento', 'Departamento') !!}
            {!! Form::text('departamento', null, ['class' => 'form-control', 'placeholder'=>'Ingrese el departamento ']) !!}
        </div>

        @error('departamento')
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