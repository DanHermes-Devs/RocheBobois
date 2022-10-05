@extends('layouts.app')

@section('content')
    <div class="container-fluid py-5 my-5">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <h2 class="fs-1 text-uppercase text-center fw-bold">{{ $sellerBest->nombre }}</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($products as $product)
                    {{-- Grid de productos --}}
                    <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                        <a href="{{ route('front.sales.show', $product->slug) }}" class="text-reset text-decoration-none">
                            <div class="card text-center">
                                <img src="{{ asset('storage/' . $product->imagen_destacada) }}" class="card-img-top" alt="{{ $product->nombre_producto }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->nombre_producto }}</h5>
                                    <p class="card-text mb-3">
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
@endsection
