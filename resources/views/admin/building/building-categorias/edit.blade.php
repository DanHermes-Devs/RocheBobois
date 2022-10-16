@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="card p-4">
            <div class="d-flex mb-2">
                <a href="{{ route('building-categories') }}" class="text-dark"> <i class="fa-solid fa-arrow-left mr-2"></i> Volver</a>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0 fw-bold">Editar categoría</h2>
            </div>

            @if (session('store'))
                <div class="alert alert-success alert-block d-flex justify-content-between">
                    <strong>{{ session('store') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <form action="{{ route('update.building-category', $categoria->id) }}" method="POST" enctype="multipart/form-data" class="row">
                @csrf
                @method('PUT')
                <div class="col-12 col-md-8">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre de la categoría</label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ $categoria->nombre }}">
                        @error('nombre')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="mb-3">
                        <label for="imagen_destacada" class="form-label">Imagen Destacada</label>
                        <input type="file" name="imagen_destacada" accept=".png, .jpg, .jpeg" class="form-control @error('imagen_destacada') is-invalid @enderror">
                        @error('imagen_destacada')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        {{-- Mostramos la imagen actual --}}
                        @if (File::exists(public_path('storage/' . $categoria->imagen_destacada)) && $categoria->imagen_destacada != null)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $categoria->imagen_destacada) }}" alt="" class="img-fluid mt-3" style="height: 190px;object-fit: contain; width: 100%;">
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success w-100 btn_editar">Actualizar categoría</button>
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
