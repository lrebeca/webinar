<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>C P C F</title>
  </head>
  <header class="container">
    <nav class=" navbar fixed-top navbar-expand-lg navbar-dark bg-dark p-md-3">
        <div class="container-fluid">
            <a href="/"><img src="{{asset('asset/img/log2.png')}}" alt="" width="120" height="50"></a>
            <!-- boton hamburguesa para reducir de tamaño -->
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#MenuNavegacion">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Menu de navegacion  -->
            <div id="MenuNavegacion" class="collapse navbar-collapse">
                <ul class="navbar-nav m-sm-3">
                    {{-- <li class="nav-item"><a href="#" class="nav-link text-white">Inicio</a></li> --}}
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Carreras
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a href="#" class="dropdown-item">Contaduría Pública</a></li>
                        <li><a href="#" class="dropdown-item">Contaduría Pública T. S.</a></li>
                        <li><a href="#" class="dropdown-item">Administración Financiera</a></li>
                        <li><a href="#" class="dropdown-item">Comercio Esterior y Aduanas</a></li>
                    </ul>
                    <li class="nav-item"><a href="#" class="nav-link text-white">Posgrado</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-white">Contactanos</a></li>
                </ul>
            </div>
            <!-- Parte de login -->
            @if (Route::has('login'))
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    @auth
                        <a href="{{ url('/admin') }}" class="btn btn-outline-light">Panel</a>
                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <a href="{{ url('logout') }}" class="btn btn-outline-light" role="menuitem" onclick="event.preventDefault();this.closest('form').submit();">Cerrar Secion</a>
                        </form>

                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-light">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ms-4 btn btn-outline-light">Register</a>
                        @endif
                    @endif
                </div>
            @endif    
        </div>
    </nav>
  </header>
  <body>
      
  
    




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    <script src="js/bootstrap.bundle.min.js"></script>