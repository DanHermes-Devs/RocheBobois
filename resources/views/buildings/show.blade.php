@extends('layouts.app')

<style>
    .img_fecha {
        height: 100%;
        width: 100%;
        position: relative;
    }

    .hidden {
        display: none;
    }

    img.photothumb {
        width: 100%;
        height: 240px;
        object-fit: cover;
    }

    .clic-image {
        position: absolute;
        top: 0;
        background: #000;
        color: #fff;
        padding: 0.2rem 1rem;
    }

    a {
        cursor: pointer;
    }

    .img_fecha img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        max-height: 320px !important;
    }

    .grid-event {
        display: grid;
        grid-template-columns: 35% 60%;
        margin-bottom: 2rem;
        background: #eeeeee;
        align-items: center;
        height: auto;
        column-gap: 2rem;
        grid-row: auto;
    }

    .card_black_eventos {
        background: #000;
        color: #fff;
        position: absolute;
        padding: 1rem;
        text-align: center;
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
    .grid-event {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        gap: 1rem;
        height: auto;
    }

    .linear_color {
        padding: 1.5rem;
    }

    .img_fecha {
        width: 100%;
    }
} 

/*============================================= 
MOVIL VERTICAL (revisamos en 320px) 
=============================================*/ 

@media (max-width:575px){
    .grid-event {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        gap: 1rem;
        height: auto;
    }

    .linear_color {
        padding: 1.5rem;
    }

    .img_fecha {
        width: 100%;
    }
}
</style>

@section('content')
<div class="container-fluid py-5 mt-5">
    <div class="container">
        <div class="row mb-3">
            <div class="col-12">
                <h2 class="fs-1 text-uppercase text-center fw-bold">{{ $categoria_building->nombre }}</h2>
            </div>
        </div>

        @if($buildings->count() > 0)
            <div class="card_colecciones">
                @foreach ($buildings as $building)
                <div class="grid-event">
                    <div class="img d-flex gap-5 h-100">
                        <a data-src="{{ asset('storage/'.$building->imagen_destacada) }}" data-fancybox="{{ $building->nombre_hotel }}" class="img_fecha">
                            <img loading="lazy" class="photothumb" src="{{ asset('storage/'.$building->imagen_destacada) }}">
                            <p class="mb-0 clic-image">Clic en la imagen</p>
                        </a>

                        @php 
                            $galeria = json_decode($building->galeria);
                        @endphp
                        
                        @foreach($galeria as $galeria)
                            <a data-src="{{ asset('storage/'.$galeria) }}" data-fancybox="{{ $building->nombre_hotel }}" class="img_fecha hidden">
                                <img loading="lazy" class="photothumb" src="{{ asset('storage/'.$galeria) }}">
                            </a>
                        @endforeach
                    </div>
                    <div class="linear_color">
                        <h3 class="fw-bold w-100">{{ $building->nombre_hotel }}</h3>
                        <p>
                            {!! $building->descripcion !!}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="row">
                <div class="col-12">
                    <h2 class="fs-1 text-uppercase text-center fw-bold">No hay registros</h2>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection


@section('scripts')
@endsection