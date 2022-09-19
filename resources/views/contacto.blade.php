@extends('layouts.app')

<style>
    .form-control, .form-select {
        border: 1px solid #000!important;
    }

    textarea{
        max-width: 100%;
        min-width: 100%;
        min-height: 200px;
        max-height: 200px;
        width: 100%;
        height: 200px;
    }
</style>

@section('content')
    <div class="container-fluid py-5 my-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="fs-1 text-uppercase text-center fw-bold">Agenda una cita</h2>
                </div>
            </div>
            <div class="row mb-2 mb-md-5">
                <p class="alert alert-warning">
                    Si quieres ser guiado en la elección de tus muebles, en la decoración de tu interior o en la realización
                    de un proyecto deja tus datos y uno de nuestros especialistas te mostrará lo mejor de nuestras
                    colecciones
                </p>
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    @if (session('success'))
                        <div class="alert alert-success alert-block d-flex justify-content-between">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form id="solicitud_email" action="{{ route('store.contacto') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="nombre_completo">Nombre</label>
                            <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" required>
                        </div>

                        <div class="mb-3">
                            <label for="correo_electronico">Email</label>
                            <input type="email" class="form-control" id="correo_electronico" name="correo_electronico" required>
                        </div>

                        <div class="mb-3">
                            <label for="telefono">Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" required>
                        </div>

                        <div class="mb-3">
                            <label for="sucursal">Sucursal</label>
                            <select name="sucursal" id="sucursal" class="form-select" required>
                                <option value="">-- Selecciona una sucursal --</option>
                                <option value="pedregal">ARTZ PEDREGAL</option>
                                <option value="monterrey">MONTERREY</option>
                                <option value="polanco">POLANCO</option>
                                <option value="santafe">SANTA FE</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="productos_interesado">¿EN QUÉ PRODUCTOS ESTÁS INTERESADO?</label>
                            <textarea class="form-control" id="productos_interesado" name="productos_interesado" required></textarea>
                        </div>

                        <div class="mb-3 form-check">
                            <input class="form-check-input" type="checkbox" name="newsletter" id="newsletter"
                                value="si">
                            <label class="form-check-label" for="newsletter">QUIERO ESTAR INFORMADO DE LAS NOVEDADES ROCHE
                                BOBOIS</label>
                        </div>

                        <input type="submit" value="Envíar" name="enviar_email" class="btn_roche_outline_dark">
                    </form>
                </div>
                <div class="col-12 col-md-6">
                    <img src="{{ asset('image/TEMPS-CALME-Outdoor-1.jpg') }}" class="img-fluid" style="height: 100%;width: 100%;object-fit: cover;">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script></script>
@endsection
