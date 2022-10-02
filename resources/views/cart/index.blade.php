{{-- Creamos una vista de carrito de compras --}}
@extends('layouts.app')

<style>
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
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <h1 class="text-center">Carrito de compras</h1>
                </div>
            </div>
            @if (session('message'))
                <div class="alert alert-success alert-block d-flex justify-content-between">
                    <strong>{{ session('message') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(Cart::count() > 0)
                <div class="row mb-3">
                    <div class="col-12">
                        {{-- Creamos tabla responsive --}}
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Imagen</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Subtotal</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (Cart::content() as $item)
                                        <tr style="vertical-align: baseline;">
                                            <td>
                                                <img src="{{ asset('storage/' . $item->options->image) }}" alt="{{ $item->name }}" width="100">
                                            </td>
                                            <td>{{ $item->name }}</td>
                                            <td>${{ $item->price }}</td>
                                            <td>
                                                <form action="{{ route('cart.update', $item->rowId) }}" method="POST" class="d-flex gap-3">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="input-group">
                                                        <button class="btn btn-outline-secondary button-addon1 btn_increment" type="button">-</button>
                                                        <input type="text" class="form-control text-center input_center qty_cart" name="cantidad" value="{{ $item->qty }}">
                                                        <button class="btn btn-outline-secondary button-addon1" type="button">+</button>
                                                    </div>
                                                    <input type="hidden" class="rowId" value="{{ $item->rowId }}">
                                                    <button type="submit" class="btn_outline_dark">Actualizar cantidad</button>
                                                </form>
                                            </td>
                                            <td>${{ $item->subtotal }}</td>
                                            <td>
                                                <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn fs-4">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- Mejorar card de subtotales --}}
                <div class="row">
                    <div class="col-6 offset-6">
                        <h3 class="text-start mb-3">Total del carrito</h3>
                        <table class="table">
                            <tbody>
                                <tr>
                                    {{-- El th se debe ver gris para que se vea como un encabezado --}}
                                    <th scope="row" class="bg-light p-3">Subtotal</th>
                                    <td class="p-3">${{ Cart::subtotal() }}</td>
                                </tr>
                                
                                <tr>
                                    <th scope="row" class="bg-light p-3">Total</th>
                                    <td class="p-3">${{ Cart::subtotal() }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="#" class="btn_outline_dark">Continuar al pago</a>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-12">
                        <h3>No hay productos en el carrito</h3>
                    </div>
                </div>
            @endif
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

        // Actualizar carrito
    </script>
@endsection
