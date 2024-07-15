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
        <div class="product-list row">
        @foreach ($productos as $item)
            <div class="col-3">
                <div class="card">
                    <img src="/img/{{$item->image}}" class="card-img-top">
                    <div class="card-body text-center">
                        <h2>{{$item->nombre}}</h2>
                        <p> Bs {{$item->precio}}</p>
                        <div class="quantity-buttons-container">
                            <button class="quantity-button decrement" data-id="{{ $item->id }}">-</button>
                            <input type="number" class="quantity-input" id="quantity-{{ $item->id }}" value="0" min="0">
                            <button class="quantity-button increment" data-id="{{ $item->id }}">+</button>
                        </div>
                    </div>
                    <div class="card-footer">
                        <form action="{{ route('add') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $item->id }}">
                            <input type="hidden" name="quantity" id="hidden-quantity-{{ $item->id }}" value="0">
                            <button type="submit" class="btn btn-primary w-100">Agregar al carrito</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach   
        </div>
    </section>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.increment').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            const quantityInput = document.getElementById('quantity-' + id);
            const hiddenQuantityInput = document.getElementById('hidden-quantity-' + id);
            let quantity = parseInt(quantityInput.value);
            quantityInput.value = ++quantity;
            hiddenQuantityInput.value = quantity;
        });
    });

    document.querySelectorAll('.decrement').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            const quantityInput = document.getElementById('quantity-' + id);
            const hiddenQuantityInput = document.getElementById('hidden-quantity-' + id);
            let quantity = parseInt(quantityInput.value);
            if (quantity > 0) {
                quantityInput.value = --quantity;
                hiddenQuantityInput.value = quantity;
            }
        });
    });
});
</script>

<style>
.quantity-buttons-container {
    display: inline-flex;
    align-items: center;
    border: 1px solid black;
    border-radius: 5px;
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.quantity-button {
    background-color: white;
    border: none;
    width: 30px;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    font-size: 18px;
}

.quantity-input {
    width: 50px;
    text-align: center;
    border: none;
    outline: none;
    -moz-appearance: textfield;
}

.quantity-input::-webkit-outer-spin-button,
.quantity-input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
</style>

@endsection

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
