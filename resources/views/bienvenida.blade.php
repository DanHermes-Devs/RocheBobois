@extends('layouts.app')

<style>
    .bg-black {
        background: #000 !important;
        padding-bottom: 2rem;
    }

    .row-gap-3 {
        row-gap: 3rem;
    }

    .anchor-items {
        background: #000;
        padding: 0;
        color: #fff;
        text-decoration: underline;
        width: 100%;
        text-align: center;
        display: flex;
        height: 100px;
        word-wrap: break-word;
        align-items: center;
        justify-content: center;
        max-width: 150px;
        min-width: 150px;
    }

    .info_showroom {
        display: flex;
        margin: 0 auto;
        gap: 2rem;
        flex-wrap: wrap;
        justify-content: center;
    }

    .row.card-e5 {
        background: #E5E5E5;
        padding: 3rem;
        margin-top: 5.5rem;
    }

    .image_100 {
        width: 50%;
    }

    a.anchor-items {
        color: #FFF;
        text-decoration: underline !important;
    }

    .linear_color {
        position: absolute;
        background: linear-gradient(180deg, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.75) 100%), url(rosTZ68q_4x.jpg);
        height: 100%;
        width: 100%;
        display: flex;
        align-items: end;
        padding: 0 1rem;
    }

    .gap-3 {
        row-gap: 2rem;
    }

    /* Media querys */
    /*=============================================
    TABLET HORIZONTAL (LG revisamos en 1024px)
    =============================================*/

    @media (max-width:1199px) and (min-width:992px) {}

    /*=============================================
    TABLET VERTICAL (MD revisamos en 768px)
    =============================================*/

    @media (max-width:991px) and (min-width:768px) {}

    /*=============================================
    MÓVIL HORIZONTAL (SM revisamos en 576px)
    =============================================*/

    @media (max-width:767px) and (min-width:576px) {}

    /*=============================================
    MOVIL VERTICAL (revisamos en 320px)
    =============================================*/

    @media (max-width:575px) {
        .image_100 {
            width: 100%;
        }
    }
</style>

@section('content')
    <div class="container-fluid py-5">
        <div class="row bg-black mb-4">
            <div class="container py-5">
                <img src="https://rocheboboismexico.com/wp-content/uploads/2022/09/logo_white.svg"
                    class="img-fluid image_100 d-flex m-auto" alt="Concierge">
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="text-center">
                        <b>Bienvenido</b> al escaparate más exclusivo de <b>Roche Bobois</b>, elegido especialemente para
                        ti, <br>
                        <span class="fs-1"><b>{{ Auth::user()->name }}</b></span>
                    </p>
                </div>
            </div>
            <div class="row row-gap-3">
                <div class="col-12 col-md-4 mb-4 mb-md-0">
                    <a href="{{ route('front.best-seller') }}">
                        <div class="position-relative"
                            style="background-image: url(https://rocheboboismexico.com/wp-content/uploads/2022/09/2021_2_PHENIX_Paravent_lumineux_3_det_pdf_ht-scaled.jpg); height: 230px;background-position: center;background-size: contain;background-repeat: no-repeat;">
                            <div class="linear_color">
                                <h4 class="text-uppercase text-white w-100 text-center">Best Seller</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-md-4 mb-4 mb-md-0">
                    <a href="{{ route('front.colecciones') }}">
                        <div class="position-relative"
                            style="background-image: url(https://rocheboboismexico.com/wp-content/uploads/2022/09/Pulp_bureau_AMB_1_2022.jpg); height: 230px;background-position: center;background-size: cover;background-repeat: no-repeat;">
                            <div class="linear_color">
                                <h4 class="text-uppercase text-white w-100 text-center">Colecciones Especiales</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-md-4 mb-4 mb-md-0">
                    <a href="{{ route('front.eventos') }}">
                        <div class="position-relative"
                            style="background-image: url(https://rocheboboismexico.com/wp-content/uploads/2022/09/Captura-de-Pantalla-2022-09-21-a-las-21.26.01.png); height: 230px;background-position: center;background-size: cover;background-repeat: no-repeat;">
                            <div class="linear_color">
                                <h4 class="text-uppercase text-white w-100 text-center">Eventos</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-md-4 mb-4 mb-md-0">
                    <a href="{{ route('front.home-office') }}">
                        <div class="position-relative"
                            style="background-image: url(https://rocheboboismexico.com/wp-content/uploads/2022/09/2007_2__Furtif_bureau_amb_pdf_ht-800x533.jpg); height: 230px;background-position: center;background-size: cover;background-repeat: no-repeat;">
                            <div class="linear_color">
                                <h4 class="text-uppercase text-white w-100 text-center">Home Office</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-md-4 mb-4 mb-md-0">
                    <a href="{{ route('front.building') }}">
                        <div class="position-relative"
                            style="background-image: url(https://rocheboboismexico.com/wp-content/uploads/2022/09/7.jpg); height: 230px;background-position: center;background-size: cover;background-repeat: no-repeat;">
                            <div class="linear_color">
                                <h4 class="text-uppercase text-white w-100 text-center">Roche Bobois Building</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-md-4 mb-4 mb-md-0">
                    <a href="{{ route('front.oportunidadesUnicas') }}">
                        <div class="position-relative"
                            style="background-image: url(https://rocheboboismexico.com/wp-content/uploads/2022/09/2020_1_INTRIGUE_Canapes_droits_amb_pdf_lg-scaled.jpg); height: 230px;background-position: center;background-size: cover;background-repeat: no-repeat;">
                            <div class="linear_color">
                                <h4 class="text-uppercase text-white w-100 text-center">Oportunidades Únicas</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-md-4 mb-4 mb-md-0">
                    <a href="{{ route('front.sales', ['slug' => 'salas']) }}">
                        <div class="position-relative"
                            style="background-image: url(https://rocheboboismexico.com/wp-content/uploads/2022/09/scenario_2022_amb_focus_02.jpg); height: 230px;background-position: center;background-size: cover;background-repeat: no-repeat;">
                            <div class="linear_color">
                                <h4 class="text-uppercase text-white w-100 text-center">Sales</h4>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
