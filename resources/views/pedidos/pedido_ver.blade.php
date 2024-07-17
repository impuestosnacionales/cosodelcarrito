@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
     
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <fieldset>
                    <legend class="text-center header-secondary">Detalle del Pedido #{{ $pedido->num_pedido }}</legend>
                    
                    @foreach ($pedido->detalles as $detalle)
                    
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Producto:</label>
                        <div>
                            <strong>{{ $detalle->producto->nombre }}</strong>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="cantidad" class="form-label">Cantidad:</label>
                        <div>
                            <strong>{{ $detalle->cantidad }}</strong>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio:</label>
                        <div>
                            <strong>{{ $detalle->producto->precio }}</strong>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="total" class="form-label">Total:</label>
                        <div>
                            <strong>{{ $detalle->total }}</strong>
                        </div>
                    </div>
                    
                    @endforeach

                    <div class="btn-group">
                        <a class="btn btn-primary" href="{{ route('pedido') }}" role="button"><i class="fas fa-arrow-left"></i> Volver</a>
                        
                      
                        
                        <button class="btn btn-success" onclick="printCard()"><i class="fas fa-print"></i> Imprimir</button>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS y dependencias -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

<script>
    function printCard() {
        window.print();
    }
</script>

<style>
    body {
        background-color: #f0f4f8; /* Fondo gris claro */
        font-family: 'Roboto', sans-serif; /* Fuente moderna */
        color: #333; /* Texto oscuro */
    }
    .container {
        max-width: 700px; /* Ancho máximo del contenedor */
        margin-top: 50px;
    }
    .logo {
        text-align: left; /* Alinear el logo a la izquierda */
        margin-bottom: 20px;
    }
    .card {
        background-color: #ffffff; /* Fondo de tarjeta blanco */
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 30px;
        margin-bottom: 30px; /* Espacio inferior */
    }
    .header {
        color: #333; /* Color del título */
        font-size: 28px;
        text-align: center;
        margin-bottom: 20px;
        border-bottom: 1px solid #e0e0e0; /* Línea inferior */
        padding-bottom: 10px;
    }
    .form-label {
        color: #555; /* Color del texto de etiquetas */
        font-weight: 500;
    }
    .btn-group {
        display: flex;
        justify-content: space-between;
        margin-top: 30px; /* Añadir margen arriba para separarlo del contenido anterior */
    }
    .btn-group .btn {
        flex: 1;
        margin: 0 5px; /* Aumentar el margen entre los botones */
        padding: 10px 15px; /* Ajustar el padding para hacer los botones más grandes */
    }
    .btn-primary {
        background-color: #4CAF50;
        border-color: #4CAF50;
    }
    .btn-danger {
        background-color: #f44336;
        border-color: #f44336;
    }
    .btn-success {
        background-color: #008CBA;
        border-color: #008CBA;
    }
    .btn-primary:hover {
        background-color: #45a049;
        border-color: #45a049;
    }
    .btn-danger:hover {
        background-color: #e53935;
        border-color: #e53935;
    }
    .btn-success:hover {
        background-color: #007bb5;
        border-color: #007bb5;
    }
    
    /* Estilos específicos para impresión */
    @media print {
        .btn-group {
            display: none; /* Ocultar los botones al imprimir */
        }
        body {
            background-color: #fff; /* Fondo blanco para impresión */
            color: #000; /* Texto negro para impresión */
        }
        .card {
            box-shadow: none; /* Quitar la sombra en la impresión */
            border: none; /* Quitar el borde en la impresión */
        }
    }
</style>
@endsection

