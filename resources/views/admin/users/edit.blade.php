@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Asignar un rol</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <h5>Nombre:</h5>
            <p class="form-control">{{$user->name}}</p>
            <h5>Email:</h5>
            <p class="form-control">{{$user->email}}</p>

            <h5>Listado de roles </h5>
            {!! Form::model($user, ['route'=>['admin.users.update', $user], 'method' => 'put']) !!}
            @foreach ($roles as $role)
                <div>
                    <label>
                        {!! Form::checkbox('roles[]', $role->id, null, ['class'=>'mr-1']) !!}
                        {{$role->name}}
                    </label>
                </div>
            @endforeach
            {!! Form::submit('Asignar Rol', ['class' => 'btn btn-primary']) !!}
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