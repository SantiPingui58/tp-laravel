<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalles del Producto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Detalles del Producto</h1>

        <div class="card mt-3">
            <div class="card-body">
                <h2 class="card-title">{{ $item->nombre }}</h2>
                <p class="card-text"><strong>Descripción:</strong> {{ $item->descripcion }}</p>
                <p class="card-text"><strong>Precio:</strong> ${{ $item->precio }}</p>
                <p class="card-text"><strong>Descuento:</strong> {{ $item->descuento }}%</p>
                <p class="card-text"><strong>Stock:</strong> {{ $item->stock }}</p>
                <img src="{{ $item->imagen }}" alt="Imagen de {{ $item->nombre }}" class="img-fluid">
                <a href="#" class="btn btn-primary mt-3">Agregar al Carrito de Compras</a>
                <a href="/store" class="btn btn-secondary mt-3">Volver a la Tienda</a>
            </div>
        </div>
    </div>
</body>
</html>
