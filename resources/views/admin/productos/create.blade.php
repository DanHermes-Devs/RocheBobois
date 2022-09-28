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
        <div class="row card p-4">
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
                        <select class="form-control" id="mostrar_en_sales" name="mostrar_en_sales">
                            <option>-- Selecciona una opción --</option>
                            <option value="1">Sí</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    {{-- Mostrar las subcategorias en checkbox con su categoria padre --}}
                    <div class="mb-3 border p-3">
                        <div class="row">

                            <label for="subcategorias" class="form-label">Categorías</label>
                            @foreach ($categorias as $categoria)
                                {{-- Checkbox de la categoria padre --}}
                                <div class="col-12">
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" value="{{ $categoria->id }}"
                                        id="categoria_{{ $categoria->id }}" name="categorias[]">
                                        <label class="form-check-label" for="categoria_{{ $categoria->id }}">
                                            {{ $categoria->nombre }}
                                        </label>

                                        {{-- Seguido de su checkbox de las subcategorias --}}
                                        @foreach ($subcategorias as $subcategoria)
                                            @if ($subcategoria->category_id == $categoria->id)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        value="{{ $subcategoria->id }}"
                                                        id="subcategoria_{{ $subcategoria->id }}"
                                                        name="subcategorias[]">
                                                    <label class="form-check-label"
                                                        for="subcategoria_{{ $subcategoria->id }}">
                                                        {{ $subcategoria->nombre }}
                                                    </label>
                                                </div>
                                            @endif
                                        @endforeach 
                                    </div>
                                </div>                              
                            @endforeach
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="imagen_destacada" class="form-label">Imagen Destacada</label>
                        <input type="file" name="imagen_destacada" id="imagen_destacada" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="galeria" class="form-label">Galería</label>
                        <input type="file" name="galeria[]" id="galeria" class="form-control" multiple>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success w-100">Crear producto</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
