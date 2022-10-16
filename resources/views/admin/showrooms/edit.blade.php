@extends('admin.layouts.app')
<style>
    trix-editor{
        min-height: 200px;
        height: 200px;
        max-height: 200px;
    }
</style>
@section('content')
<div class="container">
    <div class="card p-4">
        <div class="d-flex mb-2">
            <a href="{{ route('showrooms') }}" class="text-dark"> <i class="fa-solid fa-arrow-left mr-2"></i> Volver</a>
        </div>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0 fw-bold">Editar showroom</h2>
        </div>

        @if (session('store'))
            <div class="alert alert-success alert-block d-flex justify-content-between">
                <strong>{{ session('store') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <form action="{{ route('update.showroom', $showroom->id) }}" class="row" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="col-12 col-md-8">
                <div class="mb-3">
                    <label for="nombre_showroom" class="form-label">Nombre del showroom</label>
                    <input type="text" class="form-control @error('nombre_showroom') is-invalid @enderror" id="nombre_showroom" name="nombre_showroom" value="{{ $showroom->nombre_showroom }}">
                    @error('nombre_showroom')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="ciudad_showroom" class="form-label">Ciudad del Showroom</label>
                    <input type="text" class="form-control @error('ciudad_showroom') is-invalid @enderror" id="ciudad_showroom" name="ciudad_showroom" value="{{ $showroom->ciudad_showroom }}">
                    @error('ciudad_showroom')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="numero_whatsapp" class="form-label">Número de Whatsapp</label>
                    <input id="numero_whatsapp" type="text" class="form-control @error('numero_whatsapp') is-invalid @enderror" name="numero_whatsapp" value="{{ $showroom->numero_whatsapp }}">
                    @error('numero_whatsapp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="mensaje_predeterminado_wp" class="form-label">Mensaje predeterminado Whatsapp</label>
                    <input type="text" class="form-control @error('mensaje_predeterminado_wp') is-invalid @enderror" id="mensaje_predeterminado_wp" name="mensaje_predeterminado_wp" value="{{ $showroom->mensaje_predeterminado_wp }}">
                    @error('mensaje_predeterminado_wp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="numero_llamadas" class="form-label">Número de Llamadas</label>
                    <input type="text" class="form-control @error('numero_llamadas') is-invalid @enderror" id="numero_llamadas" name="numero_llamadas" value="{{ $showroom->numero_llamadas }}">
                    @error('numero_llamadas')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="iframe_google_maps" class="form-label">Iframe Google Maps</label>
                    <input type="text" class="form-control @error('iframe_google_maps') is-invalid @enderror" id="iframe_google_maps" name="iframe_google_maps" value="{{ $showroom->iframe_google_maps }}">
                    @error('iframe_google_maps')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="direccion_showroom" class="form-label">Dirección Showroom</label>
                    <input type="text" class="form-control @error('direccion_showroom') is-invalid @enderror" id="direccion_showroom" name="direccion_showroom" value="{{ $showroom->direccion_showroom }}">
                    @error('direccion_showroom')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="como_llegar" class="form-label">¿Cómo Llegar?</label>
                    <input type="text" class="form-control @error('como_llegar') is-invalid @enderror" id="como_llegar" name="como_llegar" value="{{ $showroom->como_llegar }}">
                    @error('como_llegar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="id_tag_manager" class="form-label">ID Tag Manager Google</label>
                    <input type="text" class="form-control @error('id_tag_manager') is-invalid @enderror" id="id_tag_manager" name="id_tag_manager" value="{{ $showroom->id_tag_manager }}">
                    @error('id_tag_manager')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="mb-3">
                    <label for="imagen_destacada" class="form-label">Imagen Destacada</label>
                    <input type="file" name="imagen_destacada" id="imagen_destacada" accept=".png,.jpg,.jpeg" class="form-control">
                    @if (File::exists(public_path('storage/' . $showroom->imagen_destacada)) && $showroom->imagen_destacada != null)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $showroom->imagen_destacada) }}" class="img-fluid mt-3" style="height: 190px;object-fit: contain; width: 100%;">
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success w-100 btn_editar">Actualizar showroom</button>
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
            $('.btn_editar').click(function (e) {
                $('.btn_editar').waitMe();
            });
        });
    </script>
@endsection