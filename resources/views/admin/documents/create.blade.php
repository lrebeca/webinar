@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Documentos</h1>
@stop

@section('content')
    <p>Cree los documentos del evento </p>

    <div class="card">
        <div class="card-body">

            {!! Form::open(['route'=>'admin.documents.store','enctype' => 'multipart/form-data' ,'files' => true]) !!}

             <!-- Documentos -->
                <div class="form-group">
                    {!! Form::label('id_evento', 'Evento') !!}                    
                    <select name="id_evento" id="" class="form-control">
                        <option value="">-- Seleccione un Evento --</option>
                        @foreach ($events as $event)
                            <option value="{{$event->id}}">{{$event->evento}}</option>
                        @endforeach
                    </select>
                </div>

                @error('id_evento')
                    <span class="text-danger">{{$message}}</span>
                @enderror

            <!-- Titulo  -->

                <div class="form-group">
                    {!! Form::label('titulo', 'Titulo') !!} 
                    {!! Form::text('titulo', null, ['class' => 'form-control', 'placeholder'=>'Ingrese el titulo del documento']) !!}
                </div>
                
                @error('titulo')
                    <span class="text-danger">{{$message}}</span>
                @enderror

            <!-- Documento  -->

            <div class="row">

                <div class="col">
                    <div class="form-group">
                        {!! Form::label('documento', 'Documento') !!} <br>
                        {!! Form::file('documento', ['accept'=>'.doc,.pdf,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'class' => 'form-control-file']) !!}
                    </div>
                    @error('documento')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <br>
            {!! Form::submit('Agregar', ['class' => 'btn btn-primary']) !!}
            <br>

            {!! Form::close() !!}
        </div>        
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>

@stop