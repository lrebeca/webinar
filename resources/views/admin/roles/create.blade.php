@extends('adminlte::page')

@section('title', 'Crear')

@section('content_header')
    <h1>Crear nuevo rol</h1>
@stop

@section('content')
    <p>Cree un nuevo rol</p>

    <div class="card">
        <div class="card-body">

            {!! Form::open(['route'=>'admin.roles.store']) !!}

                @include('admin.roles.partials.form')

            <br>
            {!! Form::submit('Crear actividad', ['class' => 'btn btn-primary']) !!}
            <br>

            {!! Form::close() !!}
        </div>        
    </div>
@stop

@section('css')
    
@stop

@section('js')
    
@stop