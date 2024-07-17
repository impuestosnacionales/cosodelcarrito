@extends('layouts.app')

@section('content')
<main>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <section class="products-by-category">
        <h2>Productos en la categoría: {{ $categoria->nombre }}</h2>
        <div class="product-list row">
            @foreach ($productos as $item)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="/img/{{$item->image}}" class="card-img-top" alt="{{$item->nombre}}">
                        <div class="card-body">
                            <h5 class="card-title">{{$item->nombre}}</h5>
                            <p class="card-text">Bs {{$item->precio}}</p>
                            @if ($item->stock > 0)
                                <div class="quantity-buttons-container">
                                    <button class="quantity-button decrement" data-id="{{ $item->id }}">-</button>
                                    <input type="number" class="quantity-input" id="quantity-{{ $item->id }}" value="0" min="0" max="{{ $item->stock }}" readonly>
                                    <button class="quantity-button increment" data-id="{{ $item->id }}">+</button>
                                    <form action="{{ route('add') }}" method="post" class="add-to-cart-form">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <input type="hidden" name="quantity" id="hidden-quantity-{{ $item->id }}" value="0">
                                        <button type="submit" class="add-to-cart-button" data-id="{{ $item->id }}">
                                            <i class="fas fa-shopping-cart"></i>
                                        </button>
                                    </form>
                                </div>
                            @else
                                <p class="text-danger">AGOTADO</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach   
        </div>
    </section>
</main>

<script>
// Sweetalert Alerts
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
.search-bar {
    display: flex;
    justify-content: center;
    margin: 20px 0;
}

.search-bar input {
    width: 60%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.search-bar button {
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    margin-left: 10px;
}

.products-by-category {
    padding: 20px;
}

.card {
    border: 1px solid #ccc;
    border-radius: 10px;
    overflow: hidden;
}

.card-img-top {
    height: 350px;
    object-fit: cover;
}

.card-title {
    font-size: 1.25rem;
    margin-bottom: 10px;
}

.card-text {
    font-size: 1rem;
    color: #666;
}

.quantity-buttons-container {
    display: inline-flex;
    align-items: center;
    border: 1px solid #ccc;
    border-radius: 5px;
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
}

.quantity-input::-webkit-outer-spin-button,
.quantity-input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

.add-to-cart-button {
    background-color: #007bff;
    border: none;
    color: white;
    padding: 5px 10px;
    border-radius: 5px;
    margin-left: 10px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
}

.add-to-cart-button i {
    font-size: 18px;
}

.add-to-cart-button:hover {
    background-color: #0056b3;
}

.btn-secondary {
    background-color: #6c757d;
    border-color: #6c757d;
}

.btn-secondary:hover {
    background-color: #5a6268;
    border-color: #545b62;
}
</style>

@endsection

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
