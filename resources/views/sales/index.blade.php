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
                @foreach ($products as $product)
                    {{-- Grid de productos --}}
                    <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                        <div class="card text-center">
                            <img src="{{ asset('storage/' . $product->imagen_1) }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->nombre_producto }}</h5>
                                <p class="card-text">${{ $product->precio }}</p>
                                <a href="#" class="btn_roche_outline_dark">Ver más</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{ $products->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
