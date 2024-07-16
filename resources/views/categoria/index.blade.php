@extends('layouts.app')

@section('content')
<h1 class="mb-4">Lista de Categorías</h1>
<a href="{{route('categoria.create')}}" class="btn btn-primary mb-3">Añadir productos</a>
<table class="table table-striped table-bordered table-hover">
    <thead class="bg-primary text-white">
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Código</th>
            <th>Imagen</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categoria as $categoria)
        <tr>
            <td>{{ $categoria->nombre }}</td>
            <td>{{ $categoria->descripcion }}</td>
            <td>{{ $categoria->codigo }}</td>
            <td>
                <div style="width: 80px; height: 80px; border-radius: 50%; overflow: hidden; margin: auto;">
                    <img src="/img/{{$categoria->image}}" style="width: 100%; height: auto;">
                </div>
            </td>
            <td>
                <form action="{{route('categoria.destroy', $categoria->id)}}" method="POST" style="display:inline;">
                    @csrf
                    {{method_field('DELETE')}}
                    <button class="btn btn-danger" type="submit" value="Eliminar" onclick="return confirm('¿Eliminar Categoria?')">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
