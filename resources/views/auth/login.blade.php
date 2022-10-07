@extends('layouts.app')
<style>
    div#login_form {
        margin-top: 4rem;
    }

    .form-control {
        border-radius: 0!important;
        padding: 0.6rem!important;
    }

    .form-control:focus {
        box-shadow: none;
    }

    main.pb-5 {
        padding: 0!important;
    }
</style>
@section('content')
<div class="container-fluid" id="login_form">
    <div class="row justify-content-center align-items-center">
        <div class="col-12 col-md-7 px-0">
            <img src="{{ asset('image/2022_1_PRESAGE_Canape__amb_pdf_ht-1-scaled.jpg') }}" class="img-fluid" alt="Responsive image">
        </div>

        <div class="col-12 col-md-5 px-0">
            <h2 class="fw-bold text-center mb-4">Inicia Sesión</h2>
            <form method="POST" class="px-5" action="{{ route('login') }}">
                @csrf
    
                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Correo Electrónico') }}</label>
    
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
    
                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
    
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
    
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
    
                <div class="mb-0">
                    <button type="submit" class="btn_outline_dark">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
