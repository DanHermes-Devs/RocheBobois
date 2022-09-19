@extends('layouts.app')

<style>
    .img_cover {
        height: 70vh; 
        background-position: center!important; 
        background-repeat: no-repeat!important; 
        background-size: cover!important;
        display: flex; 
        justify-content: center;
        align-items: center;
        padding: 0;
        margin: 0;
        position: relative;
    }

    .titulo_sucursal.text-white {
        background: #000;
        padding: 1rem;
        font-size: 2rem;
        margin: 0;
        position: absolute;
        font-weight: bold;
        left: 0;
        width: 30%;
    }
    iframe {
        width: 100%;
        height: 100%;
    }
    .info_showroom {
        background: #E5E5E5;
        height: 100%;
        color: #000;
        padding: 5rem;
        display: flex;
        flex-direction: column;
        gap: 3rem;
        align-items: center;
        justify-content: center;
    }

    .info_showroom a {
        background: transparent;
        border: 1px solid #000;
        padding: 1rem 5rem;
        color: #000;
        text-decoration: none;
        width: 300px;
        text-align: center;
    }
</style>

@section('content')

<div class="container-fluid">
    <div class="row img_cover" style="background-image: urL({{ asset('storage/' . $showroom->imagen_destacada) }});">
        <div class="titulo_sucursal text-white">
            {{ $showroom->nombre_showroom }}
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6 p-0 m-0">
            <div class="info_showroom">
                <a href="{{ $showroom->como_llegar }}" target="_blank" class="text-uppercase">¿Cómo llegar?</a>

                <a href="https://api.whatsapp.com/send?phone={{ $showroom->numero_llamadas }}&text={{ $showroom->mensaje_predeterminado_wp }}" target="_blank" class="text-uppercase {{ $showroom->id_para_google_tag_manager }}">Whatsapp <i class="ml-2 fa-brands fa-whatsapp"></i></a>
                
                <a href="tel:+{{ $showroom->numero_llamadas }}" target="_blank" class="text-uppercase">¡Llámanos!</a>

                <p>{{ $showroom->direccion_showroom }} </p>
                
            </div>
        </div>
        <div class="col-12 col-md-6 p-0 m-0">
            {!! $showroom->iframe_google_maps !!}
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script></script>
@endsection
