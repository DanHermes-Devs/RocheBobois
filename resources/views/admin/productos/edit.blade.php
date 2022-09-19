@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center dashboard__card p-4">
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
                        <label for="mostrar_en_sales" class="form-label">Mostrar en Sales</label>
                        <select class="form-select" id="mostrar_en_sales" name="mostrar_en_sales">
                            <option selected>-- Selecciona una opción --</option>
                            <option value="1" {{ $producto->mostrar_en_sales == 1 ? 'selected' : '' }}>Sí</option>
                            <option value="0" {{ $producto->mostrar_en_sales == 0 ? 'selected' : '' }}>No</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="coleccion_pertenece" class="form-label">¿Ah qué colección pertenece?</label>
                        <select class="form-select" id="coleccion_pertenece" name="coleccion_pertenece">
                            <option selected value="0">-- Selecciona una opción --</option>
                            @foreach ($colecciones as $coleccion)
                                <option value="{{ $coleccion->id }}" {{ $producto->coleccion_pertenece == $coleccion->id ? 'selected' : '' }}>{{ $coleccion->nombre_coleccion }}</option>
                            @endforeach
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
                        <label for="imagen_1" class="form-label">Imagen 1</label>
                        <input type="file" name="imagen_1" accept=".png,.jpg,.jpeg" id="imagen_1" class="form-control">
                        @if (File::exists(public_path('storage/' . $producto->imagen_1)) && $producto->imagen_1 != null)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $producto->imagen_1) }}" alt="" class="img-fluid mt-3">
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="imagen_2" class="form-label">Imagen 2</label>
                        <input type="file" name="imagen_2" accept=".png,.jpg,.jpeg" id="imagen_2" class="form-control">
                        @if (File::exists(public_path('storage/' . $producto->imagen_2)) && $producto->imagen_2 != null)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $producto->imagen_2) }}" alt="" class="img-fluid mt-3">
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="imagen_3" class="form-label">Imagen 3</label>
                        <input type="file" name="imagen_3" accept=".png,.jpg,.jpeg" id="imagen_3" class="form-control">
                        @if (File::exists(public_path('storage/' . $producto->imagen_3)) && $producto->imagen_3 != null)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $producto->imagen_3) }}" alt="" class="img-fluid mt-3">
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="imagen_4" class="form-label">Imagen 4</label>
                        <input type="file" name="imagen_4" accept=".png,.jpg,.jpeg" id="imagen_4" class="form-control">
                        @if (File::exists(public_path('storage/' . $producto->imagen_4)) && $producto->imagen_4 != null)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $producto->imagen_4) }}" alt="" class="img-fluid mt-3">
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="imagen_5" class="form-label">Imagen 5</label>
                        <input type="file" name="imagen_5" accept=".png,.jpg,.jpeg" id="imagen_5" class="form-control">
                        @if (File::exists(public_path('storage/' . $producto->imagen_5)) && $producto->imagen_5 != null)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $producto->imagen_5) }}" alt="" class="img-fluid mt-3">
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="imagen_6" class="form-label">Imagen 6</label>
                        <input type="file" name="imagen_6" accept=".png,.jpg,.jpeg" id="imagen_6" class="form-control">
                        @if (File::exists(public_path('storage/' . $producto->imagen_6)) && $producto->imagen_6 != null)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $producto->imagen_6) }}" alt="" class="img-fluid mt-3">
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