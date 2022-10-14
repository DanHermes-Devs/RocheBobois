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
                <div class="col-12 mb-4">
                    <h3>Filtrar por Categoría</h3>
                    <form id="categoria_search" method="GET">
                        @csrf
                        <select name="categoria" id="categoria" class="form-select">
                            <option>-- Selecciona una opción --</option>
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
                                <img src="{{ asset('storage/' . $product->imagen_destacada) }}" class="card-img-top mb-3" alt="{{ $product->nombre_producto }}">
                                <div class="">
                                    <h5 class="mb-0">{{ $product->nombre_producto }}</h5>
                                    <p class="mb-3">
                                        <span class="">${{ $product->precio }}</span>
                                        @if ($product->precio_descuento)
                                            <span class="fw-bold">${{ $product->precio_descuento }}</span>
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

    // Filtrar por categoria
    $('#categoria').on('change', function() {
        // Recargamos la pagina con la ruta de categoria seleccionada
        var route = "{{ route('front.sales', ':slug') }}";
        route = route.replace(':slug', $(this).val());
        window.location.href = route;
        
    });
</script>
@endsection
