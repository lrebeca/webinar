@extends('layouts.header2')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro</title>

    <style type="text/css">
        #form_s, #form_gratis_s{
            display: none;
        }
        #form_p, #form_gratis_p{
            display: none;
        }
    </style>
</head>
<body><br><br><br><br>
    {{-- Bienvenida a la pagina de registro --}}
<div class="alert alert-dark text-center">
    <h1>PUEDES REGISTRARTE AL EVENTO</h1>
</div>

{{-- Detalles del evento --}}
<div class="container">
    <div class="">
        <div class="card-body ">
            <div>
                <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                    <center>
                        <img src="{{asset('asset/img/DSC_0006.jpg')}}" class="img-fluid" style="width: 50%">
                    {{-- <img src="{{Storage::url($event->image->url)}}" alt=""> --}}
                    </center>
                </div>
                <div>
                    <h5 class="card-title text-center">
                        {{$event->evento}}
                    </h5>
                    <p class="card-text text-center">
                        {!! $event->detalle !!}
                    </p>
                </div>
            </div>
            <div class="card-text text-center">
                @if ($event->costo_student > 0 && $event->costo_prof > 0)
                    <h6>Costo para Estudiantes</h6>
                    {{$event->costo_student}}
                    <h6>Costo para Profecionales</h6>
                    {{$event->costo_prof}}
                @else
                    <h5>Evento gratuito</h5>
                @endif
                <h6>Fecha de inicio</h6>
                {{$event->fecha_inicio}}
                <h6>Fecha de finalizacion</h6>
                {{$event->fecha_fin}}
            </div>
        </div>
    </div>        
</div>

    @if (session('info'))
    <div class="alert alert-success">
        <strong>
            {{session('info')}}
        </strong>
    </div>
    @endif

{{-- Div del contenedor de los formularios  --}}
<div class="container">
    {{-- Boton para seleccionar si es estudiante o profecional  --}}
        @if ($event->costo_student > 0 && $event->costo_prof > 0)
            <div class="container">
                <input type="radio" onclick="mostrarFormStu();" name="radio" value="estudiante"> Estudiante
                <input type="radio" onclick="mostrarFormPro();" name="radio" value="profesional"> Profesional
            </div>
        @else
            <div class="container">
                <input type="radio" onclick="mostrarFormGratisStu();" name="radio" value="estudiante"> Estudiante
                <input type="radio" onclick="mostrarFormGratisPro();" name="radio" value="profesional"> Profesional
                {{-- <button type="button" onclick="mostrarFormGratisStu();" >Estudiante</button>
                <button type="button" onclick="mostrarFormGratisPro();" >Profesional</button> --}}
            </div>
        @endif

    {{-- Evento pagado --}}
        {{-- Estudiantes --}}

        @if ($event->costo_student > 0)
            <div id="form_s" class="container">
                <h3>Registro Estudiante </h3><br>
                <div class="row justify-content-md-center">
                    {!! Form::open(['route'=>'students.store','enctype' => 'multipart/form-data' ,'files' => true]) !!}

                        {!! Form::hidden('id_evento', $event->id) !!}
                        {!! Form::hidden('estado', 'estudiante') !!}
                        {!! Form::hidden('costo_e', $event->costo_student) !!}
                    
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

                    {{-- Numero C.I. --}}
                    <div class="form-group">
                        {!! Form::label('carnet_identidad', 'Numero C.I.') !!}
                        {!! Form::number('carnet_identidad', null, ['class' => 'form-control', 'placeholder'=>'Ingrese su numero de carnet de identidad ']) !!}
                    </div>

                    @error('carnet_identidad')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                    {{-- Numero C.U. --}}
                    <div class="form-group">
                        {!! Form::label('carnet_universitario', 'Numero C.U.') !!}
                        {!! Form::text('carnet_universitario', null, ['class' => 'form-control', 'placeholder'=>'Ingrese su numero de carnet de Universitario ']) !!}
                    </div>

                    @error('carnet_universitario')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                    {{-- Numero de Celular --}}
                    <div class="form-group">
                        {!! Form::label('n_celular', 'Numero de Celular') !!}
                        {!! Form::number('n_celular', null, ['class' => 'form-control', 'placeholder'=>'Ingrese el numero de celular ']) !!}
                    </div>

                    @error('n_celular')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                    {{-- Numero de Deposito --}}
                    <div class="form-group">
                        {!! Form::label('n_deposito', 'Numero de Deposito') !!}
                        {!! Form::number('n_deposito', null, ['class' => 'form-control', 'placeholder'=>'Ingrese su descripcion si es necesario ']) !!}
                    </div>

                    @error('n_deposito')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                    {{-- Imagen de Deposito --}}
                    <div class="form-group">
                        {!! Form::label('img_deposito', 'Imagen de Deposito') !!}
                        {!! Form::file('img_deposito', ['accept'=>'image/*', 'class' => 'form-control-file']) !!}
                    </div>

                    @error('img_deposito')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                    <br>
                    
                    <br>
                    {!! Form::submit('Enviar Formulario', ['class' => 'btn btn-primary']) !!}

                    {!! Form::close() !!}
                </div>
            </div>
        @endif

        {{-- Profesional --}}

        @if ($event->costo_prof > 0)
            <div id="form_p" class="container">
                <h3>Registrate en el formulario </h3><br>
                <div class="row justify-content-md-center">
                    {!! Form::open(['route'=>'students.store','enctype' => 'multipart/form-data' ,'files' => true]) !!}

                        {!! Form::hidden('id_evento', $event->id) !!}
                        {!! Form::hidden('estado', 'profesional') !!}
                        {!! Form::hidden('costo_e', $event->costo_prof) !!}
                    
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

                    {{-- Numero C.I. --}}
                    <div class="form-group">
                        {!! Form::label('carnet_identidad', 'Numero C.I.') !!}
                        {!! Form::text('carnet_identidad', null, ['class' => 'form-control', 'placeholder'=>'Ingrese su numero de carnet de identidad ']) !!}
                    </div>

                    @error('carnet_identidad')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                    {{-- Numero de Celular --}}
                    <div class="form-group">
                        {!! Form::label('n_celular', 'Numero de Celular') !!}
                        {!! Form::text('n_celular', null, ['class' => 'form-control', 'placeholder'=>'Ingrese el numero de celular ']) !!}
                    </div>

                    @error('n_celular')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                    {{-- Numero de Deposito --}}
                    <div class="form-group">
                        {!! Form::label('n_deposito', 'Numero de Deposito') !!}
                        {!! Form::text('n_deposito', null, ['class' => 'form-control', 'placeholder'=>'Ingrese su descripcion si es necesario ']) !!}
                    </div>

                    @error('n_deposito')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                    {{-- Imagen de Deposito --}}
                    <div class="form-group">
                        {!! Form::label('img_deposito', 'Imagen de Deposito') !!}
                        {!! Form::file('img_deposito', ['accept'=>'image/*', 'class' => 'form-control-file']) !!}
                    </div>

                    @error('img_deposito')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                    <br>
                    
                    <br>
                    {!! Form::submit('Enviar Formulario', ['class' => 'btn btn-primary']) !!}

                    {!! Form::close() !!}
                </div>
            </div>
        @endif

    {{-- Formulario de inscripcion al evento Gratuito --}}
        {{-- Estudiantes --}}

        @if ($event->costo_student <= 0 && $event->costo_prof <= 0)
            <div id="form_gratis_s" class="card ">
                <h3>Registrate en el formulario </h3><br>
                <div class="card-body">
                    {!! Form::open(['route'=>'students.store']) !!}

                        {!! Form::hidden('id_evento', $event->id) !!}
                        {!! Form::hidden('estado', 'estudiante') !!}
                        {!! Form::hidden('costo_e', '0') !!}

                        {{-- <input type="hidden" name="id_evento" value="{{$event->id}}"> --}}
                    
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

                    {{-- Numero C.I. --}}
                    <div class="form-group">
                        {!! Form::label('carnet_identidad', 'Numero C.I.') !!}
                        {!! Form::number('carnet_identidad', null, ['class' => 'form-control', 'placeholder'=>'Ingrese su numero de carnet de identidad ']) !!}
                    </div>

                    @error('carnet_identidad')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                    {{-- Numero C.U. --}}
                    <div class="form-group">
                        {!! Form::label('carnet_universitario', 'Numero C.U.') !!}
                        {!! Form::number('carnet_universitario', null, ['class' => 'form-control', 'placeholder'=>'Ingrese su numero de carnet de Universitario ']) !!}
                    </div>

                    @error('carnet_universitario')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                    {{-- Numero de Celular --}}
                    <div class="form-group">
                        {!! Form::label('n_celular', 'Numero de Celular') !!}
                        {!! Form::number('n_celular', null, ['class' => 'form-control', 'placeholder'=>'Ingrese el numero de celular ']) !!}
                    </div>

                    @error('n_celular')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    
                    <br>
                    {!! Form::submit('Enviar Formulario', ['class' => 'btn btn-primary']) !!}

                    {!! Form::close() !!}
                </div>
            </div> 
        @endif

        {{-- Profesionales --}}

        @if ($event->costo_student <= 0 && $event->costo_prof <= 0)
            <div id="form_gratis_p" class="card ">
                <h3>Registrate en el formulario </h3><br>
                <div class="card-body">
                    {!! Form::open(['route'=>'students.store']) !!}

                        {!! Form::hidden('id_evento', $event->id) !!}
                        {!! Form::hidden('estado', 'profesional') !!}
                        {!! Form::hidden('costo_e', '0') !!}
                    
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

                    {{-- Numero C.I. --}}
                    <div class="form-group">
                        {!! Form::label('carnet_identidad', 'Numero C.I.') !!}
                        {!! Form::number('carnet_identidad', null, ['class' => 'form-control', 'placeholder'=>'Ingrese su numero de carnet de identidad ']) !!}
                    </div>

                    @error('carnet_identidad')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                    {{-- Numero de Celular --}}
                    <div class="form-group">
                        {!! Form::label('n_celular', 'Numero de Celular') !!}
                        {!! Form::number('n_celular', null, ['class' => 'form-control', 'placeholder'=>'Ingrese el numero de celular ']) !!}
                    </div>

                    @error('n_celular')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    
                    <br>
                    {!! Form::submit('Enviar Formulario', ['class' => 'btn btn-primary']) !!}

                    {!! Form::close() !!}
                </div>
            </div> 
        @endif
</div>

{{-- Ingreso al evento para los registrados --}}


<div class="container">

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Registrarse
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                {!! Form::open(['route'=>'ingresar']) !!}

                {!! Form::hidden('id_evento', $event->id) !!}
                               
                {{-- Email --}}
                <div class="form-group">
                    {!! Form::label('email2', 'Email') !!}
                    {!! Form::text('email2', null, ['class' => 'form-control', 'placeholder'=>'Example@gmail.com']) !!}
                </div>
    
                @error('email2')
                    <span class="text-danger">{{$message}}</span>
                @enderror
    
                {{-- Numero C.I. --}}
                <div class="form-group">
                    {!! Form::label('carnet_identidad2', 'Numero C.I.') !!}
                    {!! Form::password('carnet_identidad2', null, ['class' => 'form-control', 'placeholder'=>'Ingrese su numero de carnet de identidad ']) !!}
                </div>
    
                @error('carnet_identidad2')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                {!! Form::submit('Enviar Formulario', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
        </div>
    </div>
    
</div>

{{-- Js de los botones --}}

<script>
    function mostrarFormStu(){
        document.getElementById('form_s').style.display = 'block'; 
        document.getElementById('form_p').style.display = 'none';   
    }
    function mostrarFormPro(){
        document.getElementById('form_p').style.display = 'block';
        document.getElementById('form_s').style.display = 'none';     
    }

    function mostrarFormGratisStu(){
        document.getElementById('form_gratis_s').style.display = 'block';    
        document.getElementById('form_gratis_p').style.display = 'none';    
    }
    function mostrarFormGratisPro(){
        document.getElementById('form_gratis_p').style.display = 'block';    
        document.getElementById('form_gratis_s').style.display = 'none';    
    }

</script>

</body>
</html>
<br>
@extends('layouts.footer')