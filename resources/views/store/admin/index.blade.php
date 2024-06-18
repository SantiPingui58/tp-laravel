@include('store.admin.partials.header');

@if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif
<div class="container">
    <h1 class="mt-5">Productos</h1>
    @if(count($items) > 0)
        <table class="table table-striped mt-3">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Descuento</th>
                <th>Stock</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nombre }}</td>
                    <td>{{ $item->descripcion }}</td>
                    <td>{{ $item->precio }}</td>
                    <td>{{ $item->descuento }}</td>
                    <td>{{ $item->stock }}</td>
                    <td>
                        @if ($item->image)
                        <img src="{{ asset('storage/' . $item->image->src) }}" alt="Imagen de {{ $item->nombre }}" class="img-thumbnail" width="100">
                        @else
                            <p>-</p>
                        @endif
                    </td>
                    <td>
                        <a href="/store/admin/product/{{ $item->id }}/edit" class="btn btn-primary btn-sm">Editar</a>
                        <form action="/store/admin/product/{{ $item->id }}/delete" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-warning" role="alert">
            No hay items cargados.
        </div>
    @endif
</div>
</body>
</html>
