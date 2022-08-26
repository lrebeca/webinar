@extends('adminlte::page')

@section('title', 'Admin')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <h1>Imagenes</h1>
@stop

@section('content')

    <p>Selecciones una imagen</p>
    <div class="card">
        <div class="card-body">

            {!! Form::open(['route'=>'admin.images.store','files' => true]) !!}
            <!-- Imagen  -->
            <div class="row bm-3">
                <div class="col">
                    <div class="image-wrapper">
                        <img id="img" src="{{asset('asset/img/DSC_0006.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('imagen', 'Imagen') !!} <br>
                        {!! Form::file('imagen', ['accept'=>'image/*', 'class' => 'form-control-file']) !!}
                    </div>
                    @error('imagen')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            
            <br>
            {!! Form::submit('Agregar imagen', ['class' => 'btn btn-primary']) !!}
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
    </style>
    
@stop

@section('js')
    <script> console.log('Hi!');</script>
    <script>
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
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

@stop