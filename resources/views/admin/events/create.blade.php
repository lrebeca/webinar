@extends('adminlte::page')

@section('title', 'Crear Evento')

@section('content_header')
    <h1>Nueva Actividad</h1>
@stop

@section('content')
    <p>Planifique una nueva actividad </p>

    <div class="card">
        <div class="card-body">

            {!! Form::open(['route'=>'admin.events.store','files' => true]) !!}

                {!! Form::hidden('user_id', auth()->user()->id) !!}

                @include('admin.events.partials.form')

            <br>
            {!! Form::submit('Crear actividad', ['class' => 'btn btn-primary']) !!}
            <br>
            {!! Form::close() !!}
        </div>        
    </div>

    <div class="card-header">
        <a href="{{route('admin.events.index')}}" class="btn btn-primary">Volver</a>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
        .image-wrapper{
            position: relative;
            padding-bottom: 56.25%;
        }
        .image-wrapper img{
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
        #costos{
            display: none;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">  
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
        .create( document.querySelector( '#detalle' ) )
        .catch( error => {
            console.error( error );
        } );

        // Para cambiar la imagen
        document.getElementById("imagen").addEventListener('change', cambiarImagen);

        function cambiarImagen(event){
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("img").setAttribute('src', event.target.result);
            }
            reader.readAsDataURL(file);
        }
        
        //Para mostrar los costos 
        function mostrarCosto(){
            document.getElementById('costos').style.display = 'block'; 
        }
        function ocultarCosto(){
            document.getElementById('costos').style.display = 'none'; 
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

@stop