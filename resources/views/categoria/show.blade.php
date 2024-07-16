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
                        @if ($item->stock > 0)
                        <div class="quantity-buttons-container">
                            <button class="quantity-button decrement" data-id="{{ $item->id }}">-</button>
                            <input type="number" class="quantity-input" id="quantity-{{ $item->id }}" value="0" min="0" max="{{ $item->stock }}" readonly>
                            <button class="quantity-button increment" data-id="{{ $item->id }}">+</button>
                        </div>
                        @else
                        <p style="color: red;">AGOTADO</p>
                        @endif
                    </div>
                    <div class="card-footer">
                        @if ($item->stock > 0)
                        <form action="{{ route('add') }}" method="post" class="add-to-cart-form">
                            @csrf
                            <input type="hidden" name="id" value="{{ $item->id }}">
                            <input type="hidden" name="quantity" id="hidden-quantity-{{ $item->id }}" value="0">
                            <button type="submit" class="btn btn-primary w-100">Agregar al carrito</button>
                        </form>
                        @else
                        <button class="btn btn-secondary w-100" disabled>Agotado</button>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach   
        </div>
    </section>
</main>

<script>
//Sweetalert Alertas//
function errorstock(){
    Swal.fire({
    title: "¡Ocurrió un problema!",
    text: "La cantidad no puede ser 0",
    icon: "error"
    });
}

document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.increment').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            const quantityInput = document.getElementById('quantity-' + id);
            const hiddenQuantityInput = document.getElementById('hidden-quantity-' + id);
            let quantity = parseInt(quantityInput.value);
            const maxQuantity = parseInt(quantityInput.getAttribute('max'));
            if (quantity < maxQuantity) {
                quantityInput.value = ++quantity;
                hiddenQuantityInput.value = quantity;
            }
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

    document.querySelectorAll('.add-to-cart-form').forEach(form => {
        form.addEventListener('submit', function(event) {
            const id = this.querySelector('input[name="id"]').value;
            const quantity = document.getElementById('quantity-' + id).value;
            if (quantity == 0) {
                event.preventDefault();
                errorstock();
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
