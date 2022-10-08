@extends('layouts.app')

@section('content')
<div class="container py-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3 class="mb-3 fw-bold">Confirmación de Correo Electrónico</h3>

            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif

            <p>
                Antes de poder continuar y ver el contenido, por favor, confirma tu correo electrónico con el enlace que te hemos enviado. Si no has recibido el email, puedes solicitar otro, haciendo click en el botón de abajo.
            </p>
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="btn_outline_dark">Reenviar</button>
            </form>
        </div>
    </div>
</div>
@endsection
