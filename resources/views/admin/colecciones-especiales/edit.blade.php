@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center dashboard__card p-4">
            <div class="d-flex mb-2">
                <a href="{{ route('colecciones-especiales') }}" class="text-dark"> <i class="fa-solid fa-arrow-left mr-2"></i> Volver</a>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0 fw-bold">Editar colección especial</h2>
            </div>

            @if (session('store'))
                <div class="alert alert-success alert-block d-flex justify-content-between">
                    <strong>{{ session('store') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            <form action="{{ route('update.coleccion', $coleccion->id) }}" method="POST" enctype="multipart/form-data" class="row">
                @csrf
                @method('PUT')
                <div class="col-12 col-md-8">
                    <div class="mb-3">
                        <label for="nombre_disenador" class="form-label">Nombre del diseñador</label>
                        <input type="text" class="form-control" id="nombre_disenador" name="nombre_disenador" value="{{ $coleccion->nombre_disenador }}">
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <input id="descripcion" type="hidden" name="descripcion" value="{{ $coleccion->descripcion }}">
                        <trix-editor input="descripcion"></trix-editor>
                    </div>
                    <div class="mb-3">
                        <label for="nombre_coleccion" class="form-label">Nombre de la colección</label>
                        <input type="text" class="form-control" id="nombre_coleccion" name="nombre_coleccion" value="{{ $coleccion->nombre_coleccion }}">
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="mb-3">
                        <label for="imagen_destacada" class="form-label">Imagen destacada</label>
                        <input type="file" name="imagen_destacada" accept=".png,.jpg,.jpeg" id="imagen_destacada" class="form-control">
                        @if (File::exists(public_path('storage/' . $coleccion->imagen_destacada)) && $coleccion->imagen_destacada != null)
                            <div class="mt-2">
                                <img src="{{ asset('storage/'.$coleccion->imagen_destacada) }}" alt="{{ $coleccion->nombre_disenador }}" class="img-fluid w-50">
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="foto_disenador" class="form-label">Foto diseñador</label>
                        <input type="file" name="foto_disenador" accept=".png,.jpg,.jpeg" id="foto_disenador" class="form-control">
                        @if (File::exists(public_path('storage/' . $coleccion->foto_disenador)) && $coleccion->foto_disenador != null)
                            <div class="mt-2">
                                <img src="{{ asset('storage/'.$coleccion->foto_disenador) }}" alt="{{ $coleccion->nombre_disenador }}" class="img-fluid w-50">
                            </div>
                        @endif
                    </div>
                    
                    <div class="mb-3">
                        <label for="galeria" class="form-label">Galería</label>
                        <input type="file" name="galeria[]" multiple accept=".png,.jpg,.jpeg" id="galeria" class="form-control">
                        @if ($coleccion->img_galeria != null)
                            <div class="mt-2 d-flex flex-wrap">
                                @php
                                    $galeria = json_decode($coleccion->img_galeria);
                                @endphp
                                @foreach ($galeria as $galeria_img)
                                    <img src="{{ asset('storage/'.$galeria_img) }}" alt="{{ $coleccion->nombre_disenador }}" class="img-fluid w-50" style="object-fit: cover;">
                                @endforeach
                            </div>
                            
                        @endif
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success w-100 btn-editar">Editar colección</button>
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