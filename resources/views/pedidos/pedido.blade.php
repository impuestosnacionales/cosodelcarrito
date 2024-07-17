

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <h2>PEDIDO REALIZADO EXITOSAMENTE</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nombre del Producto</th>
                            <th>Cantidad</th>
                            <th>Precio Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cartItems as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{$item->qty}}</td>
                                <td>{{ number_format($item->qty * $item->price) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>
@endsection
