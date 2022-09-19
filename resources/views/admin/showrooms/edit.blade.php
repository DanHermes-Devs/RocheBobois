@extends('admin.layouts.app')
<style>
    trix-editor{
        min-height: 200px;
        height: 200px;
        max-height: 200px;
    }
</style>
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center dashboard__card p-4">
            <div class="d-flex mb-2">
                <a href="{{ route('showrooms') }}" class="text-dark"> <i class="fa-solid fa-arrow-left mr-2"></i> Volver</a>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0 fw-bold">Editar showroom</h2>
            </div>

            @if (session('store'))
                <div class="alert alert-success alert-block d-flex justify-content-between">
                    <strong>{{ session('store') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('update.showroom', $showroom->id) }}" class="row" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="col-12 col-md-8">
                    <div class="mb-3">
                        <label for="nombre_showroom" class="form-label">Nombre del showroom</label>
                        <input type="text" class="form-control" id="nombre_showroom" name="nombre_showroom" value="{{ $showroom->nombre_showroom }}">
                    </div>
                    <div class="mb-3">
                        <label for="ciudad_showroom" class="form-label">Ciudad del Showroom</label>
                        <input type="text" class="form-control" id="ciudad_showroom" name="ciudad_showroom" value="{{ $showroom->ciudad_showroom }}">
                    </div>
                    <div class="mb-3">
                        <label for="numero_whatsapp" class="form-label">Número de Whatsapp</label>
                        <input id="numero_whatsapp" type="text" class="form-control" name="numero_whatsapp" value="{{ $showroom->numero_whatsapp }}">
                    </div>
                    <div class="mb-3">
                        <label for="mensaje_predeterminado_wp" class="form-label">Mensaje predeterminado Whatsapp</label>
                        <input type="text" class="form-control" id="mensaje_predeterminado_wp" name="mensaje_predeterminado_wp" value="{{ $showroom->mensaje_predeterminado_wp }}">
                    </div>
                    <div class="mb-3">
                        <label for="numero_llamadas" class="form-label">Número de Llamadas</label>
                        <input type="text" class="form-control" id="numero_llamadas" name="numero_llamadas" value="{{ $showroom->numero_llamadas }}">
                    </div>
                    <div class="mb-3">
                        <label for="iframe_google_maps" class="form-label">Iframe Google Maps</label>
                        <input type="text" class="form-control" id="iframe_google_maps" name="iframe_google_maps" value="{{ $showroom->iframe_google_maps }}">
                    </div>
                    <div class="mb-3">
                        <label for="direccion_showroom" class="form-label">Dirección Showroom</label>
                        <input type="text" class="form-control" id="direccion_showroom" name="direccion_showroom" value="{{ $showroom->direccion_showroom }}">
                    </div>
                    <div class="mb-3">
                        <label for="como_llegar" class="form-label">¿Cómo Llegar?</label>
                        <input type="text" class="form-control" id="como_llegar" name="como_llegar" value="{{ $showroom->como_llegar }}">
                    </div>
                    <div class="mb-3">
                        <label for="id_tag_manager" class="form-label">ID Tag Manager Google</label>
                        <input type="text" class="form-control" id="id_tag_manager" name="id_tag_manager" value="{{ $showroom->id_tag_manager }}">
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="mb-3">
                        <label for="imagen_destacada" class="form-label">Imagen Destacada</label>
                        <input type="file" name="imagen_destacada" id="imagen_destacada" class="form-control">
                        @if (File::exists(public_path('storage/' . $showroom->imagen_destacada)) && $showroom->imagen_destacada != null)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $showroom->imagen_destacada) }}" class="img-fluid mt-3">
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success w-100 btn-editar">Actualizar showroom</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

{{-- Scripts Personalizados --}}
@section('scripts')
    <script>
        // Cargar Document con jQuery
        $(document).ready(function () {
            $('.btn-editar').click(function (e) {
                $('.btn-editar').waitMe();
            });
        });
    </script>
@endsection