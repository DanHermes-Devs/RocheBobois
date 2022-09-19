<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/dashboard.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- Font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">

    {{-- Trix editor --}}
    <link rel="stylesheet" href="{{ asset('css/trixeditor.min.css') }}"/>

    {{-- Waitme --}}
    <link rel="stylesheet" href="{{ asset('css/waitme.min.css') }}"/>

    <!-- Styles -->
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('styles')
</head>
<body class="dashboard">
    <header class="dashboard__header px-md-5">
        <div class="dashboard__header-grid">
            <a href="/">
                <img src="{{ asset('image/rochebobois_white_logo.svg') }}" alt="Logo Roche Bobois" class="img-fluid dashboard__header-logo">
            </a>

            <nav class="">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-uppercase" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Cerrar Sesión') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <div id="app" class="dashboard__grid">
        <aside class="dashboard__aside">
            <nav class="dashboard__menu">
                <a href="{{ route('dashboard') }}" class="dashboard__enlace {{ Route::is('dashboard') ? 'dashboard__enlace-active' : false}}">
                    <i class="fa-solid fa-house dashboard__icono"></i>
                    <span class="dashboard__menu-texto">
                        Inicio
                    </span>
                </a>
                {{-- Link Home --}}
                
                <a href="{{ route('colecciones-especiales') }}" class="dashboard__enlace {{ Route::is(['colecciones-especiales', 'create.coleccion', 'edit.coleccion']) ? 'dashboard__enlace-active' : false}}">
                    <i class="fa-solid fa-gem dashboard__icono"></i>
                    <span class="dashboard__menu-texto">
                        Colecciones Especiales
                    </span>
                </a>
                {{-- Link Colecciones Especiales --}}
                
                <a href="{{ route('eventos') }}" class="dashboard__enlace {{ Route::is(['eventos', 'create.evento', 'edit.evento']) ? 'dashboard__enlace-active' : false}}">
                    <i class="fa-regular fa-calendar-days dashboard__icono"></i>
                    <span class="dashboard__menu-texto">
                        Eventos
                    </span>
                </a>
                {{-- Link Eventos --}}

                <a href="{{ route('productos') }}" class="dashboard__enlace {{ Route::is(['productos', 'create.producto', 'edit.producto']) ? 'dashboard__enlace-active' : false}}">
                    <i class="fa-solid fa-couch dashboard__icono"></i>
                    <span class="dashboard__menu-texto">
                        Productos
                    </span>
                </a>
                {{-- Link Productos --}}

                <a href="{{ route('building') }}" class="dashboard__enlace {{ Route::is(['building', 'create.building']) ? 'dashboard__enlace-active' : false}}">
                    <i class="fa-solid fa-bell-concierge dashboard__icono"></i>
                    <span class="dashboard__menu-texto">
                        Building
                    </span>
                </a>
                {{-- Link Roche Bobois Building --}}

                <a href="{{ route('showrooms') }}" class="dashboard__enlace {{ Route::is(['showrooms', 'create.showroom']) ? 'dashboard__enlace-active' : false}}">
                    <i class="fa-solid fa-shop dashboard__icono"></i>
                    <span class="dashboard__menu-texto">
                        Showrooms
                    </span>
                </a>
                {{-- Link Showrooms --}}
                
                <a href="{{ route('sliders') }}" class="dashboard__enlace {{ Route::is(['sliders', 'create.slider']) ? 'dashboard__enlace-active' : false}}">
                    <i class="fa-regular fa-image dashboard__icono"></i>
                    <span class="dashboard__menu-texto">
                        Slider
                    </span>
                </a>
                {{-- Link Slider --}}
                
                <a href="{{ route('contacto') }}" class="dashboard__enlace {{ Route::is('contacto') ? 'dashboard__enlace-active' : false}}">
                    <i class="fa-regular fa-address-book dashboard__icono"></i>
                    <span class="dashboard__menu-texto">
                     Contacto
                    </span>
                </a>
                {{-- Link Contacto --}}
            </nav>
        </aside>
        <main class="py-4 dashboard__contenido">
            @yield('content')
        </main>
    </div>

    {{-- jQuery --}}
    <script src="{{ asset('js/jquery.min.js')}}"></script>

    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Trix Editor JS --}}
    <script src="{{ asset('js/trixeditor.min.js') }}"></script>
    
    {{-- FontAwesome --}}
    <script src="{{ asset('js/all.min.js')}}"></script>

    {{-- Waitme JS --}}
    <script src="{{ asset('js/waitme.min.js') }}"></script>

    {{-- Sweet Alert 2 --}}
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>

    {{-- Script personalizados con yield --}}
    @yield('scripts')
</body>
</html>
