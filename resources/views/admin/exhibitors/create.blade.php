@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Agregar a un nuevo expositor</h1>
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
        {!! Form::open(['route'=>'admin.exhibitors.store']) !!}
        
        {{-- Sufijo --}}
        <div class="form-group">
            {!! Form::label('suffix', 'Sufijo') !!}
            {!! Form::text('suffix', null, ['class' => 'form-control', 'placeholder'=>'Ejm. Lic, Sr, Ing, ']) !!}
        </div>

        @error('suffix')
            <span class="text-danger">{{$message}}</span>
        @enderror

        {{-- Nombre Y apellidos --}}

        <div class="form-group">
            {!! Form::label('nombre', 'Nombre') !!}
            {!! Form::text('nombre', null, ['class' => '', 'placeholder'=>'Nombre']) !!}

            {!! Form::label('apellido_paterno', 'Apellido Paterno') !!}
            {!! Form::text('apellido_paterno', null, ['class' => '', 'placeholder'=>'Primer apellido ']) !!}

            {!! Form::label('apellido_materno', 'Apellido Materno') !!}
            {!! Form::text('apellido_materno', null, ['class' => '', 'placeholder'=>'Segundo apellido']) !!}
        </div>

        @error('nombre')
            <span class="text-danger">{{$message}}</span>
        @enderror

        @error('apellido_paterno')
            <span class="text-danger">{{$message}}</span>
        @enderror
            
        @error('apellido_materno')
            <span class="text-danger">{{$message}}</span>
        @enderror
    
         {{-- Email --}}
         <div class="form-group">
            {!! Form::label('email', 'Email') !!}
            {!! Form::text('email', null, ['class' => 'form-control', 'placeholder'=>'Example@gmail.com']) !!}
        </div>

        @error('email')
            <span class="text-danger">{{$message}}</span>
        @enderror

        {{-- Direccion --}}
        <div class="form-group">
            {!! Form::label('direccion', 'Direccion') !!}
            {!! Form::text('direccion', null, ['class' => 'form-control', 'placeholder'=>'Ingrese su direccion ']) !!}
        </div>

        @error('direccion')
            <span class="text-danger">{{$message}}</span>
        @enderror

        {{-- Numero de Celular --}}
        <div class="form-group">
            {!! Form::label('num_celular', 'Numero de Celular') !!}
            {!! Form::text('num_celular', null, ['class' => 'form-control', 'placeholder'=>'Ingrese el numero de celular ']) !!}
        </div>

        @error('num_celular')
            <span class="text-danger">{{$message}}</span>
        @enderror

        {{-- Descripcion --}}
        <div class="form-group">
            {!! Form::label('descripcion', 'Descripcion') !!}
            {!! Form::text('descripcion', null, ['class' => 'form-control', 'placeholder'=>'Ingrese su descripcion si es necesario ']) !!}
        </div>

        @error('descripcion')
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