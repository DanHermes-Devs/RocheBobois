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
                <h2 class="mb-0 fw-bold">Editar building</h2>
            </div>

            @if (session('store'))
                <div class="alert alert-success alert-block d-flex justify-content-between">
                    <strong>{{ session('store') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <form action="{{ route('update.building', $building->id) }}" method="POST" enctype="multipart/form-data" class="row">
                @csrf
                @method('PUT')
                <div class="col-12 col-md-8">
                    <div class="mb-3">
                        <label for="nombre_hotel" class="form-label">Nombre del building</label>
                        <input type="text" class="form-control @error('nombre_hotel') is-invalid @enderror" id="nombre_hotel" name="nombre_hotel" value="{{ $building->nombre_hotel }}">
                        @error('nombre_hotel')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="categoria_id" class="form-label">Categoría</label>
                        <select name="categoria_id" id="categoria_id" class="form-control @error('categoria_id') is-invalid @enderror">
                            <option value="0" selected>-- Selecciona una opcion --</option>
                            @foreach ($buildingCategorias as $buildingCategoria)
                                <option value="{{ $buildingCategoria->id }}" {{ $building->categoria_id == $buildingCategoria->id ? 'selected' : '' }}>{{ $buildingCategoria->nombre }}</option>
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
                        <input id="descripcion" type="hidden" name="descripcion" class="@error('descripcion') is-invalid @enderror" value="{{ $building->descripcion }}">
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
                        @if (File::exists(public_path('storage/' . $building->imagen_destacada)) && $building->imagen_destacada != null)
                            <div class="mt-2">
                                <img src="{{ asset('storage/'.$building->imagen_destacada) }}" alt="{{ $building->imagen_destacada }}" class="img-fluid mt-3" style="height: 190px;object-fit: contain; width: 100%;">
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="galeria" class="form-label">Galería</label>
                        <input type="file" name="galeria[]" multiple accept=".png,.jpg,.jpeg" id="galeria" class="form-control">
                        @if ($building->galeria != null)
                            <div class="mt-2 d-flex flex-wrap">
                                @php
                                    $galeria = json_decode($building->galeria);
                                @endphp
                                <div class="d-grid mb-3">
                                    @foreach ($galeria as $galeria_img)
                                        <img src="{{ asset('storage/'.$galeria_img) }}" alt="{{ $building->nombre_producto }}" class="img-fluid mt-3" style="object-fit: cover;height: 100%;width: 100px;">
                                    @endforeach
                                </div>
                            </div>
                            
                        @endif
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success w-100 btn-editar">Actualizar building</button>
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