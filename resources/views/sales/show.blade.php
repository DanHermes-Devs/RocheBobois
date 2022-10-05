@extends('layouts.app')
<style>
    .flex-direction-nav a {
        width: 50px!important;
        height: 50px!important;
        top: 40%!important;
    }

    button.button-addon1 {
        border-radius: 0!important;
        width: 30%;
    }

    button.button-addon1:hover, button.button-addon1:focus, button.button-addon1:active {
        background: #fff;
        color: #000;
    }

    button.button-addon1:focus {
        outline: none;
        box-shadow: none;
    }

    .input_center {
        border: 1px solid #000!important;
    }

    .input-group {
        width: 24%!important;
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
                    <div class="flexslider">
                        <ul class="slides">
                            <li data-thumb="{{ asset('storage/' . $product->imagen_destacada) }}">
                                <img src="{{ asset('storage/' . $product->imagen_destacada) }}" alt="{{ $product->nombre_producto }}" />
                            </li>
                            @foreach ($imagenes_galeria as $galeria)
                                <li data-thumb="{{ asset('storage/' . $galeria) }}">
                                    <img src="{{ asset('storage/' . $galeria) }}" alt="{{ $product->nombre_producto }}" />
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                {{-- Info del producto --}}
                <div class="col-12 col-md-6">
                    <div class="mb-4">
                        <h2 class="fs-1 text-uppercase">{{ $product->nombre_producto }}</h2>
                        <div class="d-flex gap-5">
                            @if ($product->precio_descuento)
                                <span class="fw-bold">${{ $product->precio_descuento }}</span>
                            @endif
                            <span class="fw-bold fs-3">${{ $product->precio }}</span>
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
                            <input type="hidden" name="precio" value="{{ $product->precio }}">
                            <input type="hidden" name="imagen_destacada" value="{{ $product->imagen_destacada }}">
                            {{-- Botones de cantidad --}}
                            <div class="input-group">
                                <button class="btn btn-outline-secondary button-addon1" type="button">-</button>
                                {{-- Input de cantidad --}}
                                <input type="text" class="form-control input_center text-center" value="1" name="cantidad">
                                <button class="btn btn-outline-secondary button-addon1" type="button">+</button>
                            </div>
                            <button type="submit" class="btn_outline_dark d-flex gap-2">
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
    <script>
        // Darle funcionalidad a los botones de cantidad
        $('.button-addon1').on('click', function () {
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

        // FlexSlider
        $(document).ready(function() {

            $('.flexslider').flexslider({
                animation: "slide",
                controlNav: "thumbnails",
                prevText: "",
                nextText: "",
            });

        });

    </script>
@endsection
