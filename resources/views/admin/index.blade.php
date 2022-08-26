@extends('adminlte::page')

@section('title', 'Admin')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <h1>Tablero</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">BIENVENIDO</h1>
        </div>
        <div class="card-body">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolores corrupti assumenda qui sequi dignissimos quaerat voluptas ullam fugit earum, dolorem quos tempora eos natus dolore, error dolorum cum exercitationem! Expedita?</p>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); 

    Swal.fire(
        'Buen trabajo',
        'Haz clik en el boton',
        'Gracias'
    )
    </script>
@stop