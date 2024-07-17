@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Lista de Pedidos</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($pedidos->count() > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Número de Pedido</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->num_pedido }}</td>
                    <td>{{ $pedido->fecha }}</td>
                    <td>{{ $pedido->estado }}</td>
                    <td>
                        <a href="{{ route('pedido.show', $pedido->id) }}" class="btn btn-primary">Ver Detalle</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay pedidos registrados.</p>
    @endif
</div>
@endsection
