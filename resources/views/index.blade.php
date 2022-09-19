@extends('layouts.app')

<style>
    .card_black {
        background: #000;
        padding: 1rem 3rem;
        width: 500px;
        text-align: left;
        color: #fff;
        top: 8rem;
        right: 0;
    }

    .swiper-button-prev {
        background: #000;
        color: #fff !important;
        padding: 2rem !important;
        opacity: 1 !important;
        left: 0 !important;
    }

    .swiper-button-next {
        background: #000;
        color: #fff !important;
        padding: 2rem !important;
        right: 0 !important;
    }

    .card_black h2 {
        font-weight: bold;
        font-size: 3rem;
        margin: 1rem 0;
    }

    .bg_dark_1 {
        background: #000;
    }

    .bg_white_1 {
        background: #E5E5E5;
    }

    .bg_white_1 p {
        font-size: 22px;
    }

    .bg_white_1 h3 {
        font-size: 3.5rem !important;
        font-family: 'Cormorant';
        background: #8A6E2F;
        background: -webkit-radial-gradient(circle farthest-side at top center, #8A6E2F 0%, #FEDB37 0%, #9F7928 63%);
        background: -moz-radial-gradient(circle farthest-side at top center, #8A6E2F 0%, #FEDB37 0%, #9F7928 63%);
        background: radial-gradient(circle farthest-side at top center, #8A6E2F 0%, #FEDB37 0%, #9F7928 63%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;

    }

    .img_cards_section {
        width: 100%;
        height: 500px;
        object-fit: cover;
    }

    .bg_dark_1 h3 {
        font-size: 2.5rem !important;
        font-weight: bold;
        color: #fff;
    }

    .bg_dark_1 p {
        text-align: center;
        text-transform: none;
        letter-spacing: 0px;
        font-weight: 100;
        font-style: italic;
        font-size: 22px;
        color: #fff;
    }

    .btn_descargar_catalogo {
        background: #000;
        text-transform: uppercase;
        text-decoration: none !important;
        color: #fff;
        font-size: 1rem;
        border: 2px solid #fff;
        padding: 0.5rem;
        width: 100%;
        max-width: 180px;
        min-width: 180px;
        text-align: center;
        transition: .3s ease all;
        margin: 0 auto;
    }

    .btn_descargar_catalogo:hover {
        color: #fff;
    }

    p.font-normal {
        font-style: normal;
        font-weight: unset;
    }

    /*
        ----------------------------------
        27. Stretcher
        ----------------------------------
    */
    .stretcher-wrapper {
        margin: 0;
        padding: 0;
        background-color: #000;
    }

    .stretcher-wrapper header {
        background-color: white;
        position: relative;
        margin-bottom: 0;
        padding: 30px 0;
    }

    .stretcher-wrapper header:before {
        content: '';
        position: absolute;
        border-width: 20px 20px 0px 20px;
        border-style: solid solid solid solid;
        border-color: white transparent white;
        bottom: -15px;
        left: 50%;
        z-index: 2;
        -moz-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        -o-transform: translateX(-50%);
        -webkit-transform: translateX(-50%);
        transform: translateX(-50%);
    }

    .stretcher-wrapper .stretcher {
        position: relative;
        width: 100%;
        height: auto;
        overflow: hidden;
        font-size: 0;
        margin: 0;
        padding: 0;
    }

    .stretcher-wrapper .stretcher .stretcher-item {
        position: relative;
        background-size: cover;
        background-position: center;
        display: block;
        width: 100%;
        height: 30vh;
        overflow: hidden;
        -moz-transition: width 0.5s;
        -o-transition: width 0.5s;
        -webkit-transition: width 0.5s;
        transition: width 0.5s;
    }

    .stretcher-wrapper .stretcher .stretcher-item>a {
        position: absolute;
        width: 100%;
        height: 100%;
        -moz-transform: translate3d(0, 100%, 0);
        -ms-transform: translate3d(0, 100%, 0);
        -o-transform: translate3d(0, 100%, 0);
        -webkit-transform: translate3d(0, 100%, 0);
        transform: translate3d(0, 100%, 0);
        z-index: 99;
    }

    .stretcher-wrapper .stretcher .stretcher-item:hover>a {
        -moz-transform: translate3d(0, 0, 0);
        -ms-transform: translate3d(0, 0, 0);
        -o-transform: translate3d(0, 0, 0);
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
    }

    .stretcher-wrapper .stretcher .stretcher-item.more {
        background-color: #000;
        position: relative;
        height: 100px;
    }

    .stretcher-wrapper .stretcher .stretcher-item.more a {
        position: absolute;
        width: 100%;
        height: 100%;
    }

    .stretcher-wrapper .stretcher .stretcher-item.more .more-icon {
        font-size: 70px;
        color: white;
        position: absolute;
        left: 50%;
        top: 50%;
        -moz-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        -o-transform: translate(-50%, -50%);
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

    .stretcher-wrapper .stretcher .stretcher-item.more .more-icon,
    .stretcher-wrapper .stretcher .stretcher-item.more .more-icon span {
        -moz-transition: all 0.5s;
        -o-transition: all 0.5s;
        -webkit-transition: all 0.5s;
        transition: all 0.5s;
    }

    .stretcher-wrapper .stretcher .stretcher-item.more .more-icon span {
        display: inline-block;
    }

    .stretcher-wrapper .stretcher .stretcher-item.more .more-icon span:before,
    .stretcher-wrapper .stretcher .stretcher-item.more .more-icon span:after {
        position: absolute;
        left: 50%;
        top: 50%;
        -moz-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        -o-transform: translate(-50%, -50%);
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        -moz-transition: all 0.5s;
        -o-transition: all 0.5s;
        -webkit-transition: all 0.5s;
        transition: all 0.5s;
        white-space: nowrap;
    }

    .stretcher-wrapper .stretcher .stretcher-item.more .more-icon span:before {
        content: attr(data-title-show);
        opacity: 0;
        font-size: 16px;
    }

    .stretcher-wrapper .stretcher .stretcher-item.more .more-icon span:after {
        content: attr(data-title-hide);
        opacity: 1;
    }

    .stretcher-wrapper .stretcher .stretcher-item.more:hover .more-icon span:before {
        opacity: 1;
    }

    .stretcher-wrapper .stretcher .stretcher-item.more:hover .more-icon span:after {
        opacity: 0;
    }

    @media (min-width: 992px) {

        .stretcher-wrapper .stretcher .stretcher-item.more,
        .stretcher-wrapper .stretcher .stretcher-item.more.inactive {
            width: 8%;
        }

        .stretcher-wrapper .stretcher .stretcher-item.more.active {
            width: 28%;
        }

        .stretcher-wrapper .stretcher .stretcher-item.more.more {
            height: 100%;
        }
    }

    .stretcher-wrapper .stretcher .stretcher-item.inactive,
    .stretcher-wrapper .stretcher .stretcher-item.active {
        width: 100%;
    }

    @media (min-width: 992px) {
        .stretcher-wrapper .stretcher .stretcher-item {
            width: 23%;
            height: 100%;
            display: inline-block;
        }

        .stretcher-wrapper .stretcher .stretcher-item.inactive {
            width: 18%;
        }

        .stretcher-wrapper .stretcher .stretcher-item.active {
            width: 38%;
        }
    }

    .stretcher-wrapper .stretcher .stretcher-item .stretcher-logo {
        /*background-color: rgba($color-base, 0.0);*/
        opacity: 1;
        position: absolute;
        width: 100%;
        height: 100%;
        -moz-transition: opacity 0.2s;
        -o-transition: opacity 0.2s;
        -webkit-transition: opacity 0.2s;
        transition: opacity 0.2s;
        font-size: initial;
        color: white;
    }

    .stretcher-wrapper .stretcher .stretcher-item .stretcher-logo img,
    .stretcher-wrapper .stretcher .stretcher-item .stretcher-logo .text {
        position: absolute;
        left: 50%;
        top: 50%;
        -moz-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        -o-transform: translate(-50%, -50%);
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

    .stretcher-wrapper .stretcher .stretcher-item .stretcher-logo .text {
        text-align: center;
    }

    .stretcher-wrapper .stretcher .stretcher-item .stretcher-logo .text .f-icon {
        font-size: 100px;
    }

    .stretcher-wrapper .stretcher .stretcher-item .stretcher-logo .text .text-intro {
        display: block;
        background: rgb(0 0 0 / 50%);
        padding: 1rem 2rem;
        border: none;
    }

    .stretcher-wrapper .stretcher .stretcher-item:hover .stretcher-logo {
        opacity: 0;
    }

    .stretcher-wrapper .stretcher .stretcher-item figure {
        background-color: rgb(0 0 0 / 50%);
        color: white;
        position: absolute;
        z-index: 9;
        font-size: initial;
        padding: 20px 10px;
        width: 100%;
        left: 0;
        bottom: 0;
        -moz-transform: translate3d(0, 100%, 0);
        -ms-transform: translate3d(0, 100%, 0);
        -o-transform: translate3d(0, 100%, 0);
        -webkit-transform: translate3d(0, 100%, 0);
        transform: translate3d(0, 100%, 0);
        -moz-transition: all 0.5s;
        -o-transition: all 0.5s;
        -webkit-transition: all 0.5s;
        transition: all 0.5s;
    }

    .stretcher-wrapper .stretcher .stretcher-item figure h4 {
        margin-bottom: 0;
    }

    @media (min-width: 992px) {
        .stretcher-wrapper .stretcher .stretcher-item figure {
            padding: 20px 30px;
        }
    }

    .stretcher-wrapper .stretcher .stretcher-item:hover figure {
        -moz-transform: translate3d(0, 0, 0);
        -ms-transform: translate3d(0, 0, 0);
        -o-transform: translate3d(0, 0, 0);
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
    }

    @media (min-width: 992px) {
        .stretcher-wrapper .stretcher {
            height: 500px;
            white-space: nowrap;
        }

        .stretcher-wrapper.stretcher-wrapper-frontpage .stretcher {
            height: 100vh;
        }

        .stretcher-wrapper.stretcher-wrapper-frontpage .stretcher .stretcher-item figure {
            bottom: 20%;
            -moz-transform: translate3d(-100%, 0, 0);
            -ms-transform: translate3d(-100%, 0, 0);
            -o-transform: translate3d(-100%, 0, 0);
            -webkit-transform: translate3d(-100%, 0, 0);
            transform: translate3d(-100%, 0, 0);
            overflow: hidden;
            padding: 50px 30px;
        }

        .stretcher-wrapper.stretcher-wrapper-frontpage .stretcher .stretcher-item:hover figure {
            -moz-transform: translate3d(0, 0, 0);
            -ms-transform: translate3d(0, 0, 0);
            -o-transform: translate3d(0, 0, 0);
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
    }

    /* OWL */
    .header-content {
    padding: 0;
    position: relative;
    overflow: hidden;
}

.header-content .item {
    height: 100vh;
    position: relative;
    overflow: hidden;
    background-position: center;
    background-size: cover;
}

.header-content .item .box {
    position: absolute;
    width: 100%;
    color: #fff;
    top: 30%;
    -moz-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    -o-transform: translateY(-50%);
    -webkit-transform: translateY(-50%);
    transform: translateY(-50%);
    z-index: 99;
    background: #000;
    width: 35%;
    padding: 2rem;
    right: 0;
}

.header-content .item .title {
    color: white;
    text-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
    text-transform: none;
}

.header-content .item .btn {
    margin-top: 40px;
}

@media (min-width: 768px) {
    .header-content .item {
        height: 100vh;
    }
    .header-content .item .title {
        font-size: 300%;
    }
}

@media (min-width: 1200px) {
    .header-content .item {
        height: 100vh;
    }
    .header-content .item .title {
        font-size: 300%;
    }
}

.header-content .owl-theme .owl-controls .owl-pagination {
    text-align: end;
    padding-right: 20px;
}

.header-content .owl-theme .owl-controls .owl-buttons div span {
    color: white;
}

.header-content .owl-theme .owl-controls .owl-page span {
    background: white;
}

/*  
    ----------------------------------
    42. Quotes
    ----------------------------------
*/
.quotes {
    padding: 60px 0;
    background-color: #000;
    position: relative;
    background-size: cover;
    background-position: center;
}

@media (min-width: 992px) {
    .quotes {
        padding: 80px 0;
    }
}

.quotes header {
    position: relative;
    z-index: 2;
}

.quotes header .title {
    color: white;
    text-align: center;
}

.quotes:after {
    content: "";
    display: block;
    position: absolute;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    top: 0;
    left: 0;
    z-index: 0;
}

.quotes .row {
    position: relative;
    z-index: 10;
}

.quotes .row, .quotes .row > div {
    margin: 0;
    padding: 0;
}

.quotes .quote {
    color: white;
    text-align: center;
}

.quotes .quote .image {
    -moz-border-radius: 100%;
    -webkit-border-radius: 100%;
    border-radius: 100%;
    -moz-transition: all 0.2s;
    -o-transition: all 0.2s;
    -webkit-transition: all 0.2s;
    transition: all 0.2s;
    width: 100px;
    height: 100px;
    margin-left: auto;
    margin-right: auto;
    overflow: hidden;
    top: 0;
    margin-bottom: 40px;
}

.quotes .quote .image img {
    width: 100%;
    -moz-border-radius: 100%;
    -webkit-border-radius: 100%;
    border-radius: 100%;
}

.quotes .quote .text h4, .quotes .quote .text .h4 {
    text-transform: none;
    margin-bottom: 10px;
}

.quotes .quote:hover .image {
    -moz-transform: scale(1.2);
    -ms-transform: scale(1.2);
    -o-transform: scale(1.2);
    -webkit-transform: scale(1.2);
    transform: scale(1.2);
}

.quotes .quote .more .rating {
    text-align: center;
    padding-top: 15px;
    padding-bottom: 15px;
    font-size: 20px;
}

.quotes .quote .more .rating .icon {
    width: 16px;
    display: inline-block;
}

@media (max-width: 767px) {
    .quotes .quote {
        margin-bottom: 80px;
    }
}

.quotes.quotes-slider .quote {
    padding-top: 30px;
}

.quotes.quotes-slider .quote .image img {
    width: 100px;
}

@media (max-width: 767px) {
    .quotes.quotes-slider .quote {
        margin-bottom: 0;
    }
}

.quotes.quotes-slider .owl-theme {
    margin-bottom: 20px;
}

.quotes.quotes-slider .owl-theme .owl-controls .owl-buttons > div {
    color: white;
}

.quotes.quotes-slider .owl-theme .owl-controls .owl-buttons > div span {
    background-color: transparent;
}

.quotes.quotes-slider .owl-theme .owl-controls .owl-pagination {
    position: relative;
    margin-top: 40px;
}

.quotes.quotes-slider .owl-theme .owl-controls .owl-page span {
    background-color: rgba(255, 255, 255, 0.5);
}

.quotes.quotes-slider .owl-theme .owl-controls .owl-page.active span {
    background-color: white;
    -moz-transform: scale(1.5);
    -ms-transform: scale(1.5);
    -o-transform: scale(1.5);
    -webkit-transform: scale(1.5);
    transform: scale(1.5);
}

.header-content .owl-theme .owl-controls .owl-buttons div span {
    color: white;
}

.owl-theme .owl-controls .owl-buttons .owl-prev {
    left: 0!important;
    background: #000;
}
.owl-theme .owl-controls .owl-buttons .owl-next {
    right: 0!important;
    background: #000;
}
    
.owl-theme .owl-controls .owl-buttons {
    opacity: 1!important;
}
</style>

@section('content')
    <section class="header-content">
        <div class="owl-slider">

            <!-- === slide item === -->
            @foreach ($sliders as $slider)
                <div class="item"
                    style="background-image:url({{ asset('storage/' . $slider->imagen_destacada) }}); background-size: cover; background-position: center; background-repeat: no-repeat;">
                    <div class="box">
                        <div class="container">
                            <h2 class="title animated h1" data-animation="fadeInDown">{{ $slider->nombre_producto }}</h2>
                            <div class="animated" data-animation="fadeInUp">
                                <span>diseñador </span>{{ $slider->nombre_disenador }}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!--/owl-slider-->
    </section>

    <div class="container-fluid pb-3">
        <div id="conoce_coleccion">
            <div class="row align-items-center bg_dark_1">
                <div class="col-12 col-md-6 p-0">
                    <img src="{{ asset('image/TEMPS-CALME-Outdoor-1.jpg') }}" class="img_cards_section">
                </div>
                <div class="col-12 col-md-6 text-center text-white px-5">
                    <h3>Conoce la nueva colección.</h3>
                    <p>
                        "Vive el French Art de Vivre de Roche Bobois"
                    </p>

                    <div class="d-flex">
                        <a href="contacto" class="btn_descargar_catalogo">AGENDA TU CITA</a>
                    </div>
                </div>
            </div>
        </div>

        <div id="concierge">
            <div class="row align-items-center bg_white_1">
                <div class="col-12 col-md-6 text-center text-dark p-5">
                    <img src="{{ asset('image/logo_concierge.svg') }}" class="img-fluid w-50 mb-5">
                    <p class="mb-0">Embajador de servicio</p>
                    <h3 class="fw-bold">
                        EXCLUSIVO
                    </h3>
                </div>
                <div class="col-12 col-md-6 p-0">
                    <img src="{{ asset('image/TEMPS-CALME-Outdoor-1.jpg') }}" class="img_cards_section">
                </div>
            </div>
        </div>

        <div id="roche">
            <div class="row align-items-center bg_dark_1">
                <div class="col-12 col-md-6 p-0">
                    <img src="{{ asset('image/Carrousel_Sense-Tissu_02_Flavien-Carlod_BLQ.jpg') }}"
                        class="img_cards_section">
                </div>
                <div class="col-12 col-md-6 text-center text-white px-5">
                    <img src="{{ asset('image/rochebobois_white_logo.svg') }}" class="w-50 mb-5">
                    <p class="font-normal"><strong>Creamos muebles y objetos funcionales,</strong> que responden a una idea
                        del diseño: el diseño que debe vivirse</p>
                    <p class="font-normal">
                        Roche Bobois ofrece <b>colecciones originales,</b> una fabricación exclusivamente europea y un
                        <b>alto nivel de personalización.</b>
                    </p>
                </div>
            </div>
        </div>

        <div id="showrooms">
            <div class="row">
                <div class="col-12 px-0">
                    <!-- ========================  Stretcher widget ======================== -->

                    <section class="stretcher-wrapper">
                        <!-- === stretcher header === -->

                        <header class="hidden">
                            <!--remove class 'hidden'' to show section header -->
                            <h1 class="h2 title fw-bold text-center">VISITA NUESTROS SHOWROOMS</h1>
                        </header>

                        <!-- === stretcher === -->

                        <ul class="stretcher">

                            <!-- === stretcher item === -->
                            @foreach ($showrooms as $showroom)
                                <li class="stretcher-item"
                                    style="background-image:url({{ asset('storage/' . $showroom->imagen_destacada) }});">
                                    <!--logo-item-->
                                    <div class="stretcher-logo">
                                        <div class="text">
                                            <span class="f-icon f-icon-bedroom"></span>
                                            <span class="text-intro">{{ $showroom->nombre_showroom }}</span>
                                        </div>
                                    </div>
                                    <!--main text-->
                                    <figure>
                                        <h4>{{ $showroom->nombre_showroom }}</h4>
                                        <figcaption>{{ $showroom->ciudad_showroom }}</figcaption>
                                    </figure>
                                    <!--anchor-->
                                    <a href="/showroom/{{ $showroom->slug }}">Anchor link</a>
                                </li>
                            @endforeach

                            <!-- === stretcher item more=== -->

                            <li class="stretcher-item more">
                                <div class="more-icon">
                                    <span data-title-show="Ver más" data-title-hide="+"></span>
                                </div>
                                <a href="{{ route('front.showrooms') }}"></a>
                            </li>

                        </ul>
                    </section>

                    <!-- ========================  Blog Block ======================== -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Scripts del swiper
        let swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 30,
            autoplay: {
                delay: 10000,
                disableOnInteraction: false,
            },
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });

        // Strecher accordion
        // ----------------------------------------------------------------

        var $strecherItem = $('.stretcher-item');
        $strecherItem.bind({
            mouseenter: function(e) {
                $(this).addClass('active');
                $(this).siblings().addClass('inactive');
            },
            mouseleave: function(e) {
                $(this).removeClass('active');
                $(this).siblings().removeClass('inactive');
            }
        });

        // OWL
        var arrowIcons = [
            '<span class="icon icon-chevron-left"></span>',
            '<span class="icon icon-chevron-right"></span>'
        ];

        $.each($(".owl-slider"), function(i, n) {

            $(n).owlCarousel({
                autoHeight: true,
                navigation: true,
                navigationText: arrowIcons,
                items: 1,
                singleItem: true,
                addClassActive: true,
                transitionStyle: "fadeUp",
                afterMove: animatetCaptions,
                autoPlay: 8000,
                stopOnHover: true
            });

            animatetCaptions();

            function animatetCaptions(event) {
                "use strict";
                var activeItem = $(n).find('.owl-item.active'),
                    timeDelay = 100;
                $.each(activeItem.find('.animated'), function(j, m) {
                    var item = $(m);
                    item.css('animation-delay', timeDelay + 'ms');
                    timeDelay = timeDelay + 180;
                    item.addClass(item.data('animation'));
                    setTimeout(function() {
                        item.removeClass(item.data('animation'));
                    }, 2000);
                });
            }

            if ($(n).hasClass('owl-slider-fullscreen')) {
                $('.header-content .item').height($(window).height());
            }
        });
    </script>
@endsection
