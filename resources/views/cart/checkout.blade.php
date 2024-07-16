@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                        <th>ESTADO</th>
                    </thead>
                    <tbody>
                        @foreach (Cart::content() as $item)
                        <tr class="align-middle">
                            <td><img src="/img/{{$item->options->image}}" width="50"></td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->qty}}</td>
                            <td>{{number_format($item->price)}}</td>
                            <td>{{number_format($item->qty * $item->price)}}</td>
                            <td>
                                @php
                                    $product = \App\Models\Producto::find($item->id);
                                @endphp
                                @if ($item->qty > $product->stock)
                                    <span class="text-danger">Cantidad excedida</span>
                                @else
                                    <span class="text-success">Correcto</span>
                                @endif
                            </td>
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
                            <td colspan="4" class="text-end">Total</td>
                            <td class="text-end">{{Cart::subtotal()}}</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <form action="{{ route('pedido.process') }}" method="post" id="pedidoForm">
                    @csrf
                    <button type="button" class="btn btn-primary" id="submitButton" onclick="Pedidoenviar()">Hacer Pedido</button>
                </form><br>
                <form action="{{route('principal')}}">
                    @csrf
                    <button type="submit" class="btn btn-primary">Agrega un producto</button>
                </form>
                <a href="{{route('clear')}}" class="text-center">Vaciar carrito</a>
                @else
                <a href="{{route('principal')}}" class="text-center">Agrega un producto</a>
                @endif
            </div>
        </div>       
    </div>
</div>
<script>

function Pedidoenviar() {
    Swal.fire({
        icon: "success",
        title: "¡Pedido Realizado con Éxito!",
        text: "Observa tu código y espera tu turno",
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('pedidoForm').submit();
        }
    });
}




     function carterror(){
        Swal.fire({
  icon: "error",
  title: "¡Ocurrió un problema!",
  text: "Uno o varios productos tienen una cantidad excedida",
});
    }
document.addEventListener('DOMContentLoaded', function() {
    let hasExceeded = false;
    @foreach (Cart::content() as $item)
        @php
            $product = \App\Models\Producto::find($item->id);
        @endphp
        if ({{ $item->qty }} > {{ $product->stock }}) {
            hasExceeded = true;
        }
    @endforeach

    if (hasExceeded) {
        carterror();
        document.getElementById('submitButton').disabled = true;
    }
});
</script>
@endsection



