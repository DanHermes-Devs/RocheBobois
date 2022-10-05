@extends('layouts.app')
<style>
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
            width: 50%;
            height: 100%;
            display: inline-block;
        }

        .stretcher-wrapper .stretcher .stretcher-item.inactive {
            width: 40%;
        }

        .stretcher-wrapper .stretcher .stretcher-item.active {
            width: 60%;
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
</style>
@section('content')
    <div class="container-fluid py-5 mt-5">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <h2 class="fs-1 text-uppercase text-center fw-bold">HOME OFFICE</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 px-0">
                <!-- ========================  Stretcher widget ======================== -->
    
                <section class="stretcher-wrapper">
                    <!-- === stretcher header === -->
    
                    <!-- === stretcher === -->
    
                    <ul class="stretcher">
                        @foreach ($categorias as $building)
                            <li class="stretcher-item" style="background-image: url({{ asset('storage/' . $building->imagen_destacada) }});background-size: contain;background-repeat: no-repeat;background-position: center;background-color: #fff;">
                                <!--logo-item-->
                                <div class="stretcher-logo">
                                    <div class="text">
                                        <span class="f-icon f-icon-bedroom"></span>
                                        <span class="text-intro text-uppercase font-weight-bold">{{ $building->nombre }}</span>
                                    </div>
                                </div>
                                <!--main text-->
                                <figure>
                                    <h4>{{ $building->nombre }}</h4>
                                </figure>
                                <!--anchor-->
                                <a href="{{ route('home-office.show', $building->slug) }}" class="stretcher-link"></a>
                            </li>
                        @endforeach
                    </ul>
                </section>
    
                <!-- ========================  Blog Block ======================== -->
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
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
</script>
@endsection
