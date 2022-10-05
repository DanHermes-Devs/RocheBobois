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

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css"/>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap4.min.css"/>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowgroup/1.2.0/css/rowGroup.bootstrap4.min.css"/>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css"/>

    {{-- Font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">

    {{-- waitme --}}

    <link rel="stylesheet" href="{{ asset('css/waitMe.min.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}" />

    {{-- Trix editor --}}
    <link rel="stylesheet" href="{{ asset('css/trixeditor.min.css') }}" />

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

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

                                {{ __('Cerrar sesión') }}

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

                <span class="brand-text font-weight-light">ROCHE BOBOIS MÉXICO</span>

            </a>



            <!-- Sidebar -->

            <div class="sidebar">

                <!-- Sidebar Menu -->

                <nav class="mt-2">

                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"

                        data-accordion="true">



                        <li class="nav-item">

                            <a href="{{ route('colecciones-especiales') }}" class="nav-link">

                                <i class="nav-icon fas fa-id-card"></i>

                                <p>Colecciones Especiales</p>

                            </a>

                        </li>



                        <li class="nav-item">

                            <a href="{{ route('showrooms') }}" class="nav-link">

                                <i class="nav-icon fas fa-id-card"></i>

                                <p>Showrooms</p>

                            </a>

                        </li>



                        <li class="nav-item">

                            <a href="{{ route('sliders') }}" class="nav-link">

                                <i class="nav-icon fas fa-id-card"></i>

                                <p>Sliders</p>

                            </a>

                        </li>

                        <li class="nav-item">

                            <a href="#" class="nav-link">

                                <i class="nav-icon fas fa-cog"></i>

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

                                <i class="nav-icon fas fa-cog"></i>

                                <p>

                                    Home Office

                                    <i class="right fas fa-angle-left"></i>

                                </p>

                            </a>

                            <ul class="nav nav-treeview">

                                <li class="nav-item">

                                    <a href="{{ route('home-office') }}" class="nav-link">

                                        <i class="far fa-circle nav-icon"></i>

                                        <p>Categorías</p>

                                    </a>

                                </li>

                            </ul>

                        </li>
                        {{-- Fin Home Office --}}

                        <li class="nav-item">

                            <a href="#" class="nav-link">

                                <i class="nav-icon fas fa-cog"></i>

                                <p>

                                    Best Seller

                                    <i class="right fas fa-angle-left"></i>

                                </p>

                            </a>

                            <ul class="nav nav-treeview">

                                <li class="nav-item">

                                    <a href="{{ route('back.best-seller') }}" class="nav-link">

                                        <i class="far fa-circle nav-icon"></i>

                                        <p>Categorías</p>

                                    </a>

                                </li>

                            </ul>

                        </li>
                        {{-- Best Seller --}}

                        <li class="nav-item">

                            <a href="#" class="nav-link">

                                <i class="nav-icon fas fa-cog"></i>

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

                                <i class="nav-icon fas fa-cog"></i>

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

            <strong>Copyright &copy; {{ date('Y') }} <a href="#">Roche Bobois México</a>.</strong> All rights reserved.

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

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap4.min.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>

    @yield('scripts')

    <script>
        // Cargar Document con jQuery
        $(document).ready(function () {
            $('.btn_crear').click(function (e) {
                $(this).waitMe();
            });
        });
    </script>

</body>



</html>

