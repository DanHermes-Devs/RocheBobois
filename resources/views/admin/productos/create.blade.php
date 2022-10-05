@extends('admin.layouts.app')
<style>
    trix-editor {
        min-height: 200px;
        height: 200px;
        max-height: 200px;
    }
</style>
@section('content')
    <div class="container">
        <div class="card p-4">
            <div class="d-flex mb-2">
                <a href="{{ route('productos') }}" class="text-dark"> <i class="fa-solid fa-arrow-left mr-2"></i> Volver</a>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0 fw-bold">Agregar producto</h2>
            </div>

            <form action="{{ route('store.producto') }}" method="POST" enctype="multipart/form-data" class="row">
                @csrf
                <div class="col-12 col-md-8">
                    <div class="mb-3">
                        <label for="nombre_producto" class="form-label">Nombre del Producto</label>
                        <input type="text" class="form-control @error('nombre_producto') is-invalid @enderror" id="nombre_producto" name="nombre_producto" value="{{ old('nombre_producto') }}">
                        @error('nombre_producto')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <input id="descripcion" type="hidden" name="descripcion" class="@error('descripcion') is-invalid @enderror" value="{{ old('descripcion') }}">
                        <trix-editor input="descripcion"></trix-editor>
                        @error('descripcion')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="text" class="form-control @error('precio') is-invalid @enderror" id="precio" name="precio" value="{{ old('precio') }}">
                        @error('precio')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="precio_descuento" class="form-label">Precio con descuento</label>
                        <input type="text" class="form-control" id="precio_descuento" name="precio_descuento" value="{{ old('precio_descuento') }}">
                    </div>
                    <hr class="my-4">
                    <div class="mb-3">
                        <label for="mostrar_en_sales" class="form-label">Mostrar en Sales</label>
                        <select class="form-control @error('mostrar_en_sales') is-invalid @enderror" id="mostrar_en_sales" name="mostrar_en_sales">
                            <option value="">-- Selecciona una opción --</option>
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </select>
                        @error('mostrar_en_sales')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="best_seller" class="form-label">¿Es Best Seller? (Si aplica)</label>
                        <select class="form-control" id="best_seller" name="best_seller">
                            <option value="">-- Selecciona una opción --</option>
                            @foreach ($sellerBest as $bestSeller)
                                <option value="{{ $bestSeller->id }}">{{ $bestSeller->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="home_office" class="form-label">¿Es home office? (Si aplica)</label>
                        <select class="form-control" id="home_office" name="home_office">
                            <option value="">-- Selecciona una opción --</option>
                            @foreach ($homeOffices as $homeOffice)
                            {{$homeOffice->id }}
                                <option value="{{ $homeOffice->id }}">{{ $homeOffice->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="oportunidad_unica" class="form-label">¿Es oportunidad única? (Si aplica)</label>
                        <select class="form-control" id="oportunidad_unica" name="oportunidad_unica">
                            <option value="">-- Selecciona una opción --</option>
                            <option value="1">Sí</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="coleccion_pertenece" class="form-label">¿Ah qué colección pertenece? (Si aplica)</label>
                        <select class="form-control" id="coleccion_pertenece" name="coleccion_pertenece">
                            <option value="">-- Selecciona una opción --</option>
                            @foreach ($colecciones as $coleccion)
                                <option value="{{ $coleccion->id }}">{{ $coleccion->nombre_disenador }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    {{-- Mostrar las subcategorias en checkbox con su categoria padre --}}
                    {{-- <div class="mb-3 border p-3">
                        <div class="row">
                            <label for="subcategorias" class="form-label">Categorías</label>
                            @foreach ($categorias as $categoria)
                                <div class="col-12">
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" value="{{ $categoria->id }}"
                                        id="categoria_{{ $categoria->id }}" name="categorias[]">
                                        <label class="form-check-label" for="categoria_{{ $categoria->id }}">
                                            {{ $categoria->nombre }}
                                        </label>
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
                    </div> --}}
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Categoría</label>
                        <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id" value="{{ old('category_id') }}">
                            <option value="">-- Selecciona una opción --</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}" {{ old('category_id') == $categoria->id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="subcategory_id" class="form-label">Subcategoría</label>
                        {{-- Cargar la subcategoria por ajax dependiendo de la categoria padre --}}
                        <select class="form-control" id="subcategory_id" name="subcategory_id" value="{{ old('subcategory_id') }}">
                            <option value="">-- Selecciona una opción --</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="imagen_destacada" class="form-label">Imagen Destacada</label>
                        <input type="file" name="imagen_destacada" id="imagen_destacada" accept=".png,.jpg,.jpeg" class="form-control @error('imagen_destacada') is-invalid @enderror">
                        @error('imagen_destacada')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="galeria" class="form-label">Galería</label>
                        <input type="file" name="galeria[]" id="galeria" accept=".png,.jpg,.jpeg" class="form-control" multiple>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success w-100 btn_crear">Crear producto</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
{{-- Cargar la subcategoria por ajax dependiendo de la categoria padre --}}
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#category_id').change(function () {
            let categoria_id = $(this).val();

            let route = "{{ route('subcategorias.fetch', ':id') }}";
            let url = route.replace(':id', categoria_id);

            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    console.log(data.subcategorias);
                    $('#subcategory_id').empty();
                    $('#subcategory_id').append('<option selected value="0">-- Selecciona una subcategoría --</option>');
                    // Si la categoria tiene subcategorias
                    if (data.subcategorias.length > 0) {
                        $.each(data.subcategorias, function (key, value) {
                            $('#subcategory_id').append('<option value="' + value.id + '">' + value.nombre + '</option>');
                        });
                    }
                    // Si la categoria no tiene subcategorias
                    else {
                        $('#subcategory_id').empty();
                        $('#subcategory_id').append('<option value="0">No hay subcategorías</option>');
                    }
                }
            });
        });
    });
</script>
@endsection
