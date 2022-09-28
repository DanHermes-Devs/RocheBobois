@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row card p-4">
            <div class="d-flex mb-2">
                <a href="{{ route('productos') }}" class="text-dark"> <i class="fa-solid fa-arrow-left mr-2"></i> Volver</a>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0 fw-bold">Editar producto</h2>
            </div>

            @if (session('store'))
                <div class="alert alert-success alert-block d-flex justify-content-between">
                    <strong>{{ session('store') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('update.producto', $producto->id) }}" method="POST" enctype="multipart/form-data" class="row">
                @csrf
                @method('PUT')
                <div class="col-12 col-md-8">
                    <div class="mb-3">
                        <label for="nombre_producto" class="form-label">Nombre del Producto</label>
                        <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" value="{{ $producto->nombre_producto }}">
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <input id="descripcion" type="hidden" name="descripcion" value="{{ $producto->descripcion }}">
                        <trix-editor input="descripcion"></trix-editor>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion_corta" class="form-label">Descripción corta</label>
                        <input id="descripcion_corta" type="hidden" name="descripcion_corta" value="{{ $producto->descripcion_corta }}">
                        <trix-editor input="descripcion_corta"></trix-editor>
                    </div>
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="number" class="form-control" id="precio" name="precio" step="any" value="{{ $producto->precio }}">
                    </div>
                    <div class="mb-3">
                        <label for="precio_descuento" class="form-label">Precio con descuento</label>
                        <input type="number" class="form-control" id="precio_descuento" name="precio_descuento" step="any" value="{{ $producto->precio_descuento }}">
                    </div>
                    <div class="mb-3">
                        <label for="mostrar_en_sales" class="form-label">Mostrar en Sales</label>
                        <select class="form-control" id="mostrar_en_sales" name="mostrar_en_sales">
                            <option selected>-- Selecciona una opción --</option>
                            <option value="1" {{ $producto->mostrar_en_sales == 1 ? 'selected' : '' }}>Sí</option>
                            <option value="0" {{ $producto->mostrar_en_sales == 0 ? 'selected' : '' }}>No</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="mb-3">
                        <label for="imagen_destacada" class="form-label">Imagen Destacada</label>
                        <input type="file" name="imagen_destacada" accept=".png,.jpg,.jpeg" id="imagen_destacada" class="form-control">
                        @if (File::exists(public_path('storage/' . $producto->imagen_destacada)) && $producto->imagen_destacada != null)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $producto->imagen_destacada) }}" alt="" class="img-fluid mt-3">
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
                                <div class="d-flex flex-wrap" style="row-gap: 10px;">
                                    @foreach ($galeria as $galeria_img)
                                        <img src="{{ asset('storage/'.$galeria_img) }}" alt="{{ $producto->nombre_producto }}" class="img-fluid w-50" style="object-fit: cover;">
                                    @endforeach
                                </div>
                            </div>
                            
                        @endif
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success w-100 btn-editar">Editar producto</button>
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