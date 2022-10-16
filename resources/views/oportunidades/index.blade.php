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
                                <div class="img_responsive">
                                    <img src="{{ asset('storage/' . $product->imagen_destacada) }}" class="card-img-top mb-3 product_{{ $product->slug }}" alt="{{ $product->nombre_producto }}">
                                </div>
                                <div class="">
                                    <h5 class="">{{ $product->nombre_producto }}</h5>
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
                {{ $productos_unicos->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
