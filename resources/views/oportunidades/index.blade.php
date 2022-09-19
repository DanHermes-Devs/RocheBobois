@extends('layouts.app')

@section('content')
    <div class="container-fluid py-5 my-5">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <h2 class="fs-1 text-uppercase text-center fw-bold">OPORTUNIDADES únicas</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($op_unicas as $oportunidad)
                    {{-- Grid de oportunidados --}}
                    <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                        <div class="card text-center">
                            <img src="{{ asset('storage/' . $oportunidad->imagen_1) }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $oportunidad->nombre_oportunidado }}</h5>
                                <p class="card-text">
                                    <span class="text-decoration-line-through">${{ $oportunidad->precio }} USD </span>
                                    ${{ $oportunidad->precio_descuento }} USD
                                </p>
                                {{-- <a href="#" class="btn_roche_outline_dark">Ver más</a> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
                {{ $op_unicas->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
