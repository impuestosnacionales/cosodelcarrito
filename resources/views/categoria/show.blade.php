@extends('layouts.app')

@section('content')
<header class="header">
    <div class="search-bar">
        <input type="text" placeholder="Buscar restaurantes, comidas o más">
        <button>Buscar</button>
    </div>
</header>
<main>
    <section class="products-by-category">
        <h2>Productos en la categoría: {{ $categoria->nombre }}</h2>
        <div class="product-list">
            @foreach ($productos as $producto)
                <div class="product-item">
                    <h3>{{ $producto->nombre }}</h3>
                    <p>Precio: {{ $producto->precio }}</p>
                    <!-- Mostrar más detalles del producto si es necesario -->
                </div>
            @endforeach
        </div>
    </section>
</main>
@endsection
