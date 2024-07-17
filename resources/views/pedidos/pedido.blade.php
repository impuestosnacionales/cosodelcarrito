// resources/views/orders/index.blade.php
@extends('admin.layouts2.master')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header text-black">
            <h1 class="mb-0">Lista de Pedidos</h1>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($pedidos->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead class="text-gray">
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
                </div>
            @else
                <p>No hay pedidos registrados.</p>
            @endif
        </div>
    </div>
</div>
@endsection
