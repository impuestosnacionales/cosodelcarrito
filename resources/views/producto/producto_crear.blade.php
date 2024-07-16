@extends('layouts.app')

@section('content')
<div class="container-fluid">
        <main class="col ps-md-2 pt-2">
            <div class="row">
                <div class="col-12">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h2 class="card-title">Registrar Producto</h2>
                                    </div>
                                    <div class="card-body">
                                        <hr>
                                        <form action="{{route('producto.store')}}" method="POST">
                    @csrf
                    <input type="hidden" name="_token" value="{{csrf_token()}}"> 
                    <br>
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control"  name="nombre"> 
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descripcion</label>
                        <input type="text" class="form-control"  name="descripcion"> 
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Precio</label>
                        <input type="number" class="form-control"  name="precio">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Stock</label>
                        <input type="number" class="form-control"  name="stock">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Imagen</label>
                        <input type="text" class="form-control"  name="image">
                    </div>
                    <div class="card">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-3 col-mb-3 col-sm-3">
                            <label>Categoria</label>
                            <select class="form-select" name="categoria_id" id="pid_articulo" aria-label="Default select example">
                            @foreach($categorias as $cat)
                                <option value="{{$cat->id}}">{{$cat->nombre}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div>
                            <br>
                        </div>
                        </div>
                    </div>
  </div>
  <button type="submit" class="btn btn-primary form-control">Añadir</button>
</form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBogGz5S5pQvF9JRvh4l5j2IGbF5Ik9kKyZ6I1pZ8RJfK4tw" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-1CmrxMRARb6aLqgBO7yyAxTOQE2AKb9GfXnK0CZp3FYZy4zF6U9c7XGc8KIWkn4t" crossorigin="anonymous"></script>

@endsection
