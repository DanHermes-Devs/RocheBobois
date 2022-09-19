@component('vendor.mail.html.message')
# Hola!
<p>
    Tienes un nuevo mensaje de <b>{{ $correo_electronico }}</b> en tu sitio web.
<br>
    <ul>
        <li>Nombre completo: <b>{{ $nombre_completo }} </b></li>
        <li>Correo electrónico: <b>{{ $correo_electronico }} </b></li>
        <li>Teléfono: <b>{{ $telefono }} </b></li>
        <li>Sucursal: <b>{{ $sucursal }} </b></li>
        <li>Productos interesados: <b>{{ $productos_interesado }} </b></li>
        <li>Newsletter: <b>{{ $newsletter }} </b></li>
    </ul>
</p>
@endcomponent