@extends('layouts.app')

@section('content')
<a href="{{route('producto.create')}}" class="btn btn-primary">Añadir productos</a>
<table class="table table-striped table-bordered table-hover">
    <thead class="bg-primary text-white">
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Categoría</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($productos as $producto)
        <tr>
            <td>{{ $producto->nombre }}</td>
            <td>{{ $producto->descripcion }}</td>
            <td>{{ $producto->precio }}</td>
            <td>{{ $producto->stock }}</td>
            <td>{{ $producto->categoria->nombre }}</td>
            <td>
            <form action="{{route('producto.destroy', $producto->id)}}" method="POST" style="display:inline;">
                @csrf
                {{method_field('DELETE')}}
                <button class="btn btn-danger" type="submit" value="Eliminar" onclick="return EliminarProductos('Eliminar Producto')">
                <i class="fa-solid fa-delete-left"></i>
                </button>
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

