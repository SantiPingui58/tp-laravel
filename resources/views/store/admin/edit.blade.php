<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Producto</h1>
        <form method="POST" action="/store/admin/product/{{ $item->id }}/update" enctype="multipart/form-data">
                    @csrf
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $item->name }}" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required>{{ $item->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" class="form-control" id="precio" name="precio" value="{{ $item->price }}" required>
            </div>
            <div class="mb-3">
                <label for="descuento" class="form-label">Descuento</label>
                <input type="number" class="form-control" id="descuento" name="descuento" value="{{ $item->disccount }}" required>
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" class="form-control" id="stock" name="stock" value="{{ $item->stock }}" required>
            </div>

            @if ($item->image)
            <div class="mb-3">
      <img src="{{ asset('storage/' . $item->image->src) }}" alt="Imagen de {{ $item->nombre }}" class="img-thumbnail" width="100">
            </div>
        @endif
        <div class="mb-3">
            <label for="imagen" class="form-label">Seleccionar Nueva Imagen</label>
            <input type="file" class="form-control" id="imagen" name="imagen">
        </div>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
</body>
</html>
