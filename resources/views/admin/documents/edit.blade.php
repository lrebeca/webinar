@extends('adminlte::page')

@section('title', 'Documentos')

@section('content_header')
    <h1>Documentos</h1>
@stop

@section('content')
    <p>Cree los documentos del evento </p>

    @if (session('info'))
    <div class="alert alert-success">
        <strong>
            {{session('info')}}
        </strong>
    </div>
    @endif

    <div class="card">
        <div class="card-body">

            {!! Form::model($document, ['route'=>['admin.documents.update', $document], 'files' => true, 'method' => 'put']) !!}

             <!-- Documentos -->
             <div class="form-group">
                {!! Form::label('id_evento', 'Evento') !!}
                {!! Form::select('id_evento', $events , null, ['class' => 'form-control', 'placeholder'=>'Ingrese el nombre del expositor del evento']) !!}
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
            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
            <br>

            {!! Form::close() !!}
        </div>        
    </div>

    <div class="card-header">
        <a href="{{route('admin.documents.index')}}" class="btn btn-primary">Volver</a>
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

@stop