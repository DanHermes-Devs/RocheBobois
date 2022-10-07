@extends('admin.layouts.app')

<style></style>

@section('content')
<div class="container">
    <div class="card p-4">
        <div class="d-flex mb-2">
            <a href="{{ route('bookings') }}" class="text-dark"> <i class="fa-solid fa-arrow-left mr-2"></i> Volver</a>
        </div>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0 fw-bold"><b>Reserva del usuario</b>: {{ $user->name }}</h2>
        </div>
        <div class="row">
            <div class="col-12 col-md-8">
                <div class="form">
                    <div class="mb-3">
                        <label for="nombre_disenador" class="form-label">Nombre del Asistente</label>
                        <input type="text" class="form-control" value="{{ $booking->nombre_usuario }}" disable readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nombre_disenador" class="form-label">Correo Electrónico</label>
                        <input type="text" class="form-control" value="{{ $booking->email_usuario }}" disable readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nombre_disenador" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" value="{{ $booking->telefono_usuario }}" disable readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nombre_disenador" class="form-label">Empresa</label>
                        <input type="text" class="form-control" value="{{ $user->empresa }}" disable readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nombre_disenador" class="form-label">Cargo</label>
                        <input type="text" class="form-control" value="{{ $user->cargo }}" disable readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nombre_disenador" class="form-label">Hora</label>
                        <input type="text" class="form-control" value="{{ $booking->hora }}" disable readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nombre_disenador" class="form-label">Fecha</label>
                        <input type="text" class="form-control" value="{{ $booking->fecha }}" disable readonly>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <img src="{{ asset('storage/uploads/qr_codes_reservations/' . $booking->codigo_reserva . '.png') }}" alt="QR" class="img-fluid">
                <p class="text-center">
                    <b>Código de Reserva</b>: {{ $booking->codigo_reserva }}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection