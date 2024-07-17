@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-danger text-white">
                    <h4 class="mb-0">Carrito de Compras</h4>
                </div>
                <div class="card-body">
                    @if (Cart::count())
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Imagen</th>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Precio Unitario</th>
                                    <th>Importe</th>
                                    <th>Estado</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Cart::content() as $item)
                                    <tr class="align-middle">
                                        <td><img src="/img/{{$item->options->image}}" width="50" class="img-thumbnail"></td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->qty}}</td>
                                        <td>{{number_format($item->price, 2)}}</td>
                                        <td>{{number_format($item->qty * $item->price, 2)}}</td>
                                        <td>
                                            @php
                                                $product = \App\Models\Producto::find($item->id);
                                            @endphp
                                            @if ($item->qty > $product->stock)
                                                <span class="badge bg-danger">Cantidad excedida</span>
                                            @else
                                                <span class="badge bg-success">Correcto</span>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{route('removeitem')}}" method="post" class="d-inline">
                                                @csrf
                                                <input type="hidden" name="rowId" value="{{$item->rowId}}">
                                                <div class="input-group input-group-sm">
                                                    <input type="number" name="remove_qty" value="1" min="1" max="{{$item->qty}}" class="form-control">
                                                    <button type="submit" name="btn" class="btn btn-danger">x</button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr class="fw-bold">
                                    <td colspan="4" class="text-end">Total</td>
                                    <td class="text-end">{{Cart::subtotal()}}</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <form action="{{ route('pedido.process') }}" method="post" id="pedidoForm" class="d-flex justify-content-between">
                            @csrf
                            <button type="button" class="btn btn-success" id="submitButton" onclick="Pedidoenviar()">
                                <i class="fas fa-check-circle"></i> Hacer Pedido
                            </button>
                        </form><br>

                        <div class="d-flex justify-content-between">
                            <form action="{{route('principal')}}">
                                @csrf
                                <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Agregar un producto</button>
                            </form>
                            <a href="{{route('clear')}}" class="btn btn-secondary"><i class="fas fa-trash-alt"></i> Vaciar carrito</a>
                        </div>
                    @else
                        <div class="alert alert-warning text-center" role="alert">
                            <i class="fas fa-info-circle"></i> No hay productos en el carrito.
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="{{route('principal')}}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Agregar un producto</a>
                        </div>
                    @endif
                </div>
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

function carterror() {
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

<style>
    .cart {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    .cart-body {
        padding: 20px;
    }

    .btn-primary, .btn-success, .btn-warning {
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .btn-primary i, .btn-success i, .btn-warning i {
        margin-right: 5px;
    }

    .table-hover tbody tr:hover {
        background-color: #f1f1f1;
    }

    .table thead th {
        background-color: #f8f9fa;
        border-bottom: 2px solid #dee2e6;
    }
</style>
@endsection

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
