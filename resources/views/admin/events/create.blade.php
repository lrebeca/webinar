@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Nueva Actividad</h1>
@stop

@section('content')
    <p>Planifique una nueva actividad </p>

    <div class="card">
        <div class="card-body">

            {!! Form::open(['route'=>'admin.events.store', 'files'=>true]) !!}

                {{-- {!! Form::hidden('user_id', auth()->user()->id) !!} --}}
            <!-- Nombre del Evento -->
                <div class="form-group">
                    {!! Form::label('evento', 'Evento') !!}
                    {!! Form::text('evento', null, ['class' => 'form-control', 'placeholder'=>'Ingrese el evento que se realizara']) !!}
                </div>

                @error('evento')
                    <span class="text-danger">{{$message}}</span>
                @enderror

            <!-- detalle  -->

            <div class="form-group">
                {!! Form::label('detalle', 'Detalle') !!}
                {!! Form::textarea('detalle', null, ['class' => 'form-control', 'placeholder'=>'Ingrese los detalles del evento']) !!}
            </div>
                
                @error('detalle')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            
            <!-- Imagen  -->

            {{-- <div class="form-group">
                {!! Form::label('imagen', 'Imagen') !!} <br>
                {!! Form::macro('imagen', function()
                {
                    return '<input type="file" id="imagen" accept="image/*">';
                }, ['class' => 'form-control']) !!}
                {!! Form::imagen(); !!} --}}
                {{-- {!! Form::file('imagen', null, ['class' => 'form-control', 'placeholder'=>'seleccione una imagen']) !!} --}}
            {{-- </div>
            
            @error('imagen')
                <span class="text-danger">{{$message}}</span>
            @enderror --}}
            
            <!-- Costo de la actividad -->

                <div class="form-group">
                    {!! Form::label('costo', 'Costo') !!}
                    {!! Form::number('costo', null, ['class' => 'form-control', 'placeholder'=>'Ingrese el costo que tendra el evento']) !!}
                </div>

                @error('costo')
                    <span class="text-danger">{{$message}}</span>
                @enderror

                <!-- Fecha inicio de la Actividad -->

                <div class="form-group">
                    {!! Form::label('fecha_inicio', 'Fecha Inicio') !!}
                    {!! Form::date('fecha_inicio', null, ['class' => 'form-control', 'placeholder'=>'Ingrese la fecha de inicio del evento']) !!}
                </div>

                @error('fecha_inicio')
                    <span class="text-danger">{{$message}}</span>
                @enderror

            <!-- Fecha finalizacion de la actividad -->

                <div class="form-group">
                    {!! Form::label('fecha_fin', 'Fecha Finalizacion') !!}
                    {!! Form::date('fecha_fin', null, ['class' => 'form-control', 'placeholder'=>'Ingrese la fecha de finalizacion del evento']) !!}
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
                    Estado: &nbsp;<br>
                    {!! Form::label('estado', 'Borrador') !!}
                    {!! Form::radio('estado', 1, true )!!}
                    {!! Form::label('estado', 'publicado') !!}
                    {!! Form::radio('estado', 2) !!}
                </div>

                @error('estado')
                    <span class="text-danger">{{$message}}</span>
                @enderror

                <!-- Nombre del expositor -->

                <div class="form-group">
                    {!! Form::label('id_expositor', 'Nombre del Espositor') !!}
                    {!! Form::select('id_expositor',$exhibitors, null, ['class' => 'form-control', 'placeholder'=>'Ingrese el nombre del expositor del evento']) !!}
                </div>

                @error('id_expositor')
                    <span class="text-danger">{{$message}}</span>
                @enderror

                <!-- Unidada organizadora -->
                
                <div class="form-group">
                    {!! Form::label('id_unidad', 'Organizador') !!}
                    {!! Form::select('id_unidad',$unidad->toArray('unidad','provincia'), null, ['class' => 'form-control', 'placeholder'=>'Ingrese la unidad que esta organizando el evento']) !!}
                </div>

                @error('id_unidad')
                    <span class="text-danger">{{$message}}</span>
                @enderror

                <br><br>
                {!! Form::submit('Crear actividad', ['class' => 'btn btn-primary']) !!}
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
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
        .create( document.querySelector( '#detalle' ) )
        .catch( error => {
            console.error( error );
        } );
    </script> --}}
@stop