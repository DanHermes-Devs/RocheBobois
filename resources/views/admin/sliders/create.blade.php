@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="card p-4">
        <div class="d-flex mb-2">
            <a href="{{ route('sliders') }}" class="text-dark"> <i class="fa-solid fa-arrow-left mr-2"></i> Volver</a>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0 fw-bold">Agregar slider</h2>
        </div>

        <form action="{{ route('store.slider') }}" method="POST" enctype="multipart/form-data" class="row">
            @csrf
            <div class="col-12 col-md-8">
                <div class="mb-3">
                    <label for="nombre_disenador" class="form-label">Nombre del diseñador</label>
                    <input type="text" class="form-control @error('nombre_disenador') is-invalid @enderror" id="nombre_disenador" name="nombre_disenador" value="{{ old('nombre_disenador') }}">
                    @error('nombre_disenador')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nombre_producto" class="form-label">Nombre del producto</label>
                    <input type="text" class="form-control @error('nombre_producto') is-invalid @enderror" id="nombre_producto" name="nombre_producto" value="{{ old('nombre_producto') }}">
                    @error('nombre_producto')
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
                    <button type="submit" class="btn btn-success w-100 btn_crear">Crear slider</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
