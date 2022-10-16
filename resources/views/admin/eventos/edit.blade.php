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
                <a href="{{ route('eventos') }}" class="text-dark"> <i class="fa-solid fa-arrow-left mr-2"></i> Volver</a>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0 fw-bold">Editar evento</h2>
            </div>

            @if (session('store'))
                <div class="alert alert-success alert-block d-flex justify-content-between">
                    <strong>{{ session('store') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <form action="{{ route('update.evento', $evento->id) }}" method="POST" enctype="multipart/form-data" class="row">
                @csrf
                @method('PUT')
                <div class="col-12 col-md-8">
                    <div class="mb-3">
                        <label for="nombre_evento" class="form-label">Nombre del evento</label>
                        <input type="text" class="form-control @error('nombre_evento') is-invalid @enderror" id="nombre_evento" name="nombre_evento" value="{{ $evento->nombre_evento }}">
                        @error('nombre_evento')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <input id="descripcion" type="hidden" name="descripcion" class="@error('descripcion') is-invalid @enderror" value="{{ $evento->descripcion }}">
                        <trix-editor input="descripcion"></trix-editor>
                        @error('descripcion')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="categoria" class="form-label">Categoría</label>
                        <select class="form-control @error('categoria') is-invalid @enderror" id="categoria" name="categoria">
                            <option selected>-- Selecciona una categoría --</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}" {{ $evento->categoria_id == $categoria->id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                        @error('categoria')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha</label>
                        <input type="date" class="form-control @error('fecha') is-invalid @enderror" id="fecha" name="fecha" value="{{ $evento->fecha }}">
                        @error('fecha')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="hora" class="form-label">Hora</label>
                        <input type="time" class="form-control @error('hora') is-invalid @enderror" id="hora" name="hora" value="{{ $evento->hora }}">
                        @error('hora')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="mb-3">
                        <label for="imagen_destacada" class="form-label">Imagen Destacada</label>
                        <input type="file" name="imagen_destacada" accept=".png, .jpg, .jpeg" class="form-control" id="imagen_destacada">
                        {{-- Mostramos la imagen actual --}}
                        @if (File::exists(public_path('storage/' . $evento->imagen_destacada)) && $evento->imagen_destacada != null)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $evento->imagen_destacada) }}" alt="" class="img-fluid mt-3" style="height: 190px;object-fit: contain; width: 100%;">
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success w-100 btn_editar">Actualizar evento</button>
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
