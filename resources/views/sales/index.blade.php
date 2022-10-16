@extends('layouts.app')

@section('content')
    <div class="container-fluid py-5 my-5">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <h2 class="fs-1 text-uppercase text-center fw-bold">SALES</h2>
                </div>
            </div>
            <div class="row">
                {{-- Crear un filtro con las categorias --}}
                <div class="col-12 mb-5">
                    <h3>Filtrar por Categoría</h3>
                    <form id="categoria_search" method="GET">
                        @csrf
                        <select name="categoria" id="categoria" class="js-example-basic-single form-select">
                            <option value="salas">-- Selecciona una opción --</option>
                            @foreach($categorias as $categoria)
                                {{-- request()->segment(2) --}}
                                <option value="{{ $categoria->slug }}" {{ request()->segment(2) == $categoria->slug ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
                @foreach ($products as $product)
                    {{-- Grid de productos --}}
                    <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                        <a href="{{ route('front.sales.show', $product->slug) }}" class="text-reset text-decoration-none">
                            <div class="text-center">
                                <div class="img_responsive">
                                    <img src="{{ asset('storage/' . $product->imagen_destacada) }}" class="card-img-top mb-3 product_{{ $product->slug }}" alt="{{ $product->nombre_producto }}">
                                </div>
                                <div class="">
                                    <h5 class="mb-0">{{ $product->nombre_producto }}</h5>
                                    <p class="mb-3">
                                        @if ($product->precio_descuento)
                                            <span class="text-danger fw-bold">${{ number_format($product->precio_descuento, 2) }}</span>
                                            <span class="text-muted fw-bold"><del>${{ number_format($product->precio, 2) }}</del></span>
                                        @else
                                            <span class="text-dark fw-bold">${{ number_format($product->precio, 2) }}</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                {{ $products->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    // Mandamos traer la lista de los productos mediante ajax
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Select 2
    $('.js-example-basic-single').select2({
        theme: 'bootstrap-5',
    });

    // Filtrar por categoria
    $('#categoria').on('change', function() {
        // Recargamos la pagina con la ruta de categoria seleccionada
        var route = "{{ route('front.sales', ':slug') }}";
        route = route.replace(':slug', $(this).val());
        window.location.href = route;
        
    });
</script>
@endsection
