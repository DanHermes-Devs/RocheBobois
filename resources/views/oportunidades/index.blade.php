@extends('layouts.app')

@section('content')
    <div class="container-fluid py-5 my-5">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <h2 class="fs-1 text-uppercase text-center fw-bold">OPORTUNIDADES ÚNICAS</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($productos_unicos as $product)
                    {{-- Grid de productos --}}
                    <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                        <a href="{{ route('front.sales.show', $product->slug) }}" class="text-reset text-decoration-none">
                            <div class="text-center">
                                <img src="{{ asset('storage/' . $product->imagen_destacada) }}" class="card-img-top mb-3" alt="{{ $product->nombre_producto }}">
                                <div class="">
                                    <h5 class="">{{ $product->nombre_producto }}</h5>
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
                {{ $productos_unicos->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
