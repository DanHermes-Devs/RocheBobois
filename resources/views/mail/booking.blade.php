@component('vendor.mail.html.message')

# Hola {{ $data->nombre_usuario }},
<p>
Tu reserva ha sido confirmada. Aquí tienes los detalles:
</p>

<ul style="margin-bottom: 1.2rem;">
    <li><b>Nombre del evento</b>: {{ $data->nombre_evento }}</li>
    <li><b>Fecha del evento</b>: {{ $data->fecha }}</li>
    <li><b>Hora del evento</b>: {{ $data->hora }}</li>
    <li><b>Correo electrónico</b>: {{ $data->email_usuario }}</li>
    <li><b>Teléfono</b>: {{ $data->telefono_usuario }}</li>
</ul>

{{-- Mostramos el codigo QR para acceder al evento --}}
<p style="margin-bottom: 1rem;">
    Muestra este código QR en la entrada del evento:
</p>
<img src="{{ asset('/storage/uploads/qr_codes_reservations/'.$data->codigo_reserva.'.png') }}" alt="{{ $data->codigo_reserva }}">

<p>
¡Gracias por usar <b>{{ config('app.name') }}</b>!
</p>
@endcomponent