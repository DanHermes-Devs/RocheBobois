@extends('admin.layouts.app')
<style>
    trix-editor {
        min-height: 200px;
        height: 200px;
        max-height: 200px;
    }
</style>
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center dashboard__card p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0 fw-bold">Nuevo producto</h2>
            </div>

            <form action="{{ route('store.producto') }}" method="POST" enctype="multipart/form-data" class="row">
                @csrf
                <div class="col-12 col-md-8">
                    <div class="mb-3">
                        <label for="nombre_producto" class="form-label">Nombre del Producto</label>
                        <input type="text" class="form-control" id="nombre_producto" name="nombre_producto">
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <input id="descripcion" type="hidden" name="descripcion">
                        <trix-editor input="descripcion"></trix-editor>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion_corta" class="form-label">Descripción corta</label>
                        <input id="descripcion_corta" type="hidden" name="descripcion_corta">
                        <trix-editor input="descripcion_corta"></trix-editor>
                    </div>
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="number" class="form-control" id="precio" name="precio" step="any">
                    </div>
                    <div class="mb-3">
                        <label for="precio_descuento" class="form-label">Precio con descuento</label>
                        <input type="number" class="form-control" id="precio_descuento" name="precio_descuento" step="any">
                    </div>
                    <div class="mb-3">
                        <label for="mostrar_en_sales" class="form-label">Mostrar en Sales</label>
                        <select class="form-select" id="mostrar_en_sales" name="mostrar_en_sales">
                            <option selected>-- Selecciona una opción --</option>
                            <option value="1">Sí</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="oportunidad_unica" class="form-label">¿Oportunidad única?</label>
                        <select class="form-select" id="oportunidad_unica" name="oportunidad_unica">
                            <option selected value="2">-- Selecciona una opción --</option>
                            <option value="1">Sí</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="coleccion_pertenece" class="form-label">¿Ah qué colección pertenece?</label>
                        <select class="form-select" id="coleccion_pertenece" name="coleccion_pertenece">
                            <option selected value="0">-- Selecciona una opción --</option>
                            @foreach ($colecciones as $coleccion)
                                <option value="{{ $coleccion->id }}">{{ $coleccion->nombre_disenador }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="mb-3">
                        <label for="imagen_destacada" class="form-label">Imagen Destacada</label>
                        <input type="file" name="imagen_destacada" id="imagen_destacada" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="imagen_1" class="form-label">Imagen 1</label>
                        <input type="file" name="imagen_1" accept=".png,.jpg,.jpeg" id="imagen_1" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="imagen_2" class="form-label">Imagen 2</label>
                        <input type="file" name="imagen_2" accept=".png,.jpg,.jpeg" id="imagen_2" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="imagen_3" class="form-label">Imagen 3</label>
                        <input type="file" name="imagen_3" accept=".png,.jpg,.jpeg" id="imagen_3" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="imagen_4" class="form-label">Imagen 4</label>
                        <input type="file" name="imagen_4" accept=".png,.jpg,.jpeg" id="imagen_4" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="imagen_5" class="form-label">Imagen 5</label>
                        <input type="file" name="imagen_5" accept=".png,.jpg,.jpeg" id="imagen_5" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="imagen_6" class="form-label">Imagen 6</label>
                        <input type="file" name="imagen_6" accept=".png,.jpg,.jpeg" id="imagen_6"
                            class="form-control">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success w-100">Crear producto</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
