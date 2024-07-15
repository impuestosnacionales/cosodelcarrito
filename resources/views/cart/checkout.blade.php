@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="cart">
            <div class="cart-body">
                @if (Cart::count())
                <table class="table table-striped">
                    <thead>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>CANTIDAD</th>
                        <th>PRECIO UNITARIO</th>
                        <th>IMPORTE</th>
                        <th>ACCIÓN</th>
                    </thead>
                    <tbody>
                        @foreach (Cart::content() as $item)
                        <tr class="align-middle">
                            <td><img src="/img/{{$item->options->image}}" width="50"></td>
                            <td>{{$item->name}}</td>
                            <td>
                                <div class="quantity-buttons-container">
                                    <button class="quantity-button decrement" data-id="{{ $item->rowId }}" data-price="{{ $item->price }}">-</button>
                                    <input type="number" class="quantity-input" id="quantity-{{ $item->rowId }}" value="{{$item->qty}}" min="0">
                                    <button class="quantity-button increment" data-id="{{ $item->rowId }}" data-price="{{ $item->price }}">+</button>
                                </div>
                            </td>
                            <td>{{number_format($item->price, 2)}}</td>
                            <td id="total-{{ $item->rowId }}">{{number_format($item->qty * $item->price, 2)}}</td>
                            <td>
                                <form action="{{route('removeitem')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="rowId" value="{{$item->rowId}}">
                                    <input type="submit" name="btn" class="btn btn-danger btn-sm" value="x">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        <tr class="fw-bolder">
                            <td colspan="3"></td>
                            <td class="text-end">Total</td>
                            <td class="text-end" id="cart-subtotal">{{ Cart::subtotal(2, '.', '') }}</td>
                        </tr>
                    </tbody>
                </table>
                <form action="{{ route('pedido.process') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary">Hacer Pedido</button>
                </form>
                <a href="{{route('clear')}}" class="text-center">Vaciar carrito</a>
                @else
                <a href="/" class="text-center">Agrega un producto</a>
                @endif
            </div>
        </div>       
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const updateCart = async (rowId, qty) => {
        const response = await fetch(`{{ route('update.quantity') }}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ rowId, qty })
        });
        const data = await response.json();
        document.getElementById(`total-${rowId}`).textContent = data.itemTotal;
        document.getElementById('cart-subtotal').textContent = data.cartSubtotal;
    };

    document.querySelectorAll('.increment').forEach(button => {
        button.addEventListener('click', function() {
            const rowId = this.getAttribute('data-id');
            const quantityInput = document.getElementById('quantity-' + rowId);
            let quantity = parseInt(quantityInput.value);
            quantityInput.value = ++quantity;
            updateCart(rowId, quantity);
        });
    });

    document.querySelectorAll('.decrement').forEach(button => {
        button.addEventListener('click', function() {
            const rowId = this.getAttribute('data-id');
            const quantityInput = document.getElementById('quantity-' + rowId);
            let quantity = parseInt(quantityInput.value);
            if (quantity > 0) {
                quantityInput.value = --quantity;
                updateCart(rowId, quantity);
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
