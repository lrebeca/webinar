@extends('adminlte::page')

@section('title', 'Eventos')

@section('css')

    <link rel="stylesheet" href="/css/admin_custom.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">

    <!-- CSS only -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
@stop

@section('content_header')
    <h1>Lista de Eventos</h1>
@stop

@section('content')


    @if (session('info'))
    <div class="alert alert-success">
        <strong>
            {{session('info')}}
        </strong>
    </div>
    @endif


    <div class="card-header">
            <a href="{{route('admin.events.create')}}" class="btn btn-primary">Planificar un nuevo evento</a>
    </div>
        <br>

    <div class="card">
        <div class="card-body">
            <table id="eventos" class="table table-striped dt-responsive nowrap" style="width:100%">
                <thead class="table-dark">
                    <th>Id</th>
                    <th>Evento</th>
                    <th>Detalle</th>
                    <th>Costo Estudiantes</th>
                    <th>Costo Profesionales</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Imagen</th>
                    <th>WhatsApp</th>
                    <th>Telegram</th>
                    <th>Estado</th> 
                    <th>Expositor</th>
                    <th>Organizador</th>
                    <th>Acciones </th>
                    <th>Materiales</th>
                    <th>De los participantes</th>
                    <th>Certificado</th>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                        @foreach ($users as $user)
                            @foreach ($organizers as $organizer)
                            @foreach ($provinces as $province)
                                @if ($event->user_id == $user->id && $event->id_organizador == $organizer->id && $organizer->province_id == $province->id)
                                <tr>
                                    <td>{{$event->id}}</td>
                                    <td>{{$event->evento}}</td>
                                    <td>{!!$event->detalle!!}</td>
                                    <td>{{$event->costo_student}}</td>
                                    <td>{{$event->costo_prof}}</td>
                                    <td>{{$event->fecha_inicio}}</td>
                                    <td>{{$event->fecha_fin}}</td>
                                    <td>
                                        <img src="{{Storage::url($event->imagen)}}" class="img-fluid" width="50%">
                                    </td>
                                    <td>
                                        <a href="{{$event->link_whatsapp}}" class="btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" color="#25D366" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                            <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"></path>
                                            </svg>
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn" href="{{$event->link_telegram}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" color="#0088cc" fill="currentColor" class="bi bi-telegram" viewBox="0 0 16 16">
                                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z"></path>
                                            </svg>
                                        </a>
                                    </td>
                                    <td>{{$event->estado}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$organizer->unidad}} - {{$province->provincia}}</td>
                                    <td>
                                        <br> Editar: 
                                        <a href="{{route('admin.events.edit', $event)}}" class="btn btn-outline-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
                                            </svg>    
                                        </a>
                                        <br><br>
                                        <form action="{{route('admin.events.destroy', $event)}}" method="POST">
                                            @method('delete')
                                            @csrf
                                            Eliminar:
                                            <button type="submit" value="Eliminar" class="btn btn-outline-danger">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{route('admin.events.detalles', $event)}}" class="btn btn-primary">Ver Detalles</a>
                                        <a href="{{route('admin.events.documentos', $event)}}" class="btn btn-primary">Ver Documentos</a>
                                    </td>
                                    <td>
                                        <a href="{{route('admin.events.aprobados', $event)}}" class="btn btn-primary">Aprobados</a>
                                        <a href="{{route('admin.events.pendientes', $event)}}" class="btn btn-primary">Pendientes</a>
                                        <a href="{{route('admin.events.rechazados', $event)}}" class="btn btn-primary">Rechazados</a>
                                    </td>
                                    <td>
                                        @foreach ($certificates as $certificate)
                                            @if ($certificate->id_evento == $event->id)
                                                <a href="{{route('admin.events.certificado', $event)}}" class="btn btn-primary">Certificado</a>
                                            @endif
                                        @endforeach
                                    </td>
                               </tr>
                                @endif      
                            @endforeach
                            @endforeach
                        @endforeach
                    @endforeach

                </tbody>
            </table>
            {{-- <div>
                {!! $events->links() !!}
            </div> --}}
        </div>
    </div>

@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js" defer></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js" defer></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap5.min.js" defer></script>
    <script>
        $(document).ready(function () {
            $('#eventos').DataTable({
                reponsive: true,
                autoWidth: false,
                "language": {
                    "search": "Buscar",
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "paginate": {
                                    "previous": "Anterior",
                                    "next": "Siguiente",
                                    "first": "Primero",
                                    "last": "Último"
                    }
                }
                
            });
        });
    </script>

@stop