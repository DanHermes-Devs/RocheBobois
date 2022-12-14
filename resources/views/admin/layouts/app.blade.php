<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Google Font: Source Sans Pro -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Font Awesome Icons -->

    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

    {{-- Font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">

    {{-- waitme --}}

    <link rel="stylesheet" href="{{ asset('css/waitMe.min.css') }}">
    
    {{-- Favicon en formato JPG --}}
    <link rel="icon" type="image/jpg" href="{{ asset('favicon.jpg') }}">

    {{-- Trix editor --}}
    <link rel="stylesheet" href="{{ asset('css/trixeditor.min.css') }}" />

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    {{-- Datatables --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/autofill/2.4.0/css/autoFill.bootstrap4.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowgroup/1.2.0/css/rowGroup.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css"/>

    @yield('styles')

</head>

<style>
    body {
        background-color: #f4f6f9!important;
    }

    .wrapper .content-wrapper{
        height: auto!important;
    }

    .content-wrapper {
        margin-bottom: 3rem;
    }

    .trix-button-group--file-tools {
        display: none !important;
    }

    .d-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        column-gap: 1rem;
        row-gap: 1rem;
    }
</style>
<body class="hold-transition sidebar-mini">

    <div class="wrapper">

        <!-- Navbar -->

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <!-- Left navbar links -->

            <ul class="navbar-nav">

                <li class="nav-item">

                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i

                            class="fas fa-bars"></i></a>

                </li>

            </ul>



            <!-- Right navbar links -->

            <ul class="navbar-nav ml-auto">

                <!-- Notifications Dropdown Menu -->

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

                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"

                            data-toggle="dropdown" href="#">

                            {{ Auth::user()->name }}

                        </a>



                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();

                                                        document.getElementById('logout-form').submit();">

                                {{ __('Cerrar sesi??n') }}

                            </a>



                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">

                                @csrf

                            </form>

                        </div>

                    </li>

                @endguest

            </ul>

        </nav>

        <!-- /.navbar -->



        <!-- Main Sidebar Container -->

        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <!-- Brand Logo -->

            <a href="{{ route('dashboard') }}" class="brand-link">

                {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"

                    style="opacity: .8"> --}}

                <span class="brand-text font-weight-light">ROCHE BOBOIS M??XICO</span>

            </a>



            <!-- Sidebar -->

            <div class="sidebar">

                <!-- Sidebar Menu -->

                <nav class="mt-2">

                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"

                        data-accordion="true">



                        <li class="nav-item">

                            <a href="{{ route('bookings') }}" class="nav-link">

                                <i class="nav-icon fa-solid fa-hotel"></i>

                                <p>Reservas</p>

                            </a>

                        </li>

                        <li class="nav-item">

                            <a href="{{ route('colecciones-especiales') }}" class="nav-link">

                                <i class="nav-icon fa-sharp fa-solid fa-rectangle-vertical-history"></i>

                                <p>Colecciones Especiales</p>

                            </a>

                        </li>



                        <li class="nav-item">

                            <a href="{{ route('showrooms') }}" class="nav-link">

                                <i class="nav-icon fa-regular fa-person-booth"></i>

                                <p>Showrooms</p>

                            </a>

                        </li>



                        <li class="nav-item">

                            <a href="{{ route('sliders') }}" class="nav-link">

                                <i class="nav-icon fa-regular fa-images"></i>

                                <p>Sliders</p>

                            </a>

                        </li>

                        <li class="nav-item">

                            <a href="#" class="nav-link">

                                <i class="nav-icon fa-regular fa-calendar-days"></i>

                                <p>

                                    Eventos

                                    <i class="right fas fa-angle-left"></i>

                                </p>

                            </a>

                            <ul class="nav nav-treeview">

                                <li class="nav-item">

                                    <a href="{{ route('eventos') }}" class="nav-link">

                                        <i class="far fa-circle nav-icon"></i>

                                        <p>Todos los Eventos</p>

                                    </a>

                                </li>
                                
                                <li class="nav-item">

                                    <a href="{{ route('event-categories') }}" class="nav-link">

                                        <i class="far fa-circle nav-icon"></i>

                                        <p>Categorias</p>

                                    </a>

                                </li>

                            </ul>

                        </li>
                        {{-- Fin Categorias --}}

                        <li class="nav-item">

                            <a href="#" class="nav-link">

                                <i class="nav-icon fa-solid fa-house-person-return"></i>

                                <p>

                                    Home Office

                                    <i class="right fas fa-angle-left"></i>

                                </p>

                            </a>

                            <ul class="nav nav-treeview">

                                <li class="nav-item">

                                    <a href="{{ route('home-office') }}" class="nav-link">

                                        <i class="far fa-circle nav-icon"></i>

                                        <p>Categor??as</p>

                                    </a>

                                </li>

                            </ul>

                        </li>
                        {{-- Fin Home Office --}}

                        <li class="nav-item">

                            <a href="#" class="nav-link">

                                <i class="nav-icon fa-regular fa-badge-check"></i>

                                <p>

                                    Best Seller

                                    <i class="right fas fa-angle-left"></i>

                                </p>

                            </a>

                            <ul class="nav nav-treeview">

                                <li class="nav-item">

                                    <a href="{{ route('back.best-seller') }}" class="nav-link">

                                        <i class="far fa-circle nav-icon"></i>

                                        <p>Categor??as</p>

                                    </a>

                                </li>

                            </ul>

                        </li>
                        {{-- Best Seller --}}

                        <li class="nav-item">

                            <a href="#" class="nav-link">

                                <i class="nav-icon fa-regular fa-building"></i>

                                <p>

                                    Buildings

                                    <i class="right fas fa-angle-left"></i>

                                </p>

                            </a>

                            <ul class="nav nav-treeview">

                                <li class="nav-item">

                                    <a href="{{ route('building') }}" class="nav-link">

                                        <i class="far fa-circle nav-icon"></i>

                                        <p>Todos los Buildings</p>

                                    </a>

                                </li>
                                
                                <li class="nav-item">

                                    <a href="{{ route('building-categories') }}" class="nav-link">

                                        <i class="far fa-circle nav-icon"></i>

                                        <p>Categorias</p>

                                    </a>

                                </li>

                            </ul>

                        </li>

                        <li class="nav-item">

                            <a href="#" class="nav-link">

                                <i class="nav-icon fa-solid fa-bed-front"></i>

                                <p>

                                    Productos

                                    <i class="right fas fa-angle-left"></i>

                                </p>

                            </a>

                            <ul class="nav nav-treeview">

                                <li class="nav-item">

                                    <a href="{{ route('productos') }}" class="nav-link">

                                        <i class="far fa-circle nav-icon"></i>

                                        <p>Todos los Productos</p>

                                    </a>

                                </li>
                                
                                <li class="nav-item">

                                    <a href="{{ route('categorias') }}" class="nav-link">

                                        <i class="far fa-circle nav-icon"></i>

                                        <p>Categorias</p>

                                    </a>

                                </li>
                                
                                <li class="nav-item">

                                    <a href="{{ route('subcategorias') }}" class="nav-link">

                                        <i class="far fa-circle nav-icon"></i>

                                        <p>Subcategorias</p>

                                    </a>

                                </li>

                            </ul>

                            {{-- Ordenes --}}
                            <li class="nav-item">

                                <a href="{{ route('index.orders') }}" class="nav-link">
    
                                    <i class="nav-icon fa-regular fa-person-booth"></i>
    
                                    <p>Ordenes</p>
    
                                </a>
    
                            </li>
                            {{-- Ordenes --}}

                            {{-- Usuarios --}}
                            <li class="nav-item">

                                <a href="{{ route('usuarios') }}" class="nav-link">

                                    <i class="nav-icon fa-solid fa-users"></i>
    
                                    <p>Clientes</p>
    
                                </a>
    
                            </li>
                            {{-- Usuarios --}}

                            <li class="nav-item">

                                <a href="#" class="nav-link">

                                    <i class="nav-icon fa-regular fa-gear"></i>
    
                                    <p>
    
                                        Configuraciones
    
                                        <i class="right fas fa-angle-left"></i>
    
                                    </p>
    
                                </a>
    
                                <ul class="nav nav-treeview">
    
                                    <li class="nav-item">
    
                                        <a href="{{ route('aviso_privacidad') }}" class="nav-link">
    
                                            <i class="far fa-circle nav-icon"></i>
    
                                            <p>Aviso de Privacidad</p>
    
                                        </a>
    
                                    </li>
                                    
                                    <li class="nav-item">
    
                                        <a href="{{ route('terminos_condiciones') }}" class="nav-link">
    
                                            <i class="far fa-circle nav-icon"></i>
    
                                            <p>T??rminos y condiciones</p>
    
                                        </a>
    
                                    </li>
    
                                </ul>
    
                            </li>

                        </li>

                    </ul>

                </nav>

                <!-- /.sidebar-menu -->

            </div>

            <!-- /.sidebar -->

        </aside>



        <div class="content-wrapper">

            <div class="content-header">

                <div class="container-fluid"></div>

            </div>

            <div class="content">
                @yield('content')
            </div>


        </div>



        <!-- Main Footer -->

        <footer class="main-footer">

            <!-- Default to the left -->

            <strong>Copyright &copy; {{ date('Y') }} <a href="#">Roche Bobois M??xico</a>.</strong> All rights reserved.

        </footer>

        <!-- REQUIRED SCRIPTS -->

    </div>

    <!-- ./wrapper -->

    <!-- jQuery -->

    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap 4 -->

    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- AdminLTE App -->

    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    {{-- Data tables --}}
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap4.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/rowgroup/1.2.0/js/dataTables.rowGroup.min.js"></script>

    {{-- Sweet Alert 2 --}}
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>

    {{-- Waitme JS --}}
    <script src="{{ asset('js/waitme.min.js') }}"></script>
    
    {{-- Trixeditor --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>

    {{-- FontAwesome --}}
    <script src="{{ asset('js/all.min.js')}}"></script>

    {{-- Spanish jS --}}
    <script src="{{ asset('js/Spanish.js')}}"></script>

    @yield('scripts')

    <script>
        // Cargar Document con jQuery
        $(document).ready(function () {
            $('.btn_crear').click(function (e) {
                $(this).waitMe({
                    'effect': 'pulse',
                });
            });
            
            $('.btn_action').click(function (e) {
                $(this).waitMe({
                    'effect': 'pulse',
                });
            });

            $('.btn_editar').click(function (e) {
                $(this).waitMe({
                    'effect': 'pulse',
                });
            });
        });
    </script>

</body>



</html>

