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
                    <div class="image-wrapper">
                        <iframe id="img" src="{{asset('asset/img/DSC_0006.jpg')}}" frameborder="0"></iframe>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('documento', 'Docuemento') !!} <br>
                        {!! Form::file('documento', ['class' => 'form-control-file']) !!}
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