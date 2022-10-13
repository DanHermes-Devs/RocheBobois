@component('vendor.mail.html.message')
<style>
.table{
width: 100%;
max-width: 100%;
margin-bottom: 20px;
}

.table > thead > tr > th,
.table > tbody > tr > th,
.table > tfoot > tr > th,
.table > thead > tr > td,
.table > tbody > tr > td,
.table > tfoot > tr > td {
padding: 8px;
line-height: 1.42857143;
vertical-align: top;
border-top: 1px solid #ddd;
}

.table > thead > tr > th {
vertical-align: bottom;
border-bottom: 2px solid #ddd;
}

.table-bordered > thead > tr > th,
.table-bordered > tbody > tr > th,
.table-bordered > tfoot > tr > th,
.table-bordered > thead > tr > td,
.table-bordered > tbody > tr > td,
.table-bordered > tfoot > tr > td {
border: 1px solid #ddd;
}

.table-striped > tbody > tr:nth-of-type(odd) {
background-color: #f9f9f9;
}
</style>
# Hola {{ $data['nombre_completo'] }},
<p>
Solo para que lo sepas — hemos recibido tu pedido <b>#{{ $data['order_no'] }}</b> en <b>{{ config('app.name') }}</b> y ahora se está procesando:
</p>

<p>
<b>[PEDIDO #{{ $data['order_no'] }}] -
(@php
// Convertir fecha con Carbon
$date = new Carbon\Carbon($data['created_at']);

echo $date->format('d M Y');
@endphp)
</b>
</p>


<table class="table table-striped table-bordered">
<thead>
<tr>
<th style="text-align:left;">Producto</th>
<th style="text-align:left;">Cantidad</th>
<th style="text-align:left;">Precio</th>
</tr>
</thead>
<tbody>

@foreach ($data['prods'] as $prod)
<tr>
<td>{{ $prod->nombre_producto }}</td>
<td>{{ $prod->quantity }}</td>
<td>{{ $prod->precio }}</td>
</tr>
@endforeach
<tr>
<td colspan="2" style="text-align:right;">Total</td>
<td>{{ $data['total'] }}</td>
</tr>
</tbody>
</table>

<h2>
Dirección de envío
</h2>

<p>
{{ $data['nombre_completo'] }}<br>
{{ $data['email'] }}<br>
{{ $data['direccion_principal'] }}<br>
{{ $data['pais'] }}<br>
{{ $data['estado'] }}<br>
{{ $data['codigo_postal'] }}<br>
{{ $data['telefono'] }}<br>
</p>

<p>
¡Gracias por usar <b>{{ config('app.name') }}</b>!
</p>
@endcomponent