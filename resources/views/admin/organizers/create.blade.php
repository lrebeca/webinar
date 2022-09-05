@extends('adminlte::page')

@section('title', 'Crear Provincia')

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

         {{-- Detalle --}}
         <div class="form-group">
            {!! Form::label('detalle', 'Detalle') !!}
            {!! Form::text('detalle', null, ['class' => 'form-control', 'placeholder'=>'Ingrese el detalle ']) !!}
        </div>

        @error('detalle')
            <span class="text-danger">{{$message}}</span>
        @enderror
        
        {{-- Provincia --}}
        <div class="form-group">
            {!! Form::label('province_id ', 'Provincia') !!}
            {!! Form::select('province_id', $provinces, null, ['class' => 'form-control', 'placeholder' => '--- Seleccione una provincia ---']) !!}

        </div>

        @error('province_id')
            <span class="text-danger">{{$message}}</span>
        @enderror
        
        <br><br>
        {!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>
</div>

<div>
    <a href="{{route('admin.organizers.index')}}" class="btn btn-primary">Volver</a>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop