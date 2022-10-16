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
                <h2 class="mb-0 fw-bold">Editar producto</h2>
            </div>

            @if (session('store'))
                <div class="alert alert-success alert-block d-flex justify-content-between">
                    <strong>{{ session('store') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <form action="{{ route('update.producto', $producto->id) }}" method="POST" enctype="multipart/form-data" class="row">
                @csrf
                @method('PUT')
                <div class="col-12 col-md-8">
                    <div class="mb-3">
                        <label for="nombre_producto" class="form-label">Nombre del Producto</label>
                        <input type="text" class="form-control @error('nombre_producto') is-invalid @enderror" id="nombre_producto" name="nombre_producto" value="{{ $producto->nombre_producto }}">
                        @error('nombre_producto')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <input id="descripcion" type="hidden" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" value="{{ $producto->descripcion }}">
                        <trix-editor input="descripcion"></trix-editor>
                        @error('descripcion')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="text" class="form-control @error ('precio') is-invalid @enderror" id="precio" name="precio" value="{{ $producto->precio }}">
                        @error('precio')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="precio_descuento" class="form-label">Precio con descuento</label>
                        <input type="text" class="form-control" id="precio_descuento" name="precio_descuento" value="{{ $producto->precio_descuento }}">
                    </div>
                    <hr class="my-4">
                    <div class="mb-3">
                        <label for="mostrar_en_sales" class="form-label">Mostrar en Sales</label>
                        <select class="form-control @error ('mostrar_en_sales') is-invalid @enderror" id="mostrar_en_sales" name="mostrar_en_sales">
                            <option selected>-- Selecciona una opción --</option>
                            <option value="1" {{ $producto->mostrar_en_sales == 1 ? 'selected' : '' }}>Si</option>
                            <option value="0" {{ $producto->mostrar_en_sales == 0 ? 'selected' : '' }}>No</option>
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
                            {{-- Si no viene nada en sellerBest --}}
                            @foreach ($sellerBest as $bestSeller)
                                <option value="{{ $bestSeller->id }}" {{ $producto->best_seller == $bestSeller->id ? 'selected' : '' }}>{{ $bestSeller->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="home_office" class="form-label">¿Es home office? (Si aplica)</label>
                        <select class="form-control" id="home_office" name="home_office">
                            <option value="">-- Selecciona una opción --</option>
                            @foreach ($homeOffices as $homeOffice)
                                <option value="{{ $homeOffice->id }}" {{ $producto->home_office == $homeOffice->id ? 'selected' : '' }}>{{ $homeOffice->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="oportunidad_unica" class="form-label">¿Es oportunidad única? (Si aplica)</label>
                        <select class="form-control" id="oportunidad_unica" name="oportunidad_unica">
                            <option value="2" {{ $producto->oportunidad_unica == 2 ? 'selected' : '' }}>-- Selecciona una opción --</option>
                            <option value="1" {{ $producto->oportunidad_unica == 1 ? 'selected' : '' }}>Sí</option>
                            <option value="0" {{ $producto->oportunidad_unica == 0 ? 'selected' : '' }}>No</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="coleccion_pertenece" class="form-label">¿Ah qué colección pertenece? (Si aplica)</label>
                        <select class="form-control" id="coleccion_pertenece" name="coleccion_pertenece">
                            <option value="">-- Selecciona una opción --</option>
                            @foreach ($colecciones as $coleccion)
                                <option value="{{ $coleccion->id }}" {{ $producto->coleccion_pertenece == $coleccion->id ? 'selected' : '' }}>{{ $coleccion->nombre_coleccion }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Categoría</label>
                        <select class="form-control @error ('category_id') is-invalid @enderror" id="category_id" name="category_id">
                            <option selected>-- Selecciona una opción --</option>
                            @foreach ($categoria as $cat)
                                <option value="{{ $cat->id }}" {{ $producto->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->nombre }}</option>
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
                            @foreach ($subcategoria as $subcat)
                                <option value="{{ $subcat->id }}" {{ $producto->subcategory_id == $subcat->id ? 'selected' : '' }}>{{ $subcat->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="imagen_destacada" class="form-label">Imagen Destacada</label>
                        <input type="file" name="imagen_destacada" accept=".png,.jpg,.jpeg" id="imagen_destacada" class="form-control @error ('imagen_destacada') is-invalid @enderror">
                        @error('imagen_destacada')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        @if (File::exists(public_path('storage/' . $producto->imagen_destacada)) && $producto->imagen_destacada != null)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $producto->imagen_destacada) }}" alt="" class="img-fluid mt-3" style="height: 190px;object-fit: contain; width: 100%;">
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="galeria" class="form-label">Galería</label>
                        <input type="file" name="galeria[]" multiple accept=".png,.jpg,.jpeg" id="galeria" class="form-control">
                        @if ($producto->galeria != null)
                            <div class="mt-2 d-flex flex-wrap">
                                @php
                                    $galeria = json_decode($producto->galeria);
                                @endphp
                                <div class="d-grid">
                                    @foreach ($galeria as $galeria_img)
                                        <img src="{{ asset('storage/'.$galeria_img) }}" alt="{{ $producto->nombre_producto }}" class="img-fluid" style="object-fit: cover;height: 100%;width: 100px;">
                                    @endforeach
                                </div>
                            </div>
                            
                        @endif
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success w-100 btn_editar">Actualizar producto</button>
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
@endsection