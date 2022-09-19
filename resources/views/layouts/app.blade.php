<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- Swiper --}}
    <link rel="stylesheet" href="{{ asset('css/swiper.min.css') }}" />

    {{-- Animate.css --}}
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- Linearicons --}}
    <link rel="stylesheet" href="{{ asset('css/linearicons.css') }}" />

    {{-- Owl Carousel --}}
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}" />

    {{-- BxSlider --}}
    <link rel="stylesheet" href="{{ asset('css/bxslider.css') }}" />

    {{-- Estilos --}}
    @yield('styles')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md bg-dark shadow-sm position-fixed w-100" style="z-index: 9">
            <div class="container">
                <a class="navbar-brand text-white" href="{{ url('/') }}">
                    <img src="{{ asset('image/rochebobois_white_logo.svg') }}" alt="logo" style="width:50%;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <i class="fa-solid fa-bars text-white"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="/" class="nav-link">Inicio</a>
                        </li>
                        @if (Auth::user())
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Concierge
                                </a>
                                <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('front.colecciones')}} ">COLECCIONES ESPECIALES</a></li>
                                <li><a class="dropdown-item" href="{{ route('front.eventos') }}">EVENTOS</a></li>
                                <li><a class="dropdown-item" href="{{ route('front.building') }}">ROCHE BOBOIS BUILDING</a></li>
                                <li><a class="dropdown-item" href="{{ route('front.oportunidadesUnicas') }}">OPORTUNIDADES ÚNICAS</a></li>
                                <li><a class="dropdown-item" href="{{ route('front.sales') }}">SALES</a></li>
                                </ul>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a href="{{ route('front.showrooms') }}" class="nav-link">Showrooms</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('front.contacto') }}" class="nav-link">contacto</a>
                        </li>
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="pt-5">
            @yield('content')
        </main>

        <footer class="bg-dark">
            <p class="mb-0 text-white py-3 text-center">© 2022 Roche Bobois México</p>
        </footer>
    </div>

    {{-- jQuery --}}
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    {{-- OWL Carousel --}}
    <script src="{{ asset('js/owl.carousel.js') }}"></script>

    {{-- BxSlider --}}
    <script src="{{ asset('js/bxslider.js') }}"></script>
    
    {{-- Swiper --}}
    <script src="{{ asset('js/swiper.min.js') }}"></script>
    @yield('scripts')
</body>
</html>
