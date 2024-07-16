<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Ventas</title>
    <link rel="stylesheet" href="{{ asset('app.css') }}">
</head>
<body>

                 <a class="nav-link" href="{{ route('checkout') }}">Carrito <span class="badge bg-danger">{{\Cart::count()}}</span></a>
    @yield('content')
</body>
</html>
