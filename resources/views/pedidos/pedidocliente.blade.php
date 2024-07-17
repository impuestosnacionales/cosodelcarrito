@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">TU PEDIDO</div>
                
                <div class="card-body text-center">
                
                    <h1 class="display-3">Pedido #{{ $pedido->num_pedido }}</h1>
                    <p>Fecha: {{ $pedido->fecha }}</p>
                    <p>Estado: {{ $pedido->estado }}</p>

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
                    <p>Total del Pedido: {{ $pedido->detalles->sum('total') }}</p>

                    <a href="{{ route('principal', $pedido->id) }}" class="btn btn-success">Volver a pedir</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .card {
        margin-top: 50px;
    }
    .display-3 {
        font-size: 4rem;
        margin-bottom: 20px;
    }
</style>
@endsection

