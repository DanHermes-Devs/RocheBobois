@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center dashboard__card p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0 fw-bold">Nuevo slider</h2>
            </div>

            <form action="{{ route('store.slider') }}" method="POST" enctype="multipart/form-data" class="row">
                @csrf
                <div class="col-12 col-md-8">
                    <div class="mb-3">
                        <label for="nombre_disenador" class="form-label">Nombre del diseñador</label>
                        <input type="text" class="form-control" id="nombre_disenador" name="nombre_disenador">
                    </div>
                    <div class="mb-3">
                        <label for="nombre_producto" class="form-label">Nombre del producto</label>
                        <input type="text" class="form-control" id="nombre_producto" name="nombre_producto">
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="mb-3">
                        <label for="imagen_destacada" class="form-label">Imagen Destacada</label>
                        <input type="file" name="imagen_destacada" id="imagen_destacada" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success w-100">Crear slider</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
