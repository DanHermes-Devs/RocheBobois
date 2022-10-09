@extends('layouts.app')
<style>
    .form-control {
        border-radius: 0 !important;
        padding: 0.6rem !important;
    }

    .form-control:focus {
        box-shadow: none;
    }

    .form-select {
        border-radius: 0 !important;
        padding: 0.6rem !important;
    }

    .select2-container--bootstrap-5 .select2-selection {
        padding: 0.6rem !important;
        height: 44.22px !important;
        border-radius: 0 !important;
    }
</style>
@section('content')
    <div class="container-fluid py-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if (session('mensaje'))
                        <div class="alert alert-success" role="alert">
                            {{ session('mensaje') }}
                        </div>
                    @endif
                </div>
                <div class="col-12 col-md-2">
                    <div class="d-flex align-items-start">
                        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                            <button class="text-dark btn" id="mis-compras-tab" data-bs-toggle="pill"
                                data-bs-target="#mis-compras" role="tab" aria-controls="mis-compras"
                                aria-selected="true">
                                Mis Compras
                            </button>

                            <button class="text-dark btn" id="mis-reservas-tab" data-bs-toggle="pill"
                                data-bs-target="#mis-reservas" role="tab" aria-controls="mis-reservas"
                                aria-selected="false">
                                Mis Reservas
                            </button>

                            <button class="active text-dark btn" id="mis-datos-tab" data-bs-toggle="pill"
                                data-bs-target="#mis-datos" role="tab" aria-controls="mis-datos" aria-selected="false">
                                Mis Datos
                            </button>

                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-10">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade" id="mis-compras" role="tabpanel" aria-labelledby="mis-compras-tab"
                            tabindex="0">
                            Hola 1
                        </div>
                        <div class="tab-pane fade" id="mis-reservas" role="tabpanel" aria-labelledby="mis-reservas-tab"
                            tabindex="0">
                            Hola 2
                        </div>
                        <div class="tab-pane fade show active" id="mis-datos" role="tabpanel"
                            aria-labelledby="mis-datos-tab" tabindex="0">
                            <form method="POST" class="px-5" action="{{ route('perfil.update', $usuario->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="name" class="form-label">{{ __('Nombre Completo') }}</label>

                                        <input id="name" type="text"
                                            class="form-control" name="name"
                                            value="{{ $usuario->name }}" autocomplete="name" autofocus>
                                    </div>

                                    <div class="col">
                                        <label for="email" class="form-label">{{ __('Correo Electrónico') }}</label>

                                        <input id="email" type="email"
                                            class="form-control" name="email"
                                            value="{{ $usuario->email }}" autocomplete="email">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="empresa" class="form-label">{{ __('Empresa') }}</label>
                                        <input id="empresa" type="text" class="form-control" name="empresa"
                                            value="{{ $usuario->empresa }}" autocomplete="empresa">
                                    </div>

                                    <div class="col">
                                        <label for="cargo" class="form-label">{{ __('Cargo') }}</label>
                                        <input id="cargo" type="text" class="form-control" name="cargo"
                                            value="{{ $usuario->cargo }}" autocomplete="cargo">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="pais" class="form-label">{{ __('País') }}</label>

                                        <select class="js-example-basic-single form-select" id="pais"
                                            class="form-control" name="pais"autocomplete="pais">
                                            <option value="{{ $usuario->pais }}">{{ $usuario->pais }}</option> 
                                        </select>
                                    </div>

                                    <div class="col">
                                        <label for="estado" class="form-label">{{ __('Estado') }}</label>

                                        <select class="js-example-basic-single form-select" id="estado"
                                            class="form-control" name="estado" autocomplete="estado">
                                            {{-- Mostrar el estado actual --}}
                                            <option value="{{ $usuario->estado }}" selected>{{ $usuario->estado }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="codigo_postal" class="form-label">{{ __('Código Postal') }}</label>

                                        <input id="codigo_postal" type="text"
                                            class="form-control"
                                            name="codigo_postal" value="{{ $usuario->codigo_postal }}"
                                            autocomplete="codigo_postal">
                                    </div>

                                    <div class="col">
                                        <label for="telefono" class="form-label">{{ __('Teléfono') }}</label>

                                        <input id="telefono" type="text"
                                            class="form-control" name="telefono"
                                            value="{{ $usuario->telefono }}" autocomplete="telefono">
                                    </div>
                                </div>

                                <input type="hidden" name="token_bearer" id="token_bearer">

                                <div class="mb-0">
                                    <button type="submit" class="btn_outline_dark">
                                        {{ __('Actualizar') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        $(document).ready(function() {
            // Select 2
            $('.js-example-basic-single').select2({
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
                    url: "https://www.universal-tutorial.com/api/states/" + pais,
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