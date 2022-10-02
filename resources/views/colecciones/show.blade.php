@extends('layouts.app')
<style>
.bx-wrapper {
        border: none!important;
        box-shadow: none!important;
    }

    .bx-wrapper, .bx-viewport, .bx-wrapper img {height: 500px !important;}
</style>
@section('content')
    <div class="container-fluid py-5 my-5">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <h2 class="fs-1 text-uppercase text-center fw-bold">Colección {{ $coleccion->nombre_coleccion }}</h2>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-12">
                    <div class="slider">
                        @php
                            $galeria = json_decode($coleccion->img_galeria);
                        @endphp
                        @foreach ($galeria as $imagen)
                            <div class="slider__item">
                                <img src="{{ asset('storage/' . $imagen) }}" class="img-fluid w-100" style="object-fit: contain;">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                @foreach ($productos as $producto)
                    {{-- Grid de productoos --}}
                    <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                        <a href="{{ route('front.sales.show', $producto->slug) }}" class="text-reset text-decoration-none">
                            <div class="card text-center">
                                <img src="{{ asset('storage/' . $producto->imagen_destacada) }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $producto->nombre_producto }}</h5>
                                    <p class="card-text mb-3">
                                        <span class="">${{ $producto->precio }}</span>
                                        @if ($producto->precio_descuento)
                                            <span class="fw-bold">${{ $producto->precio_descuento }}</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                {{ $productos->links('pagination::bootstrap-4') }}
            </div>

            <div class="row">
                <div class="col-12 col-md-7">
                    <h1>{{ $coleccion->nombre_disenador }}</h1>
                    <p>
                        {!! $coleccion->descripcion !!}
                    </p>
                    <p>
                        <b>Colección:</b> {{ $coleccion->nombre_coleccion }} <br>
                        <b>Diseñador:</b> {{ $coleccion->nombre_disenador }} <br>
                    </p>
                </div>
                <div class="col-12 col-md-5">
                    <img src="{{ asset('storage/' . $coleccion->foto_disenador) }}" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    jQuery('.slider').bxSlider();
</script>
@endsection
