@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar la unidad {{$organizer->unidad}} </h1>
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
            {!! Form::model($organizer, ['route'=>['admin.organizers.update', $organizer], 'method'=> 'put']) !!}
            
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
    
            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
    
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