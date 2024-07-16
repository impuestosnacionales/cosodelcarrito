@extends('layouts.app')

@section('content')
<a href="{{route('categoria.create')}}" class="btn btn-primary">Añadir productos</a>
<table class="table table-striped table-bordered table-hover">
    <thead class="bg-primary text-white">
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Codigo</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($categoria as $categoria)
        <tr>
            <td>{{ $categoria->nombre }}</td>
            <td>{{ $categoria->descripcion }}</td>
            <td>{{ $categoria->codigo }}</td>
            <td>
            <form action="{{route('categoria.destroy', $categoria->id)}}" method="POST" style="display:inline;">
                @csrf
                {{method_field('DELETE')}}
                <button class="btn btn-danger" type="submit" value="Eliminar" onclick="return EliminarCategoria('Eliminar Categoria')">
                <i class="fa-solid fa-delete-left"></i>
                </button>
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection