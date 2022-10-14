@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="card p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0 fw-bold">Importar productos</h2>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="card p-5">
                    <form action="{{ route('import.producto') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <p class="mb-0">Por favor seleccione el archivo que desea importar</p>
                        <input type="file" name="file" id="file" class="form-control @error('file') is-invalid @enderror" accept=".csv, .xlsx">
                        @error('file')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <button type="submit" class="mt-3 btn btn-primary rounded-0">Importar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection