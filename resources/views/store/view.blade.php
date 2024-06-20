@include('store.partials.header');
    <div class="container">
        <h1 class="mt-5">Detalles del Producto</h1>

        <div class="card mt-3">
            <div class="card-body">
                <h2 class="card-title">{{ $item->nombre }}</h2>
                <p class="card-text"><strong>Descripción:</strong> {{ $item->description }}</p>
                <p class="card-text"><strong>Precio:</strong> ${{ $item->price }}</p>
                <p class="card-text"><strong>Descuento:</strong> {{ $item->disccount }}%</p>
                <p class="card-text"><strong>Stock:</strong> {{ $item->stock }}</p>
                @if ($item->image)
                        <img src="{{ asset('storage/' . $item->image->src) }}" alt="Imagen de {{ $item->name }}" class="img-thumbnail" width="100">
                        @else
                            <p>-</p>
                        @endif
              @if (session('cart') && in_array($item->id, session('cart')))
                            <a href="/store/cart/remove/{{ $item->id }}" class="btn btn-danger mt-3">Quitar del Carrito</a>
                        @else
                            <a href="/store/cart/add/{{ $item->id }}" class="btn btn-primary mt-3">Agregar al Carrito</a>
                        @endif


                <a href="/store" class="btn btn-secondary mt-3">Volver a la Tienda</a>
            </div>
        </div>
    </div>
</body>
</html>
