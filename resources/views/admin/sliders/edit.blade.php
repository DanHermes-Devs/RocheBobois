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
                <a href="{{ route('sliders') }}" class="text-dark"> <i class="fa-solid fa-arrow-left mr-2"></i> Volver</a>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0 fw-bold">Editar slider</h2>
            </div>

            @if (session('store'))
                <div class="alert alert-success alert-block d-flex justify-content-between">
                    <strong>{{ session('store') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <form action="{{ route('update.slider', $slider->id) }}" method="POST" enctype="multipart/form-data" class="row">
                @csrf
                @method('PUT')
                <div class="col-12 col-md-8">
                    <div class="mb-3">
                        <label for="nombre_disenador" class="form-label">Nombre del diseñador</label>
                        <input type="text" class="form-control @error('nombre_disenador') is-invalid @enderror" id="nombre_disenador" name="nombre_disenador" value="{{ $slider->nombre_disenador }}">
                        @error('nombre_disenador')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nombre_producto" class="form-label">Nombre del producto</label>
                        <input type="text" class="form-control @error('nombre_producto') is-invalid @enderror" id="nombre_producto" name="nombre_producto" value="{{ $slider->nombre_producto }}">
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
                        @if (File::exists(public_path('storage/' . $slider->imagen_destacada)) && $slider->imagen_destacada != null)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $slider->imagen_destacada) }}" class="img-fluid mt-3" style="height: 190px;object-fit: contain; width: 100%;">
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success w-100 btn_editar">Actualizar slider</button>
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
@endsection