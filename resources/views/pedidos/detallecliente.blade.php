@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Detalle del Pedido #{{ $pedido->num_pedido }}</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pedido->detalles as $detalle)
            <tr>
                <td>{{ $detalle->producto->nombre }}</td>
                <td>{{ $detalle->cantidad }}</td>
                <td>{{ $detalle->producto->precio }}</td>
                <td>{{ $detalle->total }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('pedido') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
