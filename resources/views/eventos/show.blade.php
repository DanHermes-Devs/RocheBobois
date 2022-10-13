@extends('layouts.app')
<style>
    .img_fecha {
        height: 100%;
        width: 90%;
        position: relative;
    }

    .modal-content {
        border-radius: 0;
    }

    .clic-image {
        position: absolute;
        top: 0;
        background: #000;
        color: #fff;
        padding: 0.2rem 1rem;
    }

    a {
        cursor: pointer;
    }

    .img_fecha img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        max-height: 230px !important;
    }

    .full-width-content .container.grid-container {
        padding: 40px 0 !important;
    }

    .grid-event {
        display: grid;
        grid-template-columns: 40% 60%;
        margin-bottom: 2rem;
        background: #eeeeee;
        align-items: center;
    }

    .card_black_eventos {
        background: #000;
        color: #fff;
        position: absolute;
        padding: 1rem;
        text-align: center;
        top: 0;
    }

    div#reservar {
        z-index: 999999;
    }

    .btn_reservar {
        background: transparent;
        border: 1px solid #000;
        padding: 0;
        color: #000;
        text-decoration: none;
        width: 180px;
        text-align: center;
        display: flex;
        height: 48px;
        align-items: center;
        justify-content: center;
    }

    .btn_generico {
        background: transparent;
        border: 1px solid #000;
        padding: 0;
        color: #000;
        text-decoration: none;
        width: 180px;
        text-align: center;
        display: flex;
        height: 48px;
        align-items: center;
        justify-content: center;
    }

    .btn_generico_close {
        background: transparent;
        border: 1px solid #c13737!important;
        padding: 0;
        color: #c13737;
        text-decoration: none;
        width: 180px;
        text-align: center;
        display: flex;
        height: 48px;
        align-items: center;
        justify-content: center;
    }

    .btn_generico_close:hover {
        color: #c13737!important;
    }


    /* Media querys */
    /*============================================= 
    TABLET HORIZONTAL (LG revisamos en 1024px) 
    =============================================*/

    @media (max-width:1199px) and (min-width:992px) {}

    /*============================================= 
TABLET VERTICAL (MD revisamos en 768px) 
=============================================*/

    @media (max-width:991px) and (min-width:768px) {}

    /*============================================= 
MÓVIL HORIZONTAL (SM revisamos en 576px) 
=============================================*/

    @media (max-width:767px) and (min-width:576px) {
        .grid-event {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            gap: 1rem;
        }

        .linear_color {
            padding: 1rem;
        }

        .img_fecha {
            width: 100%;
        }
    }

    /*============================================= 
MOVIL VERTICAL (revisamos en 320px) 
=============================================*/

    @media (max-width:575px) {

        .grid-event {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            gap: 1rem;
        }

        .linear_color {
            padding: 1rem;
        }

        .img_fecha {
            width: 100%;
        }
    }
</style>

@section('content')
    <div class="container py-5 mt-5">
        <div class="row mb-3">
            <div class="col-12">
                <h2 class="fs-1 text-uppercase text-center fw-bold">{{ $eventoCategory->nombre }}</h2>
            </div>
        </div>

        <div class="card_colecciones">
            @foreach ($eventos as $evento)
                <div class="grid-event">
                    <div class="img d-flex h-100">
                        <a data-src="{{ asset('storage/'.$evento->imagen_destacada) }}" data-fancybox="{{ $evento->nombre_evento }}" class="img_fecha">
                            <img loading="lazy" class="photothumb" src="{{ asset('storage/'.$evento->imagen_destacada) }}">
                            <div class="card_black_eventos">
                                @if ($evento->fecha)
                                    <p class="mb-0" data-fecha="{{ $evento->fecha }}">{{ $evento->fecha }}</p>
                                @endif
    
                                @if ($evento->hora)
                                    <p class="mb-0" data-hora="{{ $evento->hora }}">{{ $evento->hora }}</p> 
                                @endif
                            </div>
                        </a>
                    </div>
                    <div class="linear_color">
                        <h3 class="font-weight-bold w-100">{{ $evento->nombre_evento }}</h3>
                        <p>{!! $evento->descripcion !!}</p>
                        <a type="button" class="btn_reservar" data-bs-toggle="modal" data-bs-target="#reservar" data-id="{{ $evento->id }}" data-hora="{{ $evento->hora }}" data-fecha="{{ $evento->fecha }}" data-titulo="{{ $evento->nombre_evento }}">
                            Reservar ahora
                        </a>
    
                        <div class="modal fade" id="reservar" tabindex="-1" aria-labelledby="reservarLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="reservar_title_modal"></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="reservar_evento" method="post">
                                            @csrf
                                            <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                                            <input type="hidden" name="id_event" value="{{ $evento->id }}">
                                            <input type="hidden" name="nombre_evento" value="{{ $evento->nombre_evento }}">
                                            {{-- Generar un codigo unico con el tiempo --}}
                                            <input type="hidden" name="codigo_reserva" value="{{ time() }}">
                                            <div class="mb-3">
                                                <label for="nombre_usuario" class="col-form-label">Nombre:</label>
                                                {{-- Obtener el nombre del usuario autenticado --}}
                                                <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" value="{{ Auth::user()->name }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="email_usuario" class="col-form-label">Email:</label>
                                                {{-- Obtener el email del usuario autenticado --}}
                                                <input type="text" class="form-control" id="email_usuario" name="email_usuario" value="{{ Auth::user()->email }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="telefono_usuario" class="col-form-label">Teléfono:</label>
                                                <input type="text" class="form-control" id="telefono_usuario" name="telefono_usuario" value="{{ Auth::user()->telefono }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="fecha" class="col-form-label">Fecha:</label>
                                                <input type="text" class="form-control" name="fecha" id="fecha" readonly value="{{ $evento->fecha }}">
                                            </div>
                                            <div class="mb-5">
                                                <label for="hora" class="col-form-label">Hora:</label>
                                                <input type="text" class="form-control" id="hora" name="hora" readonly value="{{ $evento->hora }}">
                                            </div>
                                            <div class="d-flex gap-3">
                                                <button type="submit" class="ml-3 btn_generico btn_reservar_ahora">Reservar</button>
                                                <button type="button" class="btn_generico_close" data-bs-dismiss="modal">Cerrar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('body').addClass('full-width-content');
    });

    $(document).ready(function() {
        $('.btn_reservar').click(function() {
            var id = $(this).data('id');
            $('#reservar').find('input[name="id"]').val(id);

            var titulo = $(this).data('titulo');
            $('#reservar').find('input[name="nombre_evento"]').val(titulo);

            // Fecha
            var fecha = $(this).data('fecha');
            $('#reservar').find('input[name="fecha"]').val(fecha);

            // Hora
            var hora = $(this).data('hora');
            $('#reservar').find('input[name="hora"]').val(hora);

            // reservar_title_modal
            $('#reservar_title_modal').html(titulo);

            // Crear codigo unico de solo numeros de 10 digitos
            var codigo_unico = Math.floor(1000000000 + Math.random() * 9000000000);
            $('#reservar').find('input[name="codigo_unico"]').val(codigo_unico);
        });

        // Detectar cambio en el nombre
        $('#nombre_usuario').on('input', function() {
            var nombre = $(this).val();
            $('#reservar').find('input[name="nombre_usuario"]').val(nombre);
        });

        // Detectar cambio en el email
        $('#email').on('input', function() {
            var email = $(this).val();
            $('#reservar').find('input[name="email"]').val(email);
        });

        // Detectar cambio inmediato en el input telefono al escribir algo nuevo
        $('#telefono_usuario').on('input', function() {
            var telefono = $(this).val();
            $('#reservar').find('input[name="telefono_usuario"]').val(telefono);
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $('.btn_reservar_ahora').click(function(e) {
            e.preventDefault();
            $(this).waitMe();

            // Enviar todo el formulario serializado
            var form = $('#reservar_evento').serialize();

            $.ajax({
                url: "{{ route('bookings.store') }}",
                type: "POST",
                data: form,
                success: function(data) {
                    if (data.status == 'success') {
                        $('#reservar').modal('hide');
                        $('.btn_reservar_ahora').waitMe('hide');

                        Swal.fire({
                            title: 'Reserva realizada con éxito',
                            text: 'Se ha enviado un correo electrónico con los datos de la reserva',
                            icon: 'success',
                            confirmButtonText: 'Aceptar'
                        });

                    } else {
                        $('.btn_reservar_ahora').waitMe('hide');
                        Swal.fire({
                            title: 'Error',
                            text: 'Ha ocurrido un error al realizar la reserva',
                            icon: 'error',
                            confirmButtonText: 'Aceptar'
                        });
                    }
                },
                error: function(data) {
                    $('.btn_reservar_ahora').waitMe('hide');
                    Swal.fire({
                        title: 'Error',
                        text: 'Ha ocurrido un error al realizar la reserva',
                        icon: 'error',
                        confirmButtonText: 'Aceptar'
                    });
                }
            });
        });
    });
</script>
@endsection