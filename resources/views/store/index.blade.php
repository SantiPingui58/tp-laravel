<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tienda</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        .product-card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
        }
        .product-card img {
            max-width: 100%;
            height: auto;
        }
        .product-card .btn {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Tienda</h1>


        <form action="/store" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Buscar por nombre" name="nombre">
                <button type="submit" class="btn btn-outline-primary">Buscar</button>
            </div>
        </form>

        <div class="row">
            @if(count($items)>0)
            @foreach ($items as $item)
            <div class="col-md-4">
                <div class="product-card">
                    <img src="{{ $item->imagen }}" alt="Imagen de {{ $item->nombre }}" class="img-thumbnail">
                    <h2>{{ $item->nombre }}</h2>
                    <p>{{ $item->descripcion }}</p>
                    <p><strong>Precio:</strong> ${{ $item->precio }}</p>
                    <p><strong>Descuento:</strong> {{ $item->descuento }}%</p>
                    <p><strong>Stock:</strong> {{ $item->stock }}</p>
                    <a href="/store/product/{{ $item->id }}" class="btn btn-primary">Ver Detalles</a>
                </div>
            </div>
            @endforeach
            @else
            <p>No hay items en la tienda en este momento.</p>
            @endif
        </div>
    </div>
</body>
</html>
