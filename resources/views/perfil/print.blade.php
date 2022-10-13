@php
$order = $order;
@endphp
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Orden #{{ $order->invoice_no }}</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }

        table {
            font-size: x-small;
            border-collapse: collapse;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        th,
        td {
            padding: .4rem;
        }

        .th_subtotal{
            background-color: #eee;
            color: #000;
            font-weight: bold;
            text-align: right;
        }

        th {
            background-color: rgba(255, 255, 255, 0.2);
            color: #fff;
            font-weight: bold;
        }

        th {
            text-align: left;
        }

        thead th {
            background-color: #000;
        }

        #tabla_products > thead > tr > th,
        #tabla_products > tbody > tr > th,
        #tabla_products > tfoot > tr > th,
        #tabla_products > thead > tr > td,
        #tabla_products > tbody > tr > td,
        #tabla_products > tfoot > tr > td {
            border: 1px solid #ddd;
            border-collapse: collapse;
        }
    </style>

</head>

<body>

    <body>
        <table width="100%">
            <tr>
                <td valign="top">
                    <img src="{{ asset('image/logo.png') }}" alt="Logo" width="150">
                </td>
                <td align="right">
                    <h3 style="margin-bottom: 0;">Roche Bobois México</h3>
                    <pre style="margin: 0;">
                    concierge@rocheboboismexico.com
                </pre>
                </td>
            </tr>

        </table>

        <table width="100%">
            <tr>
                <td width="50%" valign="top">
                    <table width="100%">
                        <tr>
                            <td colspan="2"><strong>Información del cliente</strong></td>
                        </tr>
                        <tr>
                            <td>Nombre:</td>
                            <td>{{ $order->user->name }}</td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td>{{ $order->user->email }}</td>
                        </tr>
                        <tr>
                            <td>Teléfono:</td>
                            <td>{{ $order->user->telefono }}</td>
                        </tr>
                    </table>
                </td>
                {{-- Columna con la informacion del pedido --}}
                <td width="50%" valign="top">
                    <table width="100%">
                        <tr>
                            <td colspan="2"><strong>Información de la orden</strong></td>
                        </tr>
                        <tr>
                            <td width="30%">Fecha:</td>
                            <td width="70%">{{ $order->created_at->format('d/m/Y') }}</td>
                        </tr>
                        <tr>
                            <td width="30%">No. Recibo:</td>
                            <td width="70%">{{ $order->invoice_no }}</td>
                        </tr>
                        <tr>
                            <td>Orden:</td>
                            <td>#{{ $order->order_no }}</td>
                        </tr>
                        <tr>
                            <td width="30%">Estado:</td>
                            <td width="70%">
                                @if ($order->status == 'Pendiente')
                                    <span
                                        style="font-size: .5rem; padding: .5rem; background: rgba(255,193,7); color: #000; font-weight: bold;">Pendiente</span>
                                @elseif($order->status == 'Procesando')
                                    <span
                                        style="font-size: .5rem; padding: .5rem; background: rgba(255,193,7); color: #000; font-weight: bold;">Procesando</span>
                                @elseif($order->status == 'Completado')
                                    <span
                                        style="font-size: .5rem; padding: .5rem; background: rgba(76,175,80); color: #fff; font-weight: bold;">Completado</span>
                                @elseif($order->status == 'Declinado')
                                    <span
                                        style="font-size: .5rem; padding: .5rem; background: rgba(244,67,54); color: #fff; font-weight: bold;">Declinado</span>
                                @endif
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <br>

        <table width="100%" id="tabla_products">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->orderItems as $item)
                    <tr>
                        <td class="p-3">{{ $item->product->nombre_producto }}</td>
                        <td class="p-3">{{ $item->quantity }}</td>
                        <td class="p-3">${{ $item->price }}</td>
                        <td class="p-3">${{ $item->price * $item->quantity }}</td>
                    </tr>
                @endforeach
                <tr class="bg-light">
                    <td class="th_subtotal" colspan="3">Subtotal:</td>
                    <td>${{ $order->total }}</td>
                </tr>
                <tr class="bg-light">
                    <td class="th_subtotal" colspan="3">Total:</td>
                    <td>${{ $order->total }}</td>
                </tr>
            </tbody>
        </table>

        <br />

        {{-- Mensaje de agradecimiento --}}
        <table width="100%">
            <tr>
                <td>
                    <p>Gracias por tu compra!</p>
                </td>
            </tr>
        </table>
    </body>

</html>
