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
                    </thead>
                    <tbody>
                        @foreach (Cart::content() as $item)
                        <tr class="aling-middle">
                            <td><img src="/img/{{$item->options->image}}" width="50" ></td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->qty}}</td>
                            <td>{{number_format($item->price)}}</td>
                            <td>{{number_format($item->qty * $item->price)}}</td>
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
                            <td class="text-end">total</td>
                            <td class="text-end">{{Cart::subtotal()}}</td>
                        </tr>
                    </tbody>
                </table>
                <a href="{{route('clear')}}" class="text-center">Vaciar carrito</a>
                @else
                <a href="/" class="text-center">Agrega un producto</a>
                @endif
            </div>
        </div>       
    </div>
</div>

@endsection
