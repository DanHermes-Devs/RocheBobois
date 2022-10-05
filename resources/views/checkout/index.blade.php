@extends('layouts.app')
<style>
    .form-control.StripeElement.StripeElement--empty .__privateStripeElement {
        padding: 0.375rem 0.75rem!important;
    }

    .__privateStripeElement {
        padding: 0.375rem 0.75rem!important;
    }
</style>
@section('content')
    <div class="container-fluid py-5 mt-5">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <h1 class="text-center">Detalle de la venta</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-5 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Tu carrito</span>
                        <span class="badge badge-secondary badge-pill">{{ Cart::count() }}</span>
                    </h4>
                    <ul class="list-group mb-3">
                        @foreach (Cart::content() as $item)
                            <li class="list-group-item d-flex justify-content-between lh-condensed align-items-center">
                                <div class="d-flex gap-2 align-items-center">
                                    <img src="{{ asset('storage/' . $item->options->image) }}" alt="{{ $item->name }}"
                                        class="img-fluid" width="100">
                                    <div>
                                        <h6 class="my-0">{{ $item->name }}</h6>
                                        <small class="text-muted">Cantidad: {{ $item->qty }}</small>
                                    </div>
                                </div>
                                <span class="text-muted">${{ $item->price }}</span>
                            </li>
                        @endforeach

                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (USD)</span>
                            <strong>${{ Cart::subtotal() }}</strong>
                        </li>
                    </ul>

                    <h4 class="mb-3">Método de pago</h4>

                    <div class="d-block my-3">
                        <div class="custom-control custom-radio">
                            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked
                                required>
                            <label class="custom-control-label" for="credit">Tarjeta de Crédito o Débito</label>
                        </div>
                    </div>

                    <hr class="mb-4">

                    <div class="row">
                        <form action="">
                            <div class="mb-3">
                                <label for="card-holder-name" class="form-label">Nombre de la tarjeta</label>
                                <input id="card-holder-name" type="text" class="form-control">
                            </div>

                            <!-- Stripe Elements Placeholder -->
                            <div class="mb-3">
                                <label for="card-element" class="form-label">Número de la tarjeta</label>
                                <div id="card-element" class="form-control"></div>
                            </div>

                            <button id="card-button" class="btn_outline_dark">
                                Realizar Pedido
                            </button>
                            {{-- <button class="btn_outline_dark" type="submit">Realizar Pedido</button> --}}
                        </form>
                    </div>
                </div>

                <div class="col-12 col-md-7 order-md-1">
                    <h4 class="mb-3">Detalles de Facturación</h4>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="nombre_completo">Nombre completo</label>
                            <input type="text" class="form-control" id="nombre_completo"
                                value="{{ Auth::user()->name }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" value="{{ Auth::user()->email }}">
                    </div>

                    <div class="mb-3">
                        <label for="direccion_principal">Dirección</label>
                        <input type="text" class="form-control" id="direccion_principal" placeholder="">
                    </div>

                    <div class="mb-3">
                        <label for="direccion_opcional">Dirección 2 <span class="text-muted">(Optional)</span></label>
                        <input type="text" class="form-control" id="direccion_opcional">
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="pais">País</label>
                            <select class="select-country-state form-select" id="pais" class="form-control"
                                name="pais" autocomplete="pais">
                                <option value="{{ Auth::user()->pais }}">{{ Auth::user()->pais }}</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="state">Estado</label>
                            <select class="select-country-state form-select" id="estado" class="form-control"
                                name="estado" autocomplete="estado">
                                {{-- mostrar el select con el pais que esta en la base de datos --}}
                                <option value="{{ Auth::user()->estado }}">{{ Auth::user()->estado }}</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="codigo_postal">Código Postal</label>
                            <input type="text" class="form-control" id="codigo_postal"
                                value="{{ Auth::user()->codigo_postal }}">
                        </div>
                    </div>
                    <input type="hidden" name="token_bearer" id="token_bearer">
                    <hr class="mb-4">
                    {{-- Informacion adicional --}}
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="nombre_completo">Información adicional</label>
                            <textarea name="informacion_adicional" id="informacion_adicional" cols="30" rows="5"
                                class="form-control"></textarea>
                        </div>
                    </div>
                    <hr class="mb-4">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://js.stripe.com/v3/"></script>

    <script>
        const stripe = Stripe('{{ env('STRIPE_KEY') }}');
        const elements = stripe.elements();
        const cardElement = elements.create('card');

        cardElement.mount('#card-element');

        </script>
    {{-- Consumir api Univeral Tutorial --}}
    <script>
        $(document).ready(function() {
            // Añadimos un id al boton
            $('.__privateStripeElement').attr('id', 'form-stripe-input');
            $('.__privateStripeElement').removeAttr('style');
            $('#form-stripe-input').removeAttr('style');

            $('input[name="cardnumber"]').on('change', function() {
                $('.__privateStripeElement').removeAttr('style');
            });
            // Select 2
            $('.select-country-state').select2({
                theme: 'bootstrap-5',
            });


            // Consultamos la API de paises y en cuanto cambie el valor del select de paises se cambiaran los estados
            let url_paises = 'https://www.universal-tutorial.com/api/countries';
            let url_estados = 'https://www.universal-tutorial.com/api/states/';

            $.ajax({
                type: "GET",
                url: "https://www.universal-tutorial.com/api/getaccesstoken",
                headers: {
                    "Accept": "application/json",
                    "api-token": "pkEhMBnkFKdZpMv61f7OmPXsUamyGOa50kn6MEFxJghfhZJcIcP_iWG2jHhASUyIyto",
                    "user-email": "danhermes2019@outlook.com"
                },
                success: function(response) {
                    $('#token_bearer').val(response.auth_token);
                    $.ajax({
                        type: "GET",
                        url: url_paises,
                        headers: {
                            "Accept": "application/json",
                            "Authorization": "Bearer " + response.auth_token
                        },
                        success: function(response) {
                            // Enlistar los Paises en el select con el id pais
                            $.each(response, function(i, item) {
                                $('#pais').append($('<option>', {
                                    value: item.country_name,
                                    text: item.country_name
                                }));
                            });

                        }
                    });
                }
            });

            // Enlistar los estados de acuerdo al pais seleccionado
            $('#pais').change(function() {
                var pais = $(this).val();
                var token_bearer = $('#token_bearer').val();
                $.ajax({
                    type: "GET",
                    url: url_estados + pais,
                    headers: {
                        "Accept": "application/json",
                        "Authorization": "Bearer " + token_bearer
                    },
                    success: function(response) {
                        // Limpiar el select de estados para que no se repitan los estados al cambiar de pais
                        $('#estado').empty();
                        $('#estado').append($('<option>', {
                            value: '',
                            text: '-- Selecciona una opción --'
                        }));
                        // Enlistar los estados en el select con el id estado
                        $.each(response, function(i, item) {
                            $('#estado').append($('<option>', {
                                value: item.state_name,
                                text: item.state_name
                            }));
                        });
                    }
                });
            });

        });
    </script>
@endsection
