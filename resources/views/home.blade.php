@extends('layouts.app')

@section('content')
<header class="header">
    <div class="search-bar">
        <form action="{{ route('productos.search') }}" method="GET">
            <input type="text" name="query" value="{{ request('query') }}" placeholder="Buscar restaurantes, comidas o más">
            <button type="submit">Buscar</button>
        </form>
    </div>
</header>
<main>
    <section class="categories">
        <h2>Categorías</h2>
        <div class="category-list">
            @foreach ($categorias as $categoria)
                <div class="category-item">
                    <h3>
                        <a href="{{ route('categoria.show', ['id' => $categoria->id]) }}">{{ $categoria->nombre }}</a>
                    </h3>
                    <h1>Holaaaaaaaaa</h1>
                </div>
            @endforeach
        </div>
    </section>

    @if(isset($productos) && $productos->isNotEmpty())
        <section class="search-results">
            <h2>Resultados de búsqueda para "{{ $query }}"</h2>
            <div class="product-list">
                @foreach ($productos as $producto)
                    <div class="product-item">
                        <h3>{{ $producto->nombre }}</h3>
                        <p>{{ $producto->descripcion }}</p>
                        <p>Precio: {{ $producto->precio }}</p>
                    </div>
                @endforeach
            </div>
        </section>
    @else
        <section class="popular-restaurants">
            <h2>Restaurantes Populares</h2>
            <div class="restaurant-list">
                <!-- Añadir restaurantes aquí -->
            </div>
        </section>
        <section class="special-offers">
            <h2>Ofertas Especiales</h2>
            <div class="offer-list">
                <!-- Añadir ofertas aquí -->
            </div>
        </section>
    @endif
</main>
@endsection
