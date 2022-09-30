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
                <a href="{{ route('subcategorias') }}" class="text-dark"> <i class="fa-solid fa-arrow-left mr-2"></i> Volver</a>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0 fw-bold">Editar subcategoría</h2>
            </div>

            @if (session('store'))
                <div class="alert alert-success alert-block d-flex justify-content-between">
                    <strong>{{ session('store') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <form action="{{ route('update.subcategoria', $subcategoria->id) }}" method="POST" enctype="multipart/form-data" class="row">
                @csrf
                @method('PUT')
                <div class="col-12 col-md-8">
                    {{-- Mostramos las categorias padre --}}
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Categoría padre</label>
                        <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                            <option value="">Seleccione una categoría</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}" {{ $subcategoria->category_id == $categoria->id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre de la subcategoría</label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ $subcategoria->nombre }}">
                        @error('nombre')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="mb-3">
                        <label for="imagen_destacada" class="form-label">Imagen destacada</label>
                        <input type="file" name="imagen_destacada" id="imagen_destacada" class="form-control @error('imagen_destacada') is-invalid @enderror">
                        @error('imagen_destacada')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        @if (File::exists(public_path('storage/' . $subcategoria->imagen_destacada)) && $subcategoria->imagen_destacada != null)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $subcategoria->imagen_destacada) }}" alt="" class="img-fluid mt-3" style="height: 190px;object-fit: contain; width: 100%;">
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success w-100">Actualizar subcategoría</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
