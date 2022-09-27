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