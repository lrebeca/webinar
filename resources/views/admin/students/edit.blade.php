@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <center><h1>{{$event->evento}} </h1></center>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>
                {{session('info')}}
            </strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($student, ['route'=>['admin.students.enviado.update', $student], 'files' => true, 'method' => 'put']) !!}
            
                {{-- Nombre Y apellidos --}}

                <div class="form-group">
                    {!! Form::label('nombre', 'Nombre') !!}
                    {!! Form::text('nombre', null, ['class' => '', 'placeholder'=>'Nombre']) !!}

                    {!! Form::label('apellido_paterno', 'Apellido Paterno') !!}
                    {!! Form::text('apellido_paterno', null, ['class' => '', 'placeholder'=>'Primer apellido ']) !!}

                    {!! Form::label('apellido_materno', 'Apellido Materno') !!}
                    {!! Form::text('apellido_materno', null, ['class' => '', 'placeholder'=>'Segundo apellido']) !!}
                </div>

                @error('nombre')
                    <span class="text-danger">{{$message}}</span>
                @enderror

                @error('apellido_paterno')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                    
                @error('apellido_materno')
                    <span class="text-danger">{{$message}}</span>
                @enderror

                {{-- Email --}}
                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder'=>'Example@gmail.com']) !!}
                </div>

                @error('email')
                    <span class="text-danger">{{$message}}</span>
                @enderror

                {{-- Carnet Identidad --}}

                <div class="form-group">
                    {!! Form::label('carnet_identidad', 'Carnet de Identidad') !!}
                    {!! Form::text('carnet_identidad', null, ['class' => 'form-control', 'placeholder'=>'Example@gmail.com']) !!}
                </div>

                @error('carnet_identidad')
                    <span class="text-danger">{{$message}}</span>
                @enderror

                @if ($student->carnet_universitario != null)

                    {{-- Carnet Universitario --}}

                    <div class="form-group">
                        {!! Form::label('carnet_universitario', 'Carnet Universitario') !!}
                        {!! Form::text('carnet_universitario', null, ['class' => 'form-control', 'placeholder'=>'Example@gmail.com']) !!}
                    </div>

                    @error('carnet_universitario')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                @endif

                {{-- Numero de celular --}}

                <div class="form-group">
                    {!! Form::label('n_celular', 'Numero de celular') !!}
                    {!! Form::text('n_celular', null, ['class' => 'form-control', 'placeholder'=>'Example@gmail.com']) !!}
                </div>

                @error('n_celular')
                    <span class="text-danger">{{$message}}</span>
                @enderror

                @if ($student->n_celular2 != null)

                    {{-- Numero de celular 2 --}}

                    <div class="form-group">
                        {!! Form::label('n_celular2', 'Numero de celular de referencia') !!}
                        {!! Form::text('n_celular2', null, ['class' => 'form-control', 'placeholder'=>'Example@gmail.com']) !!}
                    </div>
    
                    @error('n_celular2')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                @endif

                {{-- costo del evento --}}

                <div class="form-group">
                    {!! Form::label('costo_e', 'Costo del Evento') !!}
                    {!! Form::number('costo_e', null, ['class' => 'form-control', 'placeholder'=>'Ingrese el costo para estudiantes']) !!}
                </div>

                @error('costo_e')
                    <span class="text-danger">{{$message}}</span>
                @enderror

                {{-- Numero de Deposito --}}
                
                <div class="form-group mb-3" >
                    {!! Form::label('n_deposito', 'Numero de Deposito') !!}
                    {!! Form::number('n_deposito', null, ['class' => 'form-control', 'placeholder'=>'Ingrese su descripcion si es necesario ']) !!}
                </div>

                @error('n_deposito')
                    <span class="text-danger">{{$message}}</span>
                @enderror

                <!-- Imagen  -->

                <div class="row mb-3">
                    <div class="col">
                        <div class="image-wrapper">
                            @isset($student->img_deposito)
                                <img id="img" src="{{Storage::url($student->img_deposito)}}"  alt="">
                            @else
                                <img id="img" src="{{asset('asset/img/DSC_0006.jpg')}}"  alt="">
                            @endisset
                        </div> 
                    </div>
                    <div class="col">
                        <div class="form-group mb-3">
                            {!! Form::label('img_deposito', 'Imagen de Deposito') !!}
                            {!! Form::file('img_deposito', ['accept'=>'image/*', 'class' => 'form-control-file']) !!}
                        </div>
                        @error('img_deposito')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <!-- estado del participante -->

                <div class="form-group">
                    Estado: &nbsp;<br>
                    {!! Form::label('estado', 'Estudiante') !!}
                    {!! Form::radio('estado', 'estudiante' )!!}
                    {!! Form::label('estado', 'Profesional') !!}
                    {!! Form::radio('estado', 'profesional') !!}
                </div>

                @error('estado')
                    <span class="text-danger">{{$message}}</span>
                @enderror

                {{-- Progreso de inscripcion  --}}
                <div class="form-group">
                    Progreso: &nbsp;<br>
                    {!! Form::label('progreso', 'Enviado') !!}
                    {!! Form::radio('progreso', 'enviado' )!!}
                    {!! Form::label('progreso', 'Aprobar') !!}
                    {!! Form::radio('progreso', 'aprobado') !!}
                    {!! Form::label('progreso', 'Rechazar') !!}
                    {!! Form::radio('progreso', 'rechazado') !!}
                </div>

                @error('progreso')
                    <span class="text-danger">{{$message}}</span>
                @enderror
    
            {!! Form::submit('Actualizar Registro', ['class' => 'btn btn-primary']) !!}
    
            {!! Form::close() !!}
        </div>
    </div>

    <div class="card-header">
        <a href="{{route('admin.students.enviado.index')}}" class="btn btn-primary">Volver a Pendientes</a>
        <a href="{{route('admin.students.aprobado.index')}}" class="btn btn-primary">Volver a Aprobados</a>
        <a href="{{route('admin.students.rechazado.index')}}" class="btn btn-primary">Volver a Rechazados</a>
    </div><br>

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
    <script> console.log('Hi!');  </script>

//    Para la imagen

<script>
    document.getElementById("img_deposito").addEventListener('change', cambiarImagen);

    function cambiarImagen(event){
        var file = event.target.files[0];

        var reader = new FileReader();
        reader.onload = (event) => {
            document.getElementById("img").setAttribute('src', event.target.result);
        }
        reader.readAsDataURL(file);
    }
</script>
        

   

@stop