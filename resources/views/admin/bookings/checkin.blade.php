@extends('admin.layouts.app')

<style></style>

@section('content')
<div class="container">
    <div class="card p-4">
        <div class="d-flex mb-2">
            <a href="{{ route('bookings') }}" class="text-dark"> <i class="fa-solid fa-arrow-left mr-2"></i> Volver</a>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <img src="{{ asset('image/confirmar.png') }}" alt="QR" class="img-fluid w-25 mb-4">
                <h2 class="mb-3 fw-bold">
                    Check-in Realizado con Éxito
                </h2>
                <p>
                    Se ah confirmado el ingreso de <b>{{ $booking->nombre_usuario }}</b> al evento.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection