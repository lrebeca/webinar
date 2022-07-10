@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Actividad</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>

    @if (session('info'))
        <div class="alert alert-success">
            <strong>
                {{session('info')}}
            </strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">

            {!! Form::model($event, ['route'=>['admin.events.update', $event], 'method' => 'put']) !!}

            <!-- Nombre de la actividad -->
            <div class="form-group">
                {!! Form::label('nombre_act', 'Actividad') !!}
                {!! Form::text('nombre_act', null, ['class' => 'form-control', 'placeholder'=>'Ingrese el nombre de la actividad']) !!}
            </div>

            @error('nombre_act')
                <span class="text-danger">{{$message}}</span>
            @enderror

        <!-- detalles  -->

            <div class="form-group">
                {!! Form::label('detalle', 'Detalle') !!}
                {!! Form::textarea('detalle', null, ['class' => 'form-control', 'placeholder'=>'Ingrese los detalles de la actividad']) !!}
            </div>
            
            @error('detalle')
                <span class="text-danger">{{$message}}</span>
            @enderror
        
        <!-- Costo de la actividad -->

            <div class="form-group">
                {!! Form::label('costo', 'Costo') !!}
                {!! Form::number('costo', null, ['class' => 'form-control', 'placeholder'=>'Ingrese el costo de la actividad']) !!}
            </div>

            @error('costo')
                <span class="text-danger">{{$message}}</span>
            @enderror

            <!-- Fecha inicio de la Actividad -->

            <div class="form-group">
                {!! Form::label('fecha_inicio', 'Fecha Inicio') !!}
                {!! Form::date('fecha_inicio', null, ['class' => 'form-control', 'placeholder'=>'Ingrese la fecha de inicio de la actividad']) !!}
            </div>

            @error('fecha_inicio')
                <span class="text-danger">{{$message}}</span>
            @enderror

        <!-- Fecha finalizacion de la actividad -->

            <div class="form-group">
                {!! Form::label('fecha_fin', 'Fecha Finalizacion') !!}
                {!! Form::date('fecha_fin', null, ['class' => 'form-control', 'placeholder'=>'Ingrese la fecha de finalizacion de la actividad']) !!}
            </div>

            @error('fecha_fin')
                <span class="text-danger">{{$message}}</span>
            @enderror

            <!-- link de whatsapp -->

            <div class="form-group">
                {!! Form::label('link_whatsapp', 'WhatsApp') !!}
                {!! Form::text('link_whatsapp', null, ['class' => 'form-control', 'placeholder'=>'Ingrese el link para whatsapp']) !!}
            </div>

            @error('link_whatsapp')
                <span class="text-danger">{{$message}}</span>
            @enderror

            <!-- Link de telegram -->

            <div class="form-group">
                {!! Form::label('link_telegram', 'Telegram') !!}
                {!! Form::text('link_telegram', null, ['class' => 'form-control', 'placeholder'=>'Ingrese el link de telegram']) !!}
            </div>

            @error('link_telegram')
                <span class="text-danger">{{$message}}</span>
            @enderror

            
            <!-- estado del evento -->

            <div class="form-group">
                Estado: &nbsp;
                {!! Form::label('status', 'Borrador') !!}
                {!! Form::radio('status', '1' )!!}
                {!! Form::label('status', 'publicado') !!}
                {!! Form::radio('status', '2') !!}
            </div>

            @error('status')
                <span class="text-danger">{{$message}}</span>
            @enderror

            <!-- Nombre del expositor -->

            <div class="form-group">
                {!! Form::label('id_user', 'Nombre del Espositor') !!}
                {!! Form::select('id_user', $users, null, ['class' => 'form-control', 'placeholder'=>'Ingrese el nombre del expositor de la actividad']) !!}
            </div>

            @error('id_user')
                <span class="text-danger">{{$message}}</span>
            @enderror

            <!-- Area -->

            <div class="form-group">
                {!! Form::label('id_area', 'Organizador') !!}
                {!! Form::select('id_area', $areas, null, ['class' => 'form-control', 'placeholder'=>'Ingrese el nombre del expositor de la actividad']) !!}
            </div>

            @error('id_area')
                <span class="text-danger">{{$message}}</span>
            @enderror

            <!-- Provincias -->

            <div class="form-group">
                {!! Form::label('id_province', 'Provincias') !!}
                {!! Form::select('id_province', $provinces, null, ['class' => 'form-control', 'placeholder'=>'Ingrese el nombre del expositor de la actividad']) !!}
            </div>

            @error('id_province')
                <span class="text-danger">{{$message}}</span>
            @enderror

                <br>
            {!! Form::submit('Actulizar actividad', ['class' => 'btn btn-primary']) !!}
                <br>

            {!! Form::close() !!}
        </div>        
    </div>
@stop

<!-- @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop -->