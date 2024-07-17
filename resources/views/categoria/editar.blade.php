@extends('admin.layouts2.master')

@section('content')
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categoria</title>
    <!-- Bootstrap CSS v5.3.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome CSS v6.0.0 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #E8DAEF; /* Fondo lila */
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
        .form-container {
            max-width: 600px; /* Ancho máximo del formulario */
            margin: auto; /* Centrar en la página */
            background-color: #fff; /* Fondo blanco */
            padding: 30px; /* Espaciado interno */
            border-radius: 10px; /* Bordes redondeados */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra suave */
        }
        .form-label {
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
        /* Estilos para los botones */
        .btn {
            border-radius: 20px; /* Bordes más redondeados */
        }
        /* Estilos para el contenedor de formulario */
        .well {
            background-color: #fff; /* Fondo blanco */
            padding: 30px; /* Espaciado interno */
            border-radius: 10px; /* Bordes redondeados */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra suave */
            margin-top: 50px; /* Espacio arriba */
        }
        /* Additional styles for icons */
        .bigicon {
            font-size: 24px;
        }
    </style>
</head>

<body>
    <div class="overlay"></div>
    <div class="container">
        <div class="form-container">
            <h1>Editar Categoria</h1>
            <form action="{{ route('categoria.update', $categoria->id) }}" method="POST">
                @csrf 
                {{ method_field('PUT') }}

                <div class="mb-3">
                    <label for="nombre" class="form-label"><i class="fas fa-tag"></i> Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $categoria->nombre }}" required>
                </div>

                <div class="mb-3">
                    <label for="uso" class="form-label"><i class="fas fa-info-circle"></i> Uso:</label>
                    <input type="text" class="form-control" id="uso" name="descripcion" value="{{ $categoria->descripcion }}" required>
                </div>

                <div class="mb-3">
                    <label for="codigo" class="form-label"><i class="fas fa-barcode"></i> Código:</label>
                    <input type="number" class="form-control" id="codigo" name="codigo" value="{{ $categoria->codigo }}" required>
                </div>
        

               
                <div class="mb-3 d-flex justify-content-between">
                <a href="{{ route('categoria') }}" class="btn btn-secondary"><i class="fas fa-times-circle mr-1"></i>Cancelar</a>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-1"></i>Guardar</button>
            </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS y dependencias -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
@endsection
