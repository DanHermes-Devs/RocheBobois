@extends('layouts.app')
<style>
    .card__colection {
        position: relative;
    }

    .card__colection-img {
        display: block;
    }

    .card__colection-text {
        position: absolute;
        bottom: 10%;
        text-transform: uppercase;
        left: 0;
        text-align: center;
        width: 100%;
        z-index: 2;
        color: #fff;
    }

    .gradient::after {
        content: "";
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: -moz-linear-gradient(top,  rgba(0,0,0,0) 0%, rgba(0,0,0,0) 43%, rgba(0,0,0,0.3) 69%, rgba(0,0,0,0.7) 100%); /* FF3.6-15 */
        background: -webkit-linear-gradient(top,  rgba(0,0,0,0) 0%,rgba(0,0,0,0) 43%,rgba(0,0,0,0.3) 69%,rgba(0,0,0,0.7) 100%); /* Chrome10-25,Safari5.1-6 */
        background: linear-gradient(to bottom,  rgba(0,0,0,0) 0%,rgba(0,0,0,0) 43%,rgba(0,0,0,0.3) 69%,rgba(0,0,0,0.7) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00000000', endColorstr='#b3000000',GradientType=0 ); /* IE6-9 */

    }
</style>
@section('content')
    <div class="container-fluid py-5 my-5">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <h2 class="fs-1 text-uppercase text-center fw-bold">Colecciones Especiales</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($colecciones as $coleccion)
                    <div class="col-12 col-md-4">
                        <a href="{{ route('front.colecciones.show', $coleccion->slug) }}" class="card__colection">
                            <div class="card__colection gradient">
                                <img src="{{ asset('storage/' . $coleccion->imagen_destacada) }}" class="card__colection-img img-fluid" alt="...">
                                <div class="card__colection-text">
                                    <h5 class="card-title">{{ $coleccion->nombre_disenador }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
