@extends('adminlte::page')

@section('title', 'Editar Certificado')

@section('content_header')
    <h1>Certificados</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">

        {!! Form::model($certificate, ['route'=>['admin.certificates.update', $certificate], 'files' => true, 'method' => 'put']) !!}


            @include('admin.certificates.partials.form')

        <br>
        {!! Form::submit('Actualizar Certificado', ['class' => 'btn btn-primary']) !!}
        <br>

        {!! Form::close() !!}
    </div>        
</div>

<div class="card-header">
    <a href="{{route('admin.certificates.index')}}" class="btn btn-primary">Volver</a>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

    {{-- para el select --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@stop

@section('js')
    <script> console.log('Hi!');</script>
    {{-- para el select --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
@stop