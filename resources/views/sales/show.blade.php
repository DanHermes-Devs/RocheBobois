@extends('layouts.app')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
<style>
    button.button-addon1 {
        border-radius: 0 !important;
        width: 30%;
    }

    button.button-addon1:hover,
    button.button-addon1:focus,
    button.button-addon1:active {
        background: #fff;
        color: #000;
    }

    button.button-addon1:focus {
        outline: none;
        box-shadow: none;
    }

    .input_center {
        border: 1px solid #000 !important;
    }

    .input-group {
        width: 24% !important;
    }

    .swiper {
        width: 100%;
        height: 100%;
    }

    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
    }

    .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    body {
        background: #000;
        color: #000;
    }

    .swiper {
        width: 100%;
        height: 300px;
        margin-left: auto;
        margin-right: auto;
    }

    .swiper-slide {
        background-size: cover;
        background-position: center;
    }

    .mySwiper2 {
        height: 55%;
        width: 100%;
    }

    .mySwiper {
        height: 20%;
        box-sizing: border-box;
        padding: 10px 0;
    }

    .mySwiper .swiper-slide {
        width: 25%;
        height: 100px;
        opacity: 0.4;
        margin-top: 2rem;
    }

    .mySwiper .swiper-slide-thumb-active {
        opacity: 1;
    }

    .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .swiper-button-next,
    .swiper-button-prev {
        color: #000 !important;
    }
</style>
@section('content')
    <div class="container-fluid py-5 mt-5">
        <div class="container mt-5">
            @if (session('message'))
                <div class="alert alert-success alert-block d-flex justify-content-between">
                    <strong>{{ session('message') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @php
                $imagenes_galeria = json_decode($product->galeria);
            @endphp

            <div class="row">
                {{-- Slider --}}
                <div class="col-12 col-md-6">
                    <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                        <div class="swiper-wrapper">
                            <a class="swiper-slide" data-fancybox="gallery"
                                href="{{ asset('storage/' . $product->imagen_destacada) }}">
                                <img src="{{ asset('storage/' . $product->imagen_destacada) }}"
                                    alt="{{ $product->nombre_producto }}" />
                            </a>
                            @if ($imagenes_galeria)
                                @foreach ($imagenes_galeria as $galeria)
                                    <a class="swiper-slide" data-fancybox="gallery"
                                        href="{{ asset('storage/' . $galeria) }}">
                                        <img src="{{ asset('storage/' . $galeria) }}"
                                            alt="{{ $product->nombre_producto }}" />
                                    </a>
                                @endforeach
                            @endif
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                    <div thumbsSlider="" class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="{{ asset('storage/' . $product->imagen_destacada) }}"
                                    alt="{{ $product->nombre_producto }}" />
                            </div>
                            @if ($imagenes_galeria)
                                @foreach ($imagenes_galeria as $galeria)
                                    <div class="swiper-slide">
                                        <img src="{{ asset('storage/' . $galeria) }}"
                                            alt="{{ $product->nombre_producto }}" />
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Info del producto --}}
                <div class="col-12 col-md-6">
                    <div class="mb-4">
                        <h2 class="fs-1 text-uppercase">{{ $product->nombre_producto }}</h2>
                        <div class="d-flex gap-5">
                            {{-- Mostrar precio y condicionar si hay precio con descuento --}}
                            @if ($product->precio_descuento)
                                <h3 class="fs-3 text-danger fw-bold">${{ number_format($product->precio_descuento, 2) }}
                                </h3>
                                <h3 class="fs-3 text-muted fw-bold"><del>${{ number_format($product->precio, 2) }}</del>
                                </h3>
                            @else
                                <h3 class="fs-3 text-dark fw-bold">${{ number_format($product->precio, 2) }}</h3>
                            @endif
                        </div>
                    </div>

                    <p class="mb-3">
                    <div class="mb-4">
                        {!! $product->descripcion !!}
                    </div>

                    <form action="{{ route('addToCart', $product->id) }}" method="POST" class="mb-0 d-flex gap-4">
                        @csrf
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <input type="hidden" name="nombre_producto" value="{{ $product->nombre_producto }}">
                        <input type="hidden" name="descripcion" value="{{ $product->descripcion }}">
                        {{-- Si el producto tiene descuento, tomamos en cuenta este y el precio normal no --}}
                        @if ($product->precio_descuento)
                            <input type="hidden" name="precio" value="{{ $product->precio_descuento }}">
                        @else
                            <input type="hidden" name="precio" value="{{ $product->precio }}">
                        @endif
                        <input type="hidden" name="imagen_destacada" value="{{ $product->imagen_destacada }}">
                        {{-- Botones de cantidad --}}
                        <div class="input-group">
                            <button class="btn btn-outline-secondary button-addon1" type="button">-</button>
                            {{-- Input de cantidad --}}
                            <input type="text" class="form-control input_center text-center" value="1"
                                name="cantidad">
                            <button class="btn btn-outline-secondary button-addon1" type="button">+</button>
                        </div>
                        <button type="submit" class="btn_outline_dark d-flex gap-2 btn_action">
                            Añadir al carrito
                        </button>
                    </form>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script>
        // Darle funcionalidad a los botones de cantidad
        $('.button-addon1').on('click', function() {
            var button = $(this);
            var quantityOldValue = button.parent().find('input').val();
            var quantityNewVal;
            if (button.text() == "+") {
                quantityNewVal = parseFloat(quantityOldValue) + 1;
            } else {
                if (quantityOldValue > 1) {
                    quantityNewVal = parseFloat(quantityOldValue) - 1;
                } else {
                    quantityNewVal = 1;
                }
            }
            button.parent().find('input').val(quantityNewVal);
        });
    </script>

    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
        });
        var swiper2 = new Swiper(".mySwiper2", {
            spaceBetween: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: swiper,
            },
        });
    </script>
@endsection
