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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.15/jquery.bxslider.min.css"
        integrity="sha512-UBY4KATrDAEKgEEU+RAfY4yWrK0ah43NGwNr5o/xmncxsT+rv8jp7MI3a00I0Ep3NbAx05U5kw3DvyNCoz+Wcw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- FlexSlider CSS --}}
    <link rel="stylesheet" href="{{ asset('FlexSlider/flexslider.css') }}" />

    {{-- waitme --}}
    <link rel="stylesheet" href="{{ asset('css/waitme.min.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}" />

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}" />

    {{-- Select2 CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css"
        rel="stylesheet" />

    {{-- Estilos --}}
    @yield('styles')

    <style>
        .contacto_whatsapp {
            position: fixed;
            bottom: 10%;
            right: 9%;
            z-index: 999;
            background: #4caf50;
            color: #fff;
            padding: 0.5rem 1rem;
            border-radius: 3rem;
            font-size: 16px;
        }

        .ico_whats {
            width: 4%;
            position: fixed;
            bottom: 9%;
            right: 4%;
            z-index: 999;
        }

        /* Media querys */
    /*============================================= 
    TABLET HORIZONTAL (LG revisamos en 1024px) 
    =============================================*/ 

    @media (max-width:1199px) and (min-width:992px){ 

    } 

    /*============================================= 
    TABLET VERTICAL (MD revisamos en 768px) 
    =============================================*/ 

    @media (max-width:991px) and (min-width:768px){ 

    } 

    /*============================================= 
    MÓVIL HORIZONTAL (SM revisamos en 576px) 
    =============================================*/ 

    @media (max-width:767px) and (min-width:576px){
        .contacto_whatsapp {
            display: none;
        }

        .ico_whats {
            width: 10%;
            bottom: 10%;
        }
    } 

    /*============================================= 
    MOVIL VERTICAL (revisamos en 320px) 
    =============================================*/ 

    @media (max-width:575px){
        .contacto_whatsapp {
            display: none;
        }

        .ico_whats {
            width: 10%;
            bottom: 10%;
        }
    }
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark shadow-sm position-fixed w-100" style="z-index: 9">
            <div class="container">
                <a class="navbar-brand text-white" href="{{ url('/') }}">
                    <img src="{{ asset('image/rochebobois_white_logo.svg') }}" alt="logo" class="logo_brand"
                        style="width:50%;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Concierge
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('front.best-seller') }} ">BEST
                                            SELLER</a></li>
                                    <li><a class="dropdown-item" href="{{ route('front.colecciones') }} ">COLECCIONES
                                            ESPECIALES</a></li>
                                    <li><a class="dropdown-item" href="{{ route('front.eventos') }}">EVENTOS</a></li>
                                    <li><a class="dropdown-item" href="{{ route('front.home-office') }}">HOME
                                            OFFICE</a></li>
                                    <li><a class="dropdown-item" href="{{ route('front.building') }}">ROCHE BOBOIS
                                            BUILDING</a></li>
                                    <li><a class="dropdown-item"
                                            href="{{ route('front.oportunidadesUnicas') }}">OPORTUNIDADES ÚNICAS</a>
                                    </li>
                                    <li><a class="dropdown-item"
                                            href="{{ route('front.sales', ['slug' => 'salas']) }}">SALES</a></li>
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    {{-- Si el usuario es administrador mostrar el item Dashboard --}}
                                    @if (Auth::user()->hasRole('admin'))
                                        <a href="{{ route('dashboard') }}" class="dropdown-item text-uppercase">
                                            DASHBOARD
                                        </a>
                                    @endif

                                    <a href="{{ route('bienvenida') }}" class="dropdown-item text-uppercase">
                                        Bienvenida
                                    </a>

                                    {{-- Ruta del perfil --}}
                                    <a href="{{ route('perfil') }}" class="dropdown-item text-uppercase">
                                        PERFIL
                                    </a>

                                    {{-- Ruta de Cerrar Sesión --}}
                                    <a class="dropdown-item text-uppercase" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest

                        @if (Auth::user() && Cart::count() > 0)
                            {{-- Menu desplegable con la vista de los productos del carrito de compras --}}
                            <li class="nav-item dropdown d-flex align-items-center">
                                <a id="cart_dropdown" class="nav-link dropdown-toggle text-white" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" v-pre>
                                    <div class="position-relative">
                                        <i class="fa-regular fa-cart-shopping"></i>
                                        <span class="position-absolute badge_cart">
                                            {{ Cart::count() }}
                                        </span>
                                    </div>
                                </a>
                                <div class="dropdown-cart dropdown-menu dropdown-menu-end"
                                    aria-labelledby="cart_dropdown">
                                    @forelse (Cart::content() as $item)
                                        <div class="row align-items-center py-2 border-bottom">
                                            <div class="col-12 col-md-4">
                                                <img src="{{ asset('storage/' . $item->options->image) }}"
                                                    alt="" class="img-fluid">
                                            </div>
                                            <div class="col-12 col-md-8">
                                                <p class="mb-0"><b>Producto</b>: {{ $item->name }}</p>
                                                <p class="mb-0"><b>Cantidad</b>: {{ $item->qty }}</p>
                                                <p class="mb-0"><b>Precio</b>: ${{ number_format($item->price, 2) }}
                                                </p>
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
                                                <a href="{{ route('cart.index') }}" class="btn_outline_dark">Ver
                                                    carrito</a>
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

        <footer class="bg-dark py-5 py-md-3">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-md-6 text-center text-md-start">
                        <p class="mb-0 text-white py-3 py-md-3">© 2022 Roche Bobois México</p>
                    </div>
                    <div class="col-12 col-md-6 text-center text-md-end">
                        {{-- Aviso de privacidad --}}
                        <a href="{{ route('front.aviso-privacidad') }}" class="text-white text-white py-3 py-md-3">Aviso de privacidad</a>
                        {{-- Terminos y condiciones --}}
                        <a href="{{ route('front.terminos-condiciones') }}" class="text-white text-white py-3 py-md-3">Términos y condiciones</a>
                    </div>
                </div>
            </div>
        </footer>

        <a href="#" data-bs-toggle="modal" data-bs-target="#whatsappIcono" class="btn_whats_float">
            <div class="contacto_whatsapp">
                <span>¡Contáctanos por whatsapp!</span>
            </div>
            <img src="https://rocheboboismexico.com/wp-content/uploads/2022/05/whatsapp.png"
                class="img-fluid ico_whats">
        </a>
        @php
            $showrooms = App\Models\Showroom::all();
        @endphp
        <div class="btn_whatsapp">
            <div class="modal fade" id="whatsappIcono" tabindex="-1" aria-labelledby="whatsappIconoLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="whatsappIconoLabel">Por favor seleccione la sucursal
                                deseada</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <select class="form-select" onChange=nav(this.value)>
                                <option value="">-- Seleccione una sucursal --</option>
                                @foreach ($showrooms as $showroom)
                                    <option
                                        value="https://api.whatsapp.com/send?phone={{ $showroom->numero_whatsapp }}">
                                        {{ $showroom->nombre_showroom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

    {{-- Waitme JS --}}
    <script src="{{ asset('js/waitme.min.js') }}"></script>

    {{-- Sweet Alert 2 --}}
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>

    {{-- Swiper --}}
    <script src="{{ asset('js/swiper.min.js') }}"></script>

    {{-- Screenshot --}}
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

    @yield('scripts')

    <script>
        $('.dropdown-menu').click(function(e) {
            e.stopPropagation();
        });

        $('.btn_action').click(function (e) {
            $(this).waitMe({
                'effect': 'pulse',
            });
        });

        function nav(value) {
            if (value != "") {
                location.href = value;
            }
        }
    </script>
</body>

</html>
