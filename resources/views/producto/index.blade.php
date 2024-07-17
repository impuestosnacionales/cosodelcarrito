@extends('admin.layouts2.master')


@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header text-black">
            <h1 class="mb-0">Lista de Productos</h1>
        </div>
        <div class="card-body">
            <a href="{{route('producto.create')}}" class="btn btn-primary mb-3">Añadir productos</a>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead class="text-gray">
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Categoría</th>
                            <th>Imagen</th>
                            <th>Acciones</th>
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
                                <div style="width: 80px; height: 80px; border-radius: 50%; overflow: hidden; margin: auto;">
                                    <img src="/img/{{$producto->image}}" style="width: 100%; height: auto;">
                                </div>
                            </td>
                            <td>
                                <form action="{{route('producto.destroy', $producto->id)}}" method="POST" style="display:inline;">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-danger" type="submit" value="Eliminar" onclick="return confirm('¿Eliminar Producto?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                <a href="{{ route('producto.edit', $producto->id) }}" class="btn btn-info btn-sm btn-actions">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection


