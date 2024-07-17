@extends('admin.layouts2.master')

@section('content')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #F0F8FF; /* Celeste muy claro */
            color: #333; /* Color de texto principal */
            font-family: Arial, sans-serif; /* Fuente general */
            padding-top: 50px; /* Espacio arriba */
        }
        .container {
            max-width: 600px; /* Ancho máximo del formulario */
            margin: auto; /* Centrar en la página */
            background-color: #fff; /* Fondo blanco */
            padding: 30px; /* Espaciado interno */
            border-radius: 10px; /* Bordes redondeados */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra suave */
        }
        .form-group label {
            font-weight: bold; /* Texto en negrita */
        }
        .btn-primary {
            background-color: #007BFF; /* Color de fondo del botón */
            border-color: #007BFF; /* Color del borde del botón */
        }
        .btn-primary:hover {
            background-color: #0056b3; /* Color de fondo al pasar el mouse */
            border-color: #0056b3; /* Color del borde al pasar el mouse */
        }
        /* Estilos para los input */
        .form-control {
            border-color: #ccc; /* Color del borde de los input */
            box-shadow: none; /* Quita la sombra */
        }
        .form-control:focus {
            border-color: #007BFF; /* Color del borde al enfocar */
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Sombra al enfocar */
        }
        /* Estilo para los botones */
        .btn {
            border-radius: 20px; /* Bordes más redondeados */
        }
        /* Estilos para los enlaces */
        .btn-secondary {
            color: #fff; /* Color de texto */
            background-color: #6c757d; /* Color de fondo */
            border-color: #6c757d; /* Color del borde */
        }
        .btn-secondary:hover {
            background-color: #5a6268; /* Color de fondo al pasar el mouse */
            border-color: #545b62; /* Color del borde al pasar el mouse */
        }
    </style>
</head>
<body>
    <div class="overlay"></div>
    <div class="container">
        <div class="form-container">
            <h1>Editar Productos</h1>
            <form action="{{ route('producto.update', $producto->id) }}" method="POST">
                @csrf 
                {{ method_field('PUT') }}

                <div class="mb-3">
                    <label for="nombre" class="form-label"><i class="fas fa-cube"></i> Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $producto->nombre }}" >
                </div>
                <div class="mb-3">
                    <label for="stock" class="form-label"><i class="fas fa-boxes"></i>  Descripcion:</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ $producto->descripcion }}" >
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label"><i class="fas fa-file-alt"></i> Precio:</label>
                    <input type="number" class="form-control" id="precio" name="precio" value="{{ $producto->precio }}" required>
                </div>

                <div class="mb-3">
                    <label for="precio" class="form-label"><i class="fas fa-dollar-sign"></i> Stock:</label>
                    <input type="number" class="form-control" id="stock" name="stock" value="{{ $producto->stock }}" required>
                </div>



                <div class="mb-3">
                    <label for="categoria_id" class="form-label"><i class="fas fa-tags"></i> Categoría:</label>
                    <div class="input-group">
                        <span class="input-group-text"></span>
                        <select class="form-select" id="categoria_id" name="categoria_id" required>
                            @foreach($categoria as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-3 d-flex justify-content-between">
                <a href="{{ route('producto') }}" class="btn btn-secondary"><i class="fas fa-times-circle mr-1"></i>Cancelar</a>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-1"></i>Guardar</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS y dependencias -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection
