@extends('adminlte::page')

@section('title', 'Editar')

@section('content_header')
    <h1>Editar el rol</h1>
@stop

@section('content')
    <p>Cree un nuevo rol</p>

    @if (session('info'))
    <div class="alert alert-success">
        <strong>
            {{session('info')}}
        </strong>
    </div>
    @endif

    <div class="card">
        <div class="card-body">

            {!! Form::model($role, ['route'=> ['admin.roles.update', $role], 'method' => 'put']) !!}

                @include('admin.roles.partials.form')

            <br>
            {!! Form::submit('actualizar', ['class' => 'btn btn-primary']) !!}
            <br>

            {!! Form::close() !!}
        </div>        
    </div>
@stop

@section('css')
    
@stop

@section('js')
    
@stop