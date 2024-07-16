<!doctype html>
<html lang="en">
<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body>
<div class="container-fluid">
        <main class="col ps-md-2 pt-2">
            <div class="row">
                <div class="col-12">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h2 class="card-title">Registrar Categoria</h2>
                                    </div>
                                    <div class="card-body">
                                        <hr>
                                        <form action="{{route('categoria.store')}}" method="POST">
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
                        <label class="form-label">Codigo</label>
                        <input type="number" class="form-control"  name="codigo">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Imagen</label>
                        <input type="text" class="form-control"  name="image">
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

</body>
</html>

