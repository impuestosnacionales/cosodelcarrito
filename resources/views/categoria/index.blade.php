@extends('admin.layouts2.master')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header text-black">
            <h1 class="mb-0">Lista de Categorías</h1>
        </div>
        <div class="card-body">
            <a href="{{ route('categoria.create') }}" class="btn btn-primary mb-3">Añadir categorias</a>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead class="text-gray">
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
                                <form action="{{ route('categoria.destroy', $categoria->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-danger" type="submit" value="Eliminar" onclick="return confirm('¿Eliminar Categoria?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                <a href="{{ route('categoria.edit', $categoria->id) }}" class="btn btn-info btn-sm btn-actions">
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
