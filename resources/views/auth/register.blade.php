@extends('layouts.app')
<style>
    div#login_form {
        margin-top: 4rem;
    }

    .form-control {
        border-radius: 0!important;
        padding: 0.6rem!important;
    }
    
    .form-select {
        border-radius: 0!important;
        padding: 0.6rem!important;
    }

    .form-control:focus {
        box-shadow: none;
    }

    main.pb-5 {
        padding: 0!important;
    }

    .select2-container--bootstrap-5 .select2-selection {
        padding: 0.6rem!important;
        height: 44.22px!important;
        border-radius: 0!important;
    }
</style>
@section('content')
<div class="container-fluid" id="login_form">
    <div class="row justify-content-center align-items-center">
        <div class="col-12 col-md-7 px-0">
            <img src="{{ asset('image/2022_1_PRESAGE_Canape__amb_pdf_ht-1-scaled.jpg') }}" class="img-fluid" alt="Responsive image">
        </div>

        <div class="col-12 col-md-5 px-0">
            <h2 class="fw-bold text-center mb-4">Registrate</h2>
            <form method="POST" class="px-5" action="{{ route('register') }}">
                @csrf

                <div class="row mb-3">
                    <div class="col">
                        <label for="name" class="form-label">{{ __('Nombre Completo') }}</label>
    
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
    
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
    
                    <div class="col">
                        <label for="email" class="form-label">{{ __('Correo Electrónico') }}</label>
    
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
    
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="empresa" class="form-label">{{ __('Empresa') }}</label>
                        <input id="empresa" type="text" class="form-control" name="empresa" value="{{ old('empresa') }}" autocomplete="empresa">
                    </div>
                    
                    <div class="col">
                        <label for="cargo" class="form-label">{{ __('Cargo') }}</label>
                        <select class="js-example-basic-single form-select" id="cargo" class="form-control @error('cargo') is-invalid @enderror" name="cargo" value="{{ old('cargo') }}" autocomplete="cargo">
                            <option value="">-- Selecciona una opción -- </option>
                            <option value="DIS">Diseñador</option>
                            <option value="ARQ">Arquitecto</option>
                            <option value="COM-FF&E">Comprador FF&E</option>
                            <option value="DIR-FF&E">Director FF&E </option>
                            <option value="PROP">Propietario</option>
                            <option value="GEH">Gerente Hotel</option>
                            <option value="OIN">Operador Inmobiliario</option>
                          </select>
      
                          @error('cargo')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="pais" class="form-label">{{ __('País') }}</label>
    
                        <select class="js-example-basic-single form-select" id="pais" class="form-control @error('pais') is-invalid @enderror" name="pais" value="{{ old('pais') }}" autocomplete="pais">
                          <option value="">-- Selecciona una opción -- </option>
                        </select>
    
                        @error('pais')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="col">
                        <label for="estado" class="form-label">{{ __('Estado') }}</label>
    
                        <select class="js-example-basic-single form-select" id="estado" class="form-control @error('estado') is-invalid @enderror" name="estado" value="{{ old('estado') }}" autocomplete="estado">
                            <option value="">-- Selecciona una opción -- </option>
                        </select>
    
                        @error('estado')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="codigo_postal" class="form-label">{{ __('Código Postal') }}</label>
    
                        <input id="codigo_postal" type="text" class="form-control @error('codigo_postal') is-invalid @enderror" name="codigo_postal" value="{{ old('codigo_postal') }}" autocomplete="codigo_postal">
    
                        @error('codigo_postal')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="col">
                        <label for="telefono" class="form-label">{{ __('Teléfono') }}</label>
    
                        <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" autocomplete="telefono">
    
                        @error('telefono')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
    
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
    
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
    
                    <div class="col">
                        <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
    
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                    </div>
                </div>

                <input type="hidden" name="token_bearer" id="token_bearer">

                <div class="mb-0">
                    <button type="submit" class="btn_outline_dark">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    {{-- Consumir api Univeral Tutorial --}}
    <script>
        $(document).ready(function () {
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
                success: function (response) {
                    $('#token_bearer').val(response.auth_token);
                    $.ajax({
                        type: "GET",
                        url: url_paises,
                        headers: {
                            "Accept": "application/json",
                            "Authorization": "Bearer " + response.auth_token
                        },
                        success: function (response) {
                            // Enlistar los Paises en el select con el id pais
                            $.each(response, function (i, item) {
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
            $('#pais').change(function () {
                var pais = $(this).val();
                var token_bearer = $('#token_bearer').val();
                $.ajax({
                    type: "GET",
                    url: "https://www.universal-tutorial.com/api/states/" + pais,
                    headers: {
                        "Accept": "application/json",
                        "Authorization": "Bearer " + token_bearer
                    },
                    success: function (response) {
                        // Limpiar el select de estados para que no se repitan los estados al cambiar de pais
                        $('#estado').empty();
                        $('#estado').append($('<option>', {
                            value: '',
                            text: '-- Selecciona una opción --'
                        }));
                        // Enlistar los estados en el select con el id estado
                        $.each(response, function (i, item) {
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
