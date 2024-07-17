<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GorettiSnackXpress</title>
      <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon1.png') }}" rel="icon">
    <link rel="stylesheet" href="{{ asset('app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/2713879efc.js" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Alegreya+Sans:ital,wght@0,100;0,300;0,400;0,500;0,700;0,800;0,900;1,100;1,300;1,400;1,500;1,700;1,800;1,900&display=swap');

        body {
            font-family: 'Alegreya Sans', sans-serif;
        }

        .navbar {
            background-color: #DF4B4B;
        }

        .navbar-nav {
            text-align: center;
        }

        .navbar-nav .dropdown-menu {
            right: 0;
            left: auto;
        }

        .navbar-nav .nav-item img {
            vertical-align: middle;
        }

        .navbar-nav .dropdown-toggle, .navbar-nav .nav-link {
            display: flex;
            align-items: center;
        }

        .navbar-nav .nav-link {
            border-radius: 0px;
            transition: background-color 0.3s;
        }

        .navbar-nav .nav-link:hover {
            background-color: rgba(0, 0, 0, 0.1);
        }

        .dropdown-item:hover {
            background-color: #DF4B4B;
            color: aliceblue;
        }

        .dropdown {
            background-color: #DF4B4B;
        }

        .texto-con-margen {
            margin: 40px;
        }

        .Texto {
            padding: 30px;
        }

        .badge.bg-danger {
            background-color: #DF4B4B;
        }

        @media (max-width: 600px) {
            .proposito {
                width: 100%;
                margin: 1px;
            }

            .imagen1 {
                width: 30%;
                margin: 1px;
                max-width: 100%;
            }

            .row {
                flex-direction: column;
            }

            .col-sm-12 {
                order: 1;
            }

            .col-sm-4 {
                order: 2;
                text-align: center;
            }

            .col-sm-4 img {
                max-width: 100%;
                height: auto;
            }
        }

        @media (min-width: 768px) {
            .row {
                display: flex;
            }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('principal') }}">GorettiSnackXpress</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarScroll">
      <ul class="navbar-nav">
        <li class="nav-item mt-1 p-1">
            <a href="{{route('pedido.client')}}" class="nav-link text-light">Volver al Pedido</a>
        </li>
        @auth
          <li class="nav-item mt-1 p-1">
            <a href="{{ route('producto') }}" class="nav-link text-light"><i class="fa-brands fa-product-hunt"> </i> Administrar productos</a>
          </li>
          <li class="nav-item mt-1 p-1">
            <a href="{{ route('categoria') }}" class="nav-link text-light"><i class="bi bi-house-door-fill"> </i> Administrar categorias</a>
          </li>
        @endauth
        @guest
          <li class="nav-item mt-1 p-1">
            <a class="nav-link active text-light" aria-current="page" href="{{ route('login') }}">Acceder</a>
          </li>
        @endguest
        @auth
          <li class="nav-item dropdown mt-1 p-1">
            <a href="#" class="nav-link dropdown-toggle text-light" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="https://static.wikia.nocookie.net/9ec601b8-beb0-47b9-a5ad-19d8dea9c8e8/scale-to-width/370" alt="user" width="30" height="30" class="rounded-circle">
              <span class="d-none d-sm-inline mx-1">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end text-small shadow">
              <li><a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                 {{ __('Cerrar Sesión') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                 @csrf
              </form></li>
            </ul>
          </li>
        @endauth
        <li class="nav-item mt-1 p-1">
            <a class="nav-link" href="{{ route('checkout') }}">Carrito <span class="badge bg-danger">{{\Cart::count()}}</span></a>
          </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

