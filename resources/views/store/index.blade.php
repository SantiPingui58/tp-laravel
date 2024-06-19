
@include('store.partials.header');
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


    <div class="container">

        <h1 class="mt-5">Tienda</h1>

        <div class="mb-4">
    <h4>Filtrar por categoría:</h4>
    <form id="categoryFilterForm" action="/store" method="GET">
        <div class="btn-group" role="group" aria-label="Filtrar por categoría">
            @foreach ($categories as $category)
                <button type="button" class="btn btn-outline-primary category-btn" data-category="{{ $category->id }}">{{ $category->name }}</button>
            @endforeach
        </div>

        <div class="mt-2"> 
        <a href="/store" class="btn btn-outline-secondary">Borrar Filtro</a>
    </div>
        <input type="hidden" name="categoria" id="categoriaInput">
    </form>
</div>
        <div class="row">
            @if(count($items)>0)
            @foreach ($items as $item)
            <div class="col-md-4">
                <div class="product-card">
                    @if ($item->image)
                        <img src="{{ asset('storage/' . $item->image->src) }}" alt="Imagen de {{ $item->name }}" class="img-thumbnail" width="100">
                        @else
                            <p>-</p>
                        @endif<h2>{{ $item->name }}</h2>
                    <p>{{ $item->description }}</p>
                    <p><strong>Precio:</strong> ${{ $item->price }}</p>
                    <p><strong>Descuento:</strong> {{ $item->disccount }}%</p>
                    <p><strong>Stock:</strong> {{ $item->stock }}</p>
                    <a href="/store/product/{{ $item->id }}" class="btn btn-primary">Ver Detalles</a>
                    <a href="#" class="btn btn-secondary">Agregar al Carrito</a>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('.category-btn').click(function() {
            var categoryId = $(this).data('category'); 
            $('#categoriaInput').val(categoryId); 
            $('#categoryFilterForm').submit(); 
        });
    });
</script>
