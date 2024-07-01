@include('store.partials.header');

@if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif
<div class="container">
    <h1 class="mt-5">Productos en el carrito</h1>

    <div class="row">
            @if(count($items)>0)
            @foreach ($items as $item)
            <div class="col-md-2">
                <div class="product-card">
                    @if ($item->image)
                        <img src="{{ asset('storage/' . $item->image->src) }}" alt="Imagen de {{ $item->name }}" class="img-thumbnail" width="50">
                        @else
                            <p>-</p>
                        @endif<h2>{{ $item->name }}</h2>
                    <p>{{ $item->description }}</p>
                    <p><strong>Precio:</strong> ${{ $item->price }}</p>
                    <p><strong>Descuento:</strong> {{ $item->disccount }}%</p>
                </div>
            </div>
            @endforeach
            <div class="mt-4">
            <a href="/store" class="btn btn-secondary">Volver a la tienda</a>
            <a href="/store/sale" class="btn btn-success">Pagar</a>
        </div>

            @else
            <div class="alert alert-warning" role="alert">
            No hay productos en el carrito de compras.
        </div>
        <a href="/store" class="btn btn-secondary">Volver a la tienda</a>
</div>
            @endif
        </div>

<script>
    function confirmPayment() {
        alert("Compra realizada satisfactoriamente!");
        window.location.href = '/store/sale';
    }
</script>

</body>
</html>
