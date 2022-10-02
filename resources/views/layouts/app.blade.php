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
    
    {{-- Owl Carousel --}}
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}" />

    {{-- Linearicons --}}
    <link rel="stylesheet" href="{{ asset('css/linearicons.css') }}" />

    {{-- Fancybox CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css">

    {{-- BxSlider --}}
    <link rel="stylesheet" href="{{ asset('css/bxslider.css') }}" />

    {{-- FlexSlider CSS --}}
    <link rel="stylesheet" href="{{ asset('FlexSlider/flexslider.css') }}" />

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}" />

    {{-- Select2 CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" rel="stylesheet" />

    {{-- Estilos --}}
    @yield('styles')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark shadow-sm position-fixed w-100" style="z-index: 9">
            <div class="container">
                <a class="navbar-brand text-white" href="{{ url('/') }}">
                    <img src="{{ asset('image/rochebobois_white_logo.svg') }}" alt="logo" class="logo_brand" style="width:50%;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
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
                                    <li><a class="dropdown-item" href="{{ route('front.best-seller')}} ">BEST SELLER</a></li>
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
                                    <a class="dropdown-item text-uppercase" href="{{ route('logout') }}"
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

                        @if (Auth::user() && Cart::count() > 0)
                            {{-- Menu desplegable con la vista de los productos del carrito de compras --}}
                            <li class="nav-item dropdown d-flex align-items-center">
                                <a id="cart_dropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <div class="position-relative">
                                        <i class="fa-regular fa-cart-shopping"></i>
                                        <span class="position-absolute badge_cart">
                                            {{ Cart::count() }}
                                        </span>
                                    </div>
                                </a>
                                <div class="dropdown-cart dropdown-menu dropdown-menu-end" aria-labelledby="cart_dropdown">
                                    @forelse (Cart::content() as $item)
                                        <div class="row align-items-center py-2 border-bottom">
                                            <div class="col-12 col-md-4">
                                                <img src="{{ asset('storage/'.$item->options->image) }}" alt="" class="img-fluid">
                                            </div>
                                            <div class="col-12 col-md-8">
                                                <p class="mb-0"><b>Producto</b>: {{ $item->name }}</p>
                                                <p class="mb-0"><b>Cantidad</b>: {{ $item->qty }}</p>
                                                <p class="mb-0"><b>Precio</b>: ${{ $item->price }}</p>
                                            </div>
                                        </div>
                                    @empty
                                        <p class="mb-0 p-5 text-center">
                                            No hay productos en el carrito
                                        </p>
                                    @endforelse

                                    @if (Cart::count() > 0)
                                        {{-- Mostrar el total de la compra --}}
                                        <div class="row align-items-center pt-2">
                                            <div class="col-12 col-md-6">
                                                <p class="mb-0"><b>Total</b>: ${{ Cart::subtotal() }}</p>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <a href="{{ route('cart.index') }}" class="btn_outline_dark">Ver carrito</a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <main class="pb-5">
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

    {{-- FancyBox JS --}}
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>

    {{-- Select2 JS --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>

    {{-- FlexSlider JS --}}
    <script src="{{ asset('FlexSlider/jquery.flexslider.js') }}"></script>

    {{-- Font Awesome --}}
    <script src="{{ asset('js/all.min.js') }}"></script>
    
    {{-- Swiper --}}
    <script src="{{ asset('js/swiper.min.js') }}"></script>
    
    @yield('scripts')

    <script>
        $('.dropdown-menu').click(function(e) {
            e.stopPropagation();
        });
    </script>
</body>
</html>
