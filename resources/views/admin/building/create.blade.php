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
                <a href="{{ route('building') }}" class="text-dark"> <i class="fa-solid fa-arrow-left mr-2"></i> Volver</a>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0 fw-bold">Agregar building</h2>
            </div>

            <form action="{{ route('store.building') }}" method="POST" enctype="multipart/form-data" class="row">
                @csrf
                <div class="col-12 col-md-8">
                    <div class="mb-3">
                        <label for="nombre_hotel" class="form-label">Nombre del building</label>
                        <input type="text" class="form-control @error('nombre_hotel') is-invalid @enderror" id="nombre_hotel" name="nombre_hotel" value="{{ old('nombre_hotel') }}">
                        @error('nombre_hotel')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="categoria_id" class="form-label">Categoría</label>
                        <select name="categoria_id" id="categoria_id" class="form-control @error('categoria_id') is-invalid @enderror">
                            <option value="" selected>-- Selecciona una opcion --</option>
                            @foreach ($buildingCategorias as $buildingCategoria)
                                <option value="{{ $buildingCategoria->id }}">{{ $buildingCategoria->nombre }}</option>
                            @endforeach
                        </select>
                        @error('categoria_id')
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
                </div>

                <div class="col-12 col-md-4">
                    <div class="mb-3">
                        <label for="imagen_destacada" class="form-label">Imagen Destacada</label>
                        <input type="file" name="imagen_destacada" accept=".png,.jpg,.jpeg" id="imagen_destacada" class="form-control @error('imagen_destacada') is-invalid @enderror">
                        @error('imagen_destacada')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="galeria" class="form-label">Galería</label>
                        <input type="file" name="galeria[]" multiple accept=".png,.jpg,.jpeg" id="galeria" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success w-100 btn_crear">Crear building</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
