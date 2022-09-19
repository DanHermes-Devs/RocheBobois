@extends('layouts.app')
<style>
    .img_fecha {
        height: 250px;
        width: 100%;
    }

    .grid-event {
        display: grid;
        grid-template-columns: 40% 60%;
        margin-bottom: 2rem;
        background: #eeeeee;
        align-items: center;
    }
    .card_black_eventos {
        background: #000;
        color: #fff;
        position: absolute;
        padding: 1rem;
        text-align: center;
    }

    .linear_color {
        padding: 1rem;
    }
</style>
@section('content')
    <div class="container-fluid py-5 my-5">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <h2 class="fs-1 text-uppercase text-center fw-bold">Eventos</h2>
                </div>
            </div>
            <div class="row">
                <div class="card_colecciones">
                    @foreach ($eventos as $evento)
                    <div class="grid-event">
                        <div class="img_fecha" style="background: url('{{ asset('storage/'. $evento->imagen_destacada) }}');background-size: cover;background-position: center;background-repeat: no-repeat;">
                            <div class="card_black_eventos">
                                <?php if($evento->fecha): ?>
                                    <p class="mb-0">{{ $evento->fecha }}</p>
                                <?php endif; ?>
                                
                                <?php if($evento->hora): ?>
                                    <p class="mb-0">{{ $evento->hora }}</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="linear_color">
                            <h3 class="font-weight-bold w-100">{{ $evento->nombre_evento }}</h3>
                            <p>{!! $evento->descripcion !!}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
