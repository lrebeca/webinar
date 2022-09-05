@extends('adminlte::page')

@section('title', 'Editar Provincia')

@section('content_header')
    <h1>Editar la provincia {{$province->provincia}} </h1>
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
            {!! Form::model($province, ['route'=>['admin.provinces.update', $province], 'method'=> 'put']) !!}
            
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
                    {!! Form::label('info', 'Departamento - Pais') !!}
                    {!! Form::text('info', null, ['class' => 'form-control', 'placeholder'=>'Ingrese el detalle ']) !!}
                </div>

                @error('info')
                    <span class="text-danger">{{$message}}</span>
                @enderror
        
    
            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
    
            {!! Form::close() !!}
        </div>
    </div>

    <div>
        <a href="{{route('admin.provinces.index')}}" class="btn btn-primary">Volver</a>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop