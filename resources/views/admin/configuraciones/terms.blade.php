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
                <h2 class="mb-0 fw-bold">Terminos y condiciones</h2>
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
            
            <form action="{{ route('update.terminos_condiciones', 1) }}" method="POST">
                @csrf
                @method('PUT')
                {{-- Agregar trix editor de aviso de privacidad --}}
                <div class="mb-3">
                    <label for="terminos_condiciones" class="form-label">Terminos y condiciones</label>
                    <input id="terminos_condiciones" type="hidden" name="terminos_condiciones" class="@error('terminos_condiciones') is-invalid @enderror" value="{{ $terminos_condiciones->terminos_condiciones }}">
                    <trix-editor input="terminos_condiciones"></trix-editor>
                    @error('terminos_condiciones')
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