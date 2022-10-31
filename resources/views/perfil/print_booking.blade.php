<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Reserva #{{ $reserva->codigo_reserva }}</title>

    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap');

        /* importat la fuente Helvetica */
        @font-face {
            font-family: 'Helvetica';
            src: url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap');
        }
        * {
            font-family: 'Helvetica', sans-serif;
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
                            <td>{{ $reserva->nombre_usuario }}</td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td>{{ $reserva->email_usuario }}</td>
                        </tr>
                        <tr>
                            <td>Teléfono:</td>
                            <td>{{ $reserva->telefono_usuario }}</td>
                        </tr>
                    </table>
                </td>
                {{-- Columna con la informacion del pedido --}}
                <td width="50%" valign="top">
                    <table width="100%">
                        <tr>
                            <td colspan="2"><strong>Información de la reserva</strong></td>
                        </tr>
                        <tr>
                            <td width="30%">Fecha:</td>
                            {{-- Convertir la fecha con Carbon a d/m/y --}}
                            <td>{{ \Carbon\Carbon::parse($reserva->fecha_reserva)->format('d/m/Y') }}</td>
                        </tr>
                        <tr>
                            <td>Hora:</td>
                            <td>{{ $reserva->hora }}</td>
                        </tr>
                        <tr>
                            <td width="30%">No. de reserva:</td>
                            <td width="70%">{{ $reserva->codigo_reserva }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <br>

        <table width="100%" id="tabla_products">
            <thead>
                <tr>
                    <th>Código QR de Reserva</th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-light">
                    <td>
                        <img src="{{ asset('/storage/uploads/qr_codes_reservations/'.$reserva->codigo_reserva.'.png') }}" alt="QR Code" width="150">
                    </td>
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
