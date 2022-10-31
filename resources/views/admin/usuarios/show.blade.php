@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="card p-4">
            <div class="d-flex mb-2">
                <a href="{{ route('usuarios') }}" class="text-dark"> <i class="fa-solid fa-arrow-left mr-2"></i> Volver</a>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0 fw-bold">Cliente: <b>{{ $user->name }}</b></h2>
            </div>


            @if (session('store'))
                <div class="alert alert-success alert-block d-flex justify-content-between">
                    <strong>{{ session('store') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <form action="#">
                <div class="mb-3">
                    <label class="form-label">Nombre Completo</label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" name="email" value="{{ $user->email }}" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Teléfono</label>
                    <input type="email" class="form-control" name="telefono" value="{{ $user->telefono }}" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Empresa</label>
                    <input type="text" class="form-control" name="empresa" value="{{ $user->empresa }}" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Cargo</label>
                    <input type="text" class="form-control" name="cargo" value="{{ $user->cargo }}" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">País</label>
                    <input type="text" class="form-control" name="pais" value="{{ $user->pais }}" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Estado/Provincia/Ciudad</label>
                    <input type="text" class="form-control" name="estado" value="{{ $user->estado }}" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Código Postal</label>
                    <input type="text" class="form-control" name="codigo_postal" value="{{ $user->codigo_postal }}" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Fecha de Registro</label>
                    <input type="text" class="form-control" name="created_at" value="{{ $user->created_at->format('d/m/Y') }}" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">ID Stripe User</label>
                    <input type="text" class="form-control" name="stripe_id" value="{{ $user->stripe_id }}" readonly>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>
@endsection
