<!DOCTYPE html>
<html lang="en">

    @extends('layouts.header')
    <link rel="shortcut icon" href="{{asset('favicons/favicon.ico')}}" type="image/x-ico">

<body>

<div class="banner-image d-flex justify-content-center align-items-center">
    <div class="content text-center main__banner" style="background-color: rgba(0, 0, 0, 0.6);">
        <h1 class="text-white">&nbsp;&nbsp;Facultad de Contaduría Pública y &nbsp;&nbsp;<br> Ciencias Financieras</h1>
    </div>
</div>

<!-- Area de contenido -->
        <!--  bienvenida   -->
<div class="alert alert-dark text-center">
        <h1>BIENVENIDO A LA PAGINA DE ACTIVIDADES</h1>
</div>

<div class="row">
    <div class="col-md-8 offset-md-1">
        <h2 class="has-text-aling-left">
            <strong>Eventos Disponibles actualmente</strong>
        </h2>
        <p class="has-text-aling-left">
            "Hecha un vistazo a nuestro catalogo de eventos disponibles a los cuales puedes registrarte, para poder aumentar tus conocimientos"
        </p>
    </div>
</div>

<!-- inicio de seccion -->
<div class="container my-3 d-grid gap-5">

    <div class="container row row-cols-1 row-cols-md-3 g-4">
        @foreach ($events as $event)
        <div class="col-lg-4 col-md-12">
            <div class="card-body ">
                <div>
                    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                        @isset($event->imagen)
                            <img id="img" src="{{Storage::url($event->imagen)}}"  class="img-fluid" alt="">
                        @else
                            <div class="image-wrapper">
                                <img id="img" src="{{asset('asset/img/DSC_0006.jpg')}}"  alt="">
                            </div>
                        @endisset
                    </div>
                    <div>
                        <h5 class="card-title text-center">
                            {{$event->evento}}
                        </h5>
                        {{-- <p class="card-text">
                            {!!$event->detalle!!}
                        </p> --}}
                    </div>
                </div>
                <div class="card-text text-center">
                    @if ($event->costo_student > 0 && $event->costo_prof > 0)
                        <h6>Costo para Estudiantes</h6>
                        {{$event->costo_student}}
                        <h6>Costo para Profesionales</h6>
                        {{$event->costo_prof}}
                    @else
                        <h5>Evento gratuito</h5>
                    @endif
                    
                    <h6>Fecha de inicio</h6>
                    {{$event->fecha_inicio}}
                    <h6>Fecha de finalizacion</h6>
                    {{$event->fecha_fin}}

                    <br><br>

                    <a href="{{route('events.show', $event)}}" class="btn btn-primary">Ver evento</a>
                    {{-- {{ $event->id }} --}}

                </div>
            </div>
        </div>
        @endforeach

        {{-- <div>
            {!! $events->links() !!}
        </div> --}}
    </div>

</div>
<!-- Fin de la seccion -->



</body>
    @extends('layouts.footer')
</html>