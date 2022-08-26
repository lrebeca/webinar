@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de los organizadores de eventos</h1>
@stop

@section('content')

{{-- este es para que se muestre el mensaje  --}}
    @if (session('info'))
    <div class="alert alert-success">
        <strong>
            {{session('info')}}
        </strong>
    </div>
    @endif
<div class="car">
    {{-- Podemos poner texto  --}}
</div>

@can('admin.organizers.create')
    <div class="card-header">
        <a href="{{route('admin.organizers.create')}}" class="btn btn-primary">Agregar Nueva Unidad</a>
    </div><br> 
@endcan

<div class="car">
    <div class="car-body">
        <table id="provinces" class="table dt-responsive table-striped">
            <thead class="table-dark">
                <th>Id</th>
                <th>Unidad</th>
                <th>Provincia</th>
                <th>Detalle</th>
                <th>
                    @can('admin.organizers.edit')
                    Editar
                    @endcan
                </th>
                <th>
                    @can('admin.organizers.destroy')
                    Eliminar
                    @endcan
                </th>
            </thead>
            <tbody>
                @foreach ($organizers as $organizer)
                        <tr>
                            <td>{{$organizer->id}}</td>
                            <td>{{$organizer->unidad}}</td>
                            <td>{{$organizer->provincia}}</td>
                            <td>{{$organizer->detalle}}</td>
                            <td>
                                @can('admin.organizers.edit')
                                    <a href="{{route('admin.organizers.edit', $organizer)}}" class="btn btn-outline-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
                                        </svg> 
                                    </a>  
                                @endcan                            
                            </td>
                            <td>
                                @can('admin.organizers.destroy')
                                <form action="{{route('admin.organizers.destroy', $organizer)}}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" value="Eliminar" class="btn btn-outline-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>
                                        </svg>
                                    </button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                @endforeach
            </tbody>
        </table><br>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
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
            $('#provinces').DataTable({
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