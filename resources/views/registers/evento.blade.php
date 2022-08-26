<!DOCTYPE html>
<html lang="en">
    @extends('layouts.header')
    <link rel="shortcut icon" href="{{asset('favicons/favicon.ico')}}" type="image/x-ico">
    <title>CPCF | {{$event->evento}}</title>
<body>
    <div class="container-fluid p-5 bg-dark"></div>
    {{-- Bienvenida a la pagina de registro --}}
    <div class="alert alert-dark text-center">
        <h1>BIENVENIDO AL EVENTO </h1>
        <h1>{{$event->evento}}</h1>
    </div>

    {{-- Evento si es virtual links si es presencial información --}}
    <div class="container">

        {!!$event->detalle!!}
         
        <div class="row">
            <div class="col-4 m-2">
                @foreach ($students as $student)
                    @if ($student->id_evento == $event->id && $student->email == $email)
                    <table class="table">
                        <thead>
                            <tr>
                                <th colspan="2" class="text-center">Datos del Participante</th>
                            </tr>
                            <tr>
                                <th>Nombres:</th>
                                <td>{{$student->nombre}}</td>
                            </tr>
                            <tr>
                                <th>Apellido Paterno:</th>
                                <td>{{$student->apellido_paterno}}</td>
                            </tr>
                            <tr>
                                <th>Apellido Materno:</th>
                                <td>{{$student->apellido_materno}}</td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td>{{$student->email}}</td>
                            </tr>
                            <tr>
                                <th>Carnet Identidad:</th>
                                <td>{{$student->carnet_identidad}}</td>
                            </tr>
                            <tr>
                                <th>Numero de Celular:</th>
                                <td>{{$student->n_celular}}</td>
                            </tr>
                            @isset($student->n_celular2)
                            <tr>
                                <th>Numero de respaldo:</th>
                                <td>{{$student->n_celular2}}</td>
                            </tr>
                            @endisset
                            @isset($student->carnet_universitario)
                            <tr>
                                <th>Carnet Universitario:</th>
                                <td>{{$student->carnet_universitario}}</td>
                            </tr>
                            @endisset
                            <tr>
                                <th>Estado:</th>
                                <td>{{$student->estado}}</td>
                            </tr>
                            <tr>
                                <th>Costo del Evento: </th>
                                <td>{{$student->costo_e}}</td>
                            </tr>
                            <tr>
                                <th>Progreso de formulario:</th>
                                <td>{{$student->progreso}}</td>
                            </tr>
                            <tr>
                                 {{-- Certificado del estudiante --}}
                                <th colspan="2">
                                    <div class="container">
                                        <a href="{{route('certificado', $student)}}" class="btn btn-primary">Ver certificado</a>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                    </table>
                    @endif                    
                @endforeach

            </div>
            <div class="col-7">
                Datos del Evento <br>

                <h4>Detalles</h4>

                @foreach ($details as $detail)
                    @if ($detail->id_evento == $event->id)
                        {!!$detail->detalle!!} <br>
                        {{$detail->link}} <br>
                    @endif
                @endforeach
                
               <br>
                <h4>Material necesario para el participar del evento</h4>

                @foreach ($documents as $document)
                @if ($document->id_evento == $event->id)
                {{$document->titulo}} <br>
                @endif
                @endforeach
                

            </div>
        </div>
    </div>

</body>
</html>

@extends('layouts.footer')