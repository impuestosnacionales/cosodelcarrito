@extends('admin.layouts2.master')

@section('content')
<style>
    .custom-container {
        background-color: #ffffff; /* Fondo blanco para el contenedor */
        padding: 30px;
        border-radius: 25px; /* Bordes redondeados */
        box-shadow: 0 4px 8px rgba(0, 0, 1, 1); /* Sombra para el contenedor */
    }
    .custom-input {
        border: 0;
        border-bottom: 2px solid #ccc;
        border-radius: 0;
        padding-left: 0;
    }
    .custom-input:focus {
        border-bottom: 2px solid #007bff;
        box-shadow: none;
    }
    .custom-header {
        background-color: #ffffff;
        color: #000000;
        border-bottom: 2px solid #ccc;
    }
</style>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="custom-container">
                <div class="card custom-card">
                    <div class="card-header custom-header">
                        <h2 class="card-title mb-0">Registrar Producto</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{route('producto.store')}}" method="POST">
                            @csrf
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            
                            <div class="mb-3">
                                <label class="form-label">Nombre <i class="fa-solid fa-tag"></i></label>
                                <input type="text" class="form-control custom-input" name="nombre">
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Descripción <i class="fa-solid fa-file-alt"></i></label>
                                <input type="text" class="form-control custom-input" name="descripcion">
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Precio <i class="fa-solid fa-dollar-sign"></i></label>
                                <input type="number" class="form-control custom-input" name="precio">
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Stock <i class="fa-solid fa-box"></i></label>
                                <input type="number" class="form-control custom-input" name="stock">
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Imagen <i class="fa-solid fa-image"></i></label>
                                <input type="text" class="form-control custom-input" name="image">
                            </div>
                            
                            <div class="mb-3">
                                <label>Categoria <i class="fa-solid fa-list"></i></label>
                                <select class="form-select custom-input" name="categoria_id" id="pid_articulo" aria-label="Default select example">
                                    @foreach($categorias as $cat)
                                        <option value="{{$cat->id}}">{{$cat->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <button type="submit" class="btn btn-primary w-100">Añadir <i class="fa-solid fa-plus-circle"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBogGz5S5pQvF9JRvh4l5j2IGbF5Ik9kKyZ6I1pZ8RJfK4tw" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-1CmrxMRARb6aLqgBO7yyAxTOQE2AKb9GfXnK0CZp3FYZy4zF6U9c7XGc8KIWkn4t" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

@endsection
