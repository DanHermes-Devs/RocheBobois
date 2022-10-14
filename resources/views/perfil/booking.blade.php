@extends('layouts.app')

@section('content')
<style>
    .boleto {
        width: min(100% - 5rem, 65rem);
        margin: 0 auto;
        padding: 4rem 8rem;
        /* background: linear-gradient(90deg, #434343 0%, #000000 100%); */
        background-color:hsla(0,0%,26%,1);
        background-image:
        radial-gradient(at 81% 23%, hsla(28,0%,26%,1) 0px, transparent 50%),
        radial-gradient(at 1% 2%, hsla(0,0%,0%,1) 0px, transparent 50%),
        radial-gradient(at 20% 77%, hsla(355,0%,26%,1) 0px, transparent 50%),
        radial-gradient(at 33% 29%, hsla(340,0%,0%,1) 0px, transparent 50%),
        radial-gradient(at 0% 100%, hsla(22,0%,26%,1) 0px, transparent 50%),
        radial-gradient(at 99% 99%, hsla(241,0%,0%,1) 0px, transparent 50%),
        radial-gradient(at 100% 0%, hsla(343,0%,26%,1) 0px, transparent 50%);
        border-radius: 2rem;
        position: relative;
    }

    .boleto::before,
    .boleto::after {
        position: absolute;
        content: '';
        background-color: #fff;
        width: 5rem;
        height: 5rem;
        top: calc(50% - 2.5rem);
    }

    .boleto::before {
        clip-path: circle(50% at 25% 50%);
        left: 0;
    }

    .boleto::after {
        clip-path: circle(50% at 75% 50%);
        right: 0;
    }

    .boleto__contenido p {
        color: white;
        font-size: 1.5rem;
        font-weight: 500;
        margin: 0;
    }

    .boleto_head {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .boleto_head .qr_code{
        width: 13rem;
    }

    .imagen_qr {
        text-align: center;
    }
</style>
    <div class="container mt-5 pt-5">
        <div class="row mb-5 justify-content-center">
            <button class="btn_outline_dark" id="print_ticket">Descargar Boleto</button>
        </div>
        <div id="capture_algo">
            <div class="boleto boleto--{{ $reserva->codigo_reserva }}">
                <div class="boleto__contenido">
                    <div class="boleto_head">
                        <h4><img src="{{ asset('image/rochebobois_white_logo.svg') }}" alt="QR Code"></h4>
                        <img src="{{ asset('storage/uploads/qr_codes_reservations/'.$reserva->codigo_reserva.'.png') }}" class="qr_code" alt="QR Code">
                    </div>
                    <div class="info_boleto">
                        <p><b>Nombre:</b> {{ $reserva->nombre_usuario }}</p>
                        <p><b>Evento:</b> {{ $reserva->nombre_evento }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js" integrity="sha512-01CJ9/g7e8cUmY0DFTMcUw/ikS799FHiOA0eyHsUWfOetgbx/t6oV4otQ5zXKQyIrQGTHSmRVPIgrgLcZi/WMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script>
        
    var node = document.getElementById('capture_algo');
    document.querySelector('#print_ticket').addEventListener('click', function() {
        $(this).waitMe();
        domtoimage.toPng(node)
        .then(function (dataUrl) {
            // Si es success se quita el waitMe
            $('#print_ticket').waitMe('hide');
            var img = new Image();
            img.src = dataUrl;

            // Descargar imagen
            var link = document.createElement('a');
            link.download = {{ $reserva->codigo_reserva }}+'.png';
            link.href = dataUrl;
            link.click();
        })
        .catch(function (error) {
            console.error('oops, something went wrong!', error);
        });
    });
 
    </script>
@endsection
