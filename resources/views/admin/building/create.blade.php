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
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0 fw-bold">Nueva building</h2>
            </div>

            <form action="{{ route('store.building') }}" method="POST" enctype="multipart/form-data" class="row">
                @csrf
                <div class="col-12 col-md-8">
                    <div class="mb-3">
                        <label for="nombre_hotel" class="form-label">Nombre del hotel</label>
                        <input type="text" class="form-control" id="nombre_hotel" name="nombre_hotel">
                    </div>
                    <div class="mb-3">
                        <label for="categoria" class="form-label">Categoría</label>
                        <select name="categoria" id="categoria" class="form-select">
                            <option value="0" selected>-- Selecciona una opcion --</option>
                            <option value="lifestyle">Lifestyle</option>
                            <option value="hoteles">Hoteles</option>
                            <option value="boutiques">Boutiques</option>
                            <option value="restaurantes">Restaurantes</option>
                            <option value="residencial">Residencial</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <input id="descripcion" type="hidden" name="descripcion">
                        <trix-editor input="descripcion"></trix-editor>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="mb-3">
                        <label for="imagen_destacada" class="form-label">Imagen destacada</label>
                        <input type="file" name="imagen_destacada" id="imagen_destacada" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success w-100">Crear building</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
