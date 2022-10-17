@extends('admin.layouts.app')
<style>
    trix-editor {
        min-height: 400px !important;
    }
</style>
@section('content')

<div class="container">
    <div class="container">
        <div class="card p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0 fw-bold">Aviso de Privacidad</h2>
            </div>

            {{-- Aviso flash --}}
            @if (session('status'))
                <div class="alert alert-success alert-block d-flex justify-content-between">
                    <strong>{{ session('status') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            
            <form action="{{ route('update.aviso_privacidad', 1) }}" method="POST">
                @csrf
                @method('PUT')
                {{-- Agregar trix editor de aviso de privacidad --}}
                <div class="mb-3">
                    <label for="aviso_privacidad" class="form-label">Aviso de privacidad</label>
                    <input id="aviso_privacidad" type="hidden" name="aviso_privacidad" class="@error('aviso_privacidad') is-invalid @enderror" value="{{ $aviso_privacidad->aviso_privacidad }}">
                    <trix-editor input="aviso_privacidad"></trix-editor>
                    @error('aviso_privacidad')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success btn_action">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection