<!DOCTYPE html>
<html lang="en">
    @extends('layouts.header')
    <title>Registro | CPCF</title>
    <link rel="shortcut icon" href="{{asset('favicons/favicon.ico')}}" type="image/x-ico">

    <div class="container-fluid p-5 bg-dark"></div>

    <style type="text/css">
        #form_s, #form_gratis_s{
            display: none;
        }
        #form_p, #form_gratis_p{
            display: none;
        }
        #dep_s, #trans_s{
            display: none;
        }
        #dep_p, #trans_p{
            display: none;
        }
    </style>
<body>
    
    {{-- Bienvenida a la pagina de registro --}}
<div class="alert alert-dark text-center">
    <h1>PUEDES REGISTRARTE AL EVENTO</h1>
</div>

{{-- Detalles del evento --}}
<div class="container">
    <div class="row align-items-center">
        <div class="col">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                @isset($event->imagen)
                    <img id="img" src="{{Storage::url($event->imagen)}}"  class="img-fluid">
                @else
                    <div class="image-wrapper">
                        <img id="img" src="{{asset('asset/img/DSC_0006.jpg')}}">
                    </div>
                @endisset
            </div>
        </div>
        <div class="col">
            <br>
                <h5 class="card-title text-center">
                    {{$event->evento}}
                </h5>
                <p class="card-text text-center">
                    {!! $event->detalle !!}
                </p>
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

            {{-- Ingreso al evento para los registrados --}}

                <!-- Button trigger modal -->
                <div class="text-center"><br><br>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Ingresar al evento
                    </button>
                </div>
                        {!! Form::open(['route'=>'ingresar']) !!}
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        {!! Form::hidden('id_evento', $event->id) !!}
                                    @error('id_evento')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror

                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Registro</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">                                
                                            
                            {{-- Email --}}
                                <div class="form-group mb-3">
                                    {!! Form::label('email2', 'Email') !!}
                                    {{-- {!! Form::email('email2', null, ['class' => 'form-control', 'placeholder'=>'Example@gmail.com']) !!} --}}
                                    <input type="email" name="email2" id="email2" value="{{old('email2')}}" placeholder='Example@gmail.com' class="form-control" >
                                </div>
                                @error('email2')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                
                            {{-- Numero C.I. --}}
                                <div class="form-group mb-3">
                                    {!! Form::label('carnet_identidad2', 'Contraseña') !!}
                                    {!! Form::password('carnet_identidad2', null, ['class' => 'form-control', 'placeholder'=>'Ingrese su numero de carnet de identidad ']) !!}
                                </div>
                                @error('carnet_identidad2')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            
                        </div>
                        <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                    </div>
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
    <h3 class="text-center">Formulario de registro al evento </h3>
    {{-- Boton para seleccionar si es estudiante o profecional  --}}
        @if ($event->costo_student > 0 && $event->costo_prof > 0)
            <div class="container text-center">
                <input type="radio" onclick="mostrarFormStu();" name="radio" value="estudiante"> Estudiante
                <input type="radio" onclick="mostrarFormPro();" name="radio" value="profesional"> Profesional
            </div>
        @else
            <div class="container text-center">
                <input type="radio" onclick="mostrarFormGratisStu();" name="radio" value="estudiante"> Estudiante
                <input type="radio" onclick="mostrarFormGratisPro();" name="radio" value="profesional"> Profesional
            </div>
        @endif

    {{-- Evento pagado --}}
        {{-- Estudiantes --}}

        @if ($event->costo_student > 0)
            <div id="form_s">
                <h3>Registro Estudiante </h3><br>
                <div class="row justify-content-md-center">
                    {!! Form::open(['route'=>'students.store','enctype' => 'multipart/form-data' ,'files' => true]) !!}

                        {!! Form::hidden('id_evento', $event->id) !!}
                        {!! Form::hidden('estado', 'estudiante') !!}
                        {!! Form::hidden('costo_e', $event->costo_student) !!}

                        @include('registers.partials.pagado')

                    {{-- Numero C.U. --}}
                    <div class="form-group mb-3">
                        {!! Form::label('carnet_universitario', 'Numero C.U.') !!}
                        {!! Form::text('carnet_universitario', null, ['class' => 'form-control', 'placeholder'=>'Ingrese su numero de carnet de Universitario ']) !!}
                    </div>

                        @error('carnet_universitario')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        
                    {{-- Numero de Deposito --}}
                    {{-- Si es deposito deben ir a las oficinas de administracion si es transferencia si se puede registrar así --}}

                    <div class="form-group mb-3">
                        <input type="radio" onclick="n_dE();" name="radio2" value="Deposito"> Deposito
                        <input type="radio" onclick="n_tE();" name="radio2" value="Transferencia"> Transferencia 
                    </div>
                
                    <div id="dep_s">
                    <p>El estudiante deberá apersonarse a las oficinas de administracion para poder dejar la factura de su deposito durante las 24 para posteriormente proceder a la confirmacion de su formularío .</p>
                        <div class="form-group mb-3" >
                            {!! Form::label('n_deposito', 'Numero de Deposito') !!}
                            {!! Form::number('n_deposito', null, ['class' => 'form-control', 'placeholder'=>'Ingrese su descripcion si es necesario ']) !!}
                        </div>
    
                        @error('n_deposito')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
    
                        {{-- Imagen de Deposito --}}
                        <div class="form-group mb-3">
                            {!! Form::label('img_deposito', 'Imagen de Deposito') !!}
                            {!! Form::file('img_deposito', ['accept'=>'image/*', 'class' => 'form-control-file']) !!}
                        </div>
    
                        @error('img_deposito')
                            <span class="text-danger">{{$message}}</span>
                        @enderror

                        {{-- Numero de Celular de referencia --}}
                        <div class="form-group mb-3">
                            {!! Form::label('n_celular2', 'Numero de Referencia') !!}
                            {!! Form::number('n_celular2', null, ['class' => 'form-control', 'placeholder'=>'Ingrese el numero de celular ']) !!}
                        </div>

                        @error('n_celular2')
                            <span class="text-danger">{{$message}}</span>
                        @enderror

                    </div>

                    <div id="trans_s">
                        <div class="form-group mb-3" >
                            {!! Form::label('n_deposito', 'Numero de Deposito') !!}
                            {!! Form::number('n_deposito', null, ['class' => 'form-control', 'placeholder'=>'Ingrese su descripcion si es necesario ']) !!}
                        </div>
    
                        @error('n_deposito')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
    
                        {{-- Imagen de Deposito --}}
                        <div class="form-group mb-3">
                            {!! Form::label('img_deposito', 'Imagen de Deposito') !!}
                            {!! Form::file('img_deposito', ['accept'=>'image/*', 'class' => 'form-control-file']) !!}
                        </div>
    
                        @error('img_deposito')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
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
                    {!! Form::open(['route'=>'students.store','files' => true]) !!}

                        {!! Form::hidden('id_evento', $event->id) !!}
                        {!! Form::hidden('estado', 'profesional') !!}
                        {!! Form::hidden('costo_e', $event->costo_prof) !!}
                    
                        @include('registers.partials.pagado')

                    {{-- Numero de Deposito --}}
                    {{-- Si es deposito deben ir a las oficinas de administracion si es transferencia si se puede registrar así --}}

                    <div class="form-group mb-3">
                        <input type="button" onclick="n_dP();" name="radio2" value="Deposito">
                        <input type="button" onclick="n_tP();" name="radio2" value="Transferencia">
                    </div>
                
                    <div id="dep_p">
                        <p>El Participante deberá apersonarse a las oficinas de administracion para poder dejar la factura de su deposito esto para poder validar su asistencia al evento.</p>
                    </div>

                    <div id="trans_p">
                        <div class="form-group mb-3" >
                            {!! Form::label('n_deposito', 'Numero de Deposito') !!}
                            {!! Form::number('n_deposito', null, ['class' => 'form-control', 'placeholder'=>'Ingrese su descripcion si es necesario ']) !!}
                        </div>
    
                        @error('n_deposito')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
    
                        {{-- Imagen de Deposito --}}
                        <div class="form-group mb-3">
                            {!! Form::label('img_deposito', 'Imagen de Deposito') !!}
                            {!! Form::file('img_deposito', ['accept'=>'image/*', 'class' => 'form-control-file']) !!}
                        </div>
    
                        @error('img_deposito')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <br>
                    {!! Form::submit('Enviar Formulario', ['class' => 'btn btn-primary']) !!}

                    {!! Form::close() !!}
                </div>
            </div>
        @endif

    {{-- Evento Gratuito --}}
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

                        @include('registers.partials.gratis')
                    
                    {{-- Numero C.U. --}}
                    <div class="form-group mb-3">
                        {!! Form::label('carnet_universitario', 'Numero C.U.') !!}
                        {!! Form::number('carnet_universitario', null, ['class' => 'form-control', 'placeholder'=>'Ingrese su numero de carnet de Universitario ']) !!}
                    </div>

                        @error('carnet_universitario')
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
                    
                        @include('registers.partials.gratis')
                        
                    <br>
                    {!! Form::submit('Enviar Formulario', ['class' => 'btn btn-primary']) !!}

                    {!! Form::close() !!}
                </div>
            </div> 
        @endif

</div> <br><br>

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

    function n_dE(){
        document.getElementById('dep_s').style.display = 'block';
        document.getElementById('trans_s').style.display = 'none';
    }
    function n_tE(){
        document.getElementById('dep_s').style.display = 'none';
        document.getElementById('trans_s').style.display = 'block';
    }
    function n_dP(){
        document.getElementById('dep_p').style.display = 'block';
        document.getElementById('trans_p').style.display = 'none';
    }
    function n_tP(){
        document.getElementById('dep_p').style.display = 'none';
        document.getElementById('trans_p').style.display = 'block';
    }

    // function Enviar_form(){
    //     alert("Se confirmara su inscripcion a su email o su whatsapp");
    // }
</script>
</body>

@extends('layouts.footer')

</html>