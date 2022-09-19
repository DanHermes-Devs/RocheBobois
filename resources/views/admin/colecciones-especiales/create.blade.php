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
                <a href="{{ route('colecciones-especiales') }}" class="text-dark"> <i class="fa-solid fa-arrow-left mr-2"></i> Volver</a>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0 fw-bold">Nueva colección especial</h2>
            </div>

            <form action="{{ route('store.coleccion') }}" method="POST" enctype="multipart/form-data" class="row">
                @csrf
                <div class="col-12 col-md-8">
                    <div class="mb-3">
                        <label for="nombre_disenador" class="form-label">Nombre del diseñador</label>
                        <input type="text" class="form-control" id="nombre_disenador" name="nombre_disenador">
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <input id="descripcion" type="hidden" name="descripcion">
                        <trix-editor input="descripcion"></trix-editor>
                    </div>
                    <div class="mb-3">
                        <label for="nombre_coleccion" class="form-label">Nombre de la colección</label>
                        <input type="text" class="form-control" id="nombre_coleccion" name="nombre_coleccion">
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="mb-3">
                        <label for="imagen_destacada" class="form-label">Imagen destacada</label>
                        <input type="file" name="imagen_destacada" accept=".png,.jpg,.jpeg" id="imagen_destacada" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="foto_disenador" class="form-label">Foto diseñador</label>
                        <input type="file" name="foto_disenador" accept=".png,.jpg,.jpeg" id="foto_disenador" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="galeria" class="form-label">Galería</label>
                        <input type="file" name="galeria[]" multiple accept=".png,.jpg,.jpeg" id="galeria" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success w-100">Crear colección</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
