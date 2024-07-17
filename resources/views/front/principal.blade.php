@extends('layouts.app')

@section('content')
<style>

<style>
    /* Estilos para la animación de entrada */
    main {
        opacity: 0; /* Inicialmente oculto */
        animation: fadeIn 0.5s forwards; /* Animación de fade-in */
    }

    @keyframes fadeIn {
        to {
            opacity: 1;
        }
    }

    /* Ajustes para hacer el encabezado más visible */
    .header {
        padding: 20px;
        background-color: rgba(675, 414, 533, 0.8); /* Fondo semi-transparente */
        text-align: center;
        position: relative; /* Añadir posición relativa para z-index */
        z-index: 1; /* Asegura que el encabezado esté sobre otros elementos */
    }

    h1 {
        color: #333; /* Color de texto más oscuro */
    }

    /* Estilo para el fondo del encabezado */
    .header:before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #f8f8f8; /* Color de fondo original */
        z-index: -1; /* Detrás del contenido del encabezado */
    }

    /* Otros estilos, sin cambios importantes */
    .search-bar form {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }

    /* Resto de estilos aquí... */


    .header {
        padding: 20px;
        background-color: #f8f8f8;
        text-align: center;
    }

    .search-bar form {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }

    .search-bar input[type="text"] {
        width: 300px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px 0 0 5px;
    }

    .search-bar button {
        padding: 10px 20px;
        border: none;
        background-color: #007bff;
        color: white;
        border-radius: 0 5px 5px 0;
        cursor: pointer;
    }

    .categories {
        margin: 10px 0;
        text-align: center;
    }

    .category-list {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
    }

    .category-item {
        flex: 1 1 calc(25% - 20px);
        margin: 10px;
        text-align: center;
    }

    .category-item h3 {
        margin-bottom: 10px;
    }

    .category-img {
        max-width: 100%;
        height: auto;
        border-radius: 5px;
    }

    .promotions, .payment-methods, .no-locals {
        margin: 20px 0;
        text-align: center;
    }

    .promo-list, .payment-list {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
    }

    .promo-item, .payment-item {
        flex: 1 1 calc(50% - 20px);
        margin: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 15px;
    }

    .promo-item img, .payment-item img {
        max-width: 100%;
        height: auto;
        border-radius: 5px;
    }

    .no-locals {
        margin-top: 40px;
        font-size: 1.2em;
        color: #555;
    }

   
    /* Estilo para los enlaces de categorías */
    .category-item {
        position: relative;
        overflow: hidden;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .category-item:hover .category-img {
        transform: scale(1.1);
    }

    .category-img {
        transition: transform 0.3s ease;
    }

    .category-item h3 {
        margin-bottom: 10px;
        font-size: 1.2em;
        color: #333;
    }

    .category-item a {
        display: block;
        color: #333;
        text-decoration: none;
        padding: 15px;
    }

    .category-item a:hover {
        background-color: #f0f0f0;
    }


    
</style>

<style>
    /* Estilo para el fondo */
    .background-content {
        position: relative;
        overflow: hidden;
        height: 300px; /* Ajusta según tu diseño */
        background-color: #f8f8f8;
        margin-top: 20px;
    }

    .background-item {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background: url('/img/background-pattern.png') repeat; /* Cambia la imagen por una adecuada */
        animation: drift 60s linear infinite;
    }

    @keyframes drift {
        0% { transform: translateX(0); }
        100% { transform: translateX(-100%); }
    }
</style>




<main>
    


    <section class="categories">
        <h2>Categorías</h2>
        <div class="category-list">
            @foreach ($categorias as $categoria)
                <div class="category-item">
                    <h3>
                        <a href="{{ route('categoria.show', ['id' => $categoria->id]) }}">{{ $categoria->nombre }}</a>
                    </h3>
                    <img src="/img/{{$categoria->image}}" class="category-img" alt="{{ $categoria->nombre }}">
                </div>
            @endforeach
        </div>
    </section>

    <section class="promotions">
        <h2>Encargados del kiosko</h2>
        <div class="promo-list">
            <div class="promo-item">
                <h3>Maria Patiño Vargas</h3>
               
                <img src="/img/persona3.jpg" alt="Promociones en Restaurantes">
            </div>
            <div class="promo-item">
                <h3>Herlan Vaca Pinto</h3>
               
                <img src="/img/persona2.jpg" alt="Medios de Pago">
            </div>
        </div>
    </section>

    <section class="payment-methods">
        <h2>Medios de Pago</h2>
        <div class="payment-list">
            <div class="payment-item">
                
                <img src="/img/efectivo.png" alt="Tarjeta de Crédito">
            </div>
            
        </div>
    </section>



    @if(isset($productos) && $productos->isNotEmpty())
        <section class="search-results">
            <h2>Resultados de búsqueda para "{{ $query }}"</h2>
            <div class="product-list">
                @foreach ($productos as $producto)
                    <div class="product-item">
                        <img src="/img/{{ $producto->image }}" class="product-img">
                        <div class="product-info">
                            <h3>{{ $producto->nombre }}</h3>
                            <p>Precio: Bs.{{ $producto->precio }}</p>
                            <p>{{ $producto->descripcion }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif
</main>
@endsection
