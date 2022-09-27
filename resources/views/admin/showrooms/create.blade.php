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
        <div class="row card p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0 fw-bold">Nuevo showroom</h2>
            </div>

            <form action="{{ route('store.showroom') }}" method="POST" enctype="multipart/form-data" class="row">
                @csrf
                <div class="col-12 col-md-8">
                    <div class="mb-3">
                        <label for="nombre_showroom" class="form-label">Nombre del Showroom</label>
                        <input type="text" class="form-control" id="nombre_showroom" name="nombre_showroom">
                    </div>
                    <div class="mb-3">
                        <label for="ciudad_showroom" class="form-label">Ciudad del Showroom</label>
                        <input type="text" class="form-control" id="ciudad_showroom" name="ciudad_showroom">
                    </div>
                    <div class="mb-3">
                        <label for="numero_whatsapp" class="form-label">Número de Whatsapp</label>
                        <input id="numero_whatsapp" type="text" class="form-control" name="numero_whatsapp">
                    </div>
                    <div class="mb-3">
                        <label for="mensaje_predeterminado_wp" class="form-label">Mensaje predeterminado Whatsapp</label>
                        <input type="text" class="form-control" id="mensaje_predeterminado_wp" name="mensaje_predeterminado_wp">
                    </div>
                    <div class="mb-3">
                        <label for="numero_llamadas" class="form-label">Número de Llamadas</label>
                        <input type="text" class="form-control" id="numero_llamadas" name="numero_llamadas">
                    </div>
                    <div class="mb-3">
                        <label for="iframe_google_maps" class="form-label">Iframe Google Maps</label>
                        <input type="text" class="form-control" id="iframe_google_maps" name="iframe_google_maps">
                    </div>
                    <div class="mb-3">
                        <label for="direccion_showroom" class="form-label">Dirección Showroom</label>
                        <input type="text" class="form-control" id="direccion_showroom" name="direccion_showroom">
                    </div>
                    <div class="mb-3">
                        <label for="como_llegar" class="form-label">¿Cómo Llegar?</label>
                        <input type="text" class="form-control" id="como_llegar" name="como_llegar">
                    </div>
                    <div class="mb-3">
                        <label for="id_tag_manager" class="form-label">ID Tag Manager Google</label>
                        <input type="text" class="form-control" id="id_tag_manager" name="id_tag_manager">
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="mb-3">
                        <label for="imagen_destacada" class="form-label">Imagen Destacada</label>
                        <input type="file" name="imagen_destacada" id="imagen_destacada" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success w-100">Crear showroom</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
