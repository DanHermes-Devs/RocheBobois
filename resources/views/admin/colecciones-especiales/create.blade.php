@extends('admin.layouts.app')
<style>
    trix-editor{
        min-height: 300px!important;
        height: 100%;
        max-height: 200px;
        overflow: hidden;
    }
</style>
@section('content')
    <div class="container">
        <div class="card p-4">
            <div class="d-flex mb-2">
                <a href="{{ route('colecciones-especiales') }}" class="text-dark"> <i class="fa-solid fa-arrow-left mr-2"></i> Volver</a>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0 fw-bold">Agregar Colección</h2>
            </div>

            <form action="{{ route('store.coleccion') }}" method="POST" enctype="multipart/form-data" class="row">
                @csrf
                <div class="col-12 col-md-8">
                    <div class="mb-3">
                        <label for="nombre_disenador" class="form-label">Nombre del diseñador</label>
                        <input type="text" class="form-control @error('nombre_disenador') is-invalid @enderror" id="nombre_disenador" name="nombre_disenador" value="{{ old('nombre_disenador') }}">
                        @error('nombre_disenador')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <input id="descripcion" type="hidden" value="{{ old('nombre_disenador') }}" class="@error('descripcion') is-invalid @enderror" name="descripcion">
                        <trix-editor input="descripcion"></trix-editor>
                        @error('descripcion')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nombre_coleccion" class="form-label">Nombre de la colección</label>
                        <input type="text" class="form-control @error('nombre_coleccion') is-invalid @enderror" id="nombre_coleccion" name="nombre_coleccion" value="{{ old('nombre_coleccion') }}">
                        @error('nombre_coleccion')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="mb-3">
                        <label for="imagen_destacada" class="form-label">Imagen Destacada</label>
                        <input type="file" name="imagen_destacada" accept=".png,.jpg,.jpeg" id="imagen_destacada" class="form-control">
                        @error('imagen_destacada')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="foto_disenador" class="form-label">Foto diseñador</label>
                        <input type="file" name="foto_disenador" accept=".png,.jpg,.jpeg" id="foto_disenador" class="form-control">
                        @error('foto_disenador')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="galeria" class="form-label">Galería</label>
                        <input type="file" name="galeria[]" multiple accept=".png,.jpg,.jpeg" id="galeria" class="form-control">
                        @error('galeria')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success w-100 btn_crear">Crear colección</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
