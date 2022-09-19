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
                    <h2 class="fs-1 text-uppercase text-center fw-bold">Roche Bobois Building</h2>
                </div>
            </div>
            <div class="row">
                <div class="lifestyle">
                    <h2 class="text-uppercase fw-bold">Lifestyle</h2>
                    @foreach ($buildings as $building)
                        @if ($building->categoria === 'lifestyle')
                            <div class="grid-event">
                                <div class="img_fecha" style="background: url('{{ asset('storage/'.$building->imagen_destacada) }}');background-size: cover;background-position: center;background-repeat: no-repeat;">
                                </div>
                                <div class="linear_color">
                                    <h3 class="font-weight-bold w-100">{{ $building->nombre_hotel }}</h3>
                                    <p>{!! $building->descripcion !!}</p>
                                </div>
                            </div>
                        @endif
                        
                    @endforeach
                </div>
                
                <div class="hoteles">
                    <h2 class="text-uppercase fw-bold">Hotelería</h2>
                    @foreach ($buildings as $building)
                        @if ($building->categoria === 'hoteles')
                            <div class="grid-event">
                                <div class="img_fecha" style="background: url('{{ asset('storage/'.$building->imagen_destacada) }}');background-size: cover;background-position: center;background-repeat: no-repeat;">
                                </div>
                                <div class="linear_color">
                                    <h3 class="font-weight-bold w-100">{{ $building->nombre_hotel }}</h3>
                                    <p>{!! $building->descripcion !!}</p>
                                </div>
                            </div>
                        @endif
                    @endforeach  
                </div>

                <div class="boutiques">
                    <h2 class="text-uppercase fw-bold">Boutiques</h2>
                    @foreach ($buildings as $building)
                        @if ($building->categoria === 'boutiques')
                            <div class="grid-event">
                                <div class="img_fecha" style="background: url('{{ asset('storage/'.$building->imagen_destacada) }}');background-size: cover;background-position: center;background-repeat: no-repeat;">
                                </div>
                                <div class="linear_color">
                                    <h3 class="font-weight-bold w-100">{{ $building->nombre_hotel }}</h3>
                                    <p>{!! $building->descripcion !!}</p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

                <div class="restaurantes">
                    <h2 class="text-uppercase fw-bold">Restaurantes</h2>
                    @foreach ($buildings as $building)
                        @if ($building->categoria === 'restaurantes')
                            <div class="grid-event">
                                <div class="img_fecha" style="background: url('{{ asset('storage/'.$building->imagen_destacada) }}');background-size: cover;background-position: center;background-repeat: no-repeat;">
                                </div>
                                <div class="linear_color">
                                    <h3 class="font-weight-bold w-100">{{ $building->nombre_hotel }}</h3>
                                    <p>{!! $building->descripcion !!}</p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

                <div class="residencial">
                    <h2 class="text-uppercase fw-bold">Residencial</h2>
                    @foreach ($buildings as $building)
                        @if ($building->categoria === 'residencial')
                            <div class="grid-event">
                                <div class="img_fecha" style="background: url('{{ asset('storage/'.$building->imagen_destacada) }}');background-size: cover;background-position: center;background-repeat: no-repeat;">
                                </div>
                                <div class="linear_color">
                                    <h3 class="font-weight-bold w-100">{{ $building->nombre_hotel }}</h3>
                                    <p>{!! $building->descripcion !!}</p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
