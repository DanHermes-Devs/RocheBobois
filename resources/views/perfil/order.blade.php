@extends('layouts.app')

@section('content')
{{-- Vista de la orden del usuario pero desde la pagina del perfil del usuario --}}
<div class="container py-5 mt-5">
    <div class="row">
        <div class="col-12 mb-5">
            <h2 class="fs-1 text-uppercase text-center fw-bold">Orden #{{ $order->order_no }}</h2>
            <a href="{{ route('perfil.print-order', $order->id) }}" class="btn btn-primary">Imprimir Recibo</a>
        </div>
        <div class="col-md-12">
            <div class="row mb-5">
                <div class="col-md-6">
                    <h4 class="mb-4 fw-bold">Detalles del cliente</h4>
                    <p class="mb-0"><strong>Nombre:</strong> {{ $order->user->name }}</p>
                    <p class="mb-0"><strong>Email:</strong> {{ $order->user->email }}</p>
                    <p class="mb-0"><strong>Dirección de envío:</strong> {{ $order->direccion_principal }}</p>
                    <p class="mb-0"><strong>Dirección de envío opcional:</strong> {{ $order->direccion_opcional }}</p>
                    <p class="mb-0"><strong>País:</strong> {{ $order->pais }}</p>
                    <p class="mb-0"><strong>Estado:</strong> {{ $order->estado }}</p>
                    <p class="mb-0"><strong>Código postal:</strong> {{ $order->codigo_postal }}</p>
                    <p class="mb-0"><strong>Telefono:</strong> {{ $order->telefono }}</p>
                    <p class="mb-0"><strong>Fecha de la orden:</strong> {{ $order->created_at->format('d/m/Y') }}</p>
                    <p class="mb-0"><strong>Información adicional:</strong> {{ $order->informacion_adicional }}</p>
                </div>
                <div class="col-md-6">
                    <h4 class="mb-4 fw-bold">Detalles de la orden</h4>
                    <p class="mb-0"><strong>Estado:</strong>
                        @if ($order->status == 'Pendiente')
                            <span class="badge bg-warning text-dark p-2 rounded-0" style="font-size: 1rem;">Pendiente</span>
                        @elseif($order->status == 'Procesando')
                            <span class="badge bg-primary text-white p-2 rounded-0" style="font-size: 1rem;">Procesando</span>
                        @elseif($order->status == 'Completado')
                            <span class="badge bg-success text-white p-2 rounded-0" style="font-size: 1rem;">Completado</span>
                        @elseif($order->status == 'Declinado')
                            <span class="badge bg-danger text-white p-2 rounded-0" style="font-size: 1rem;">Declinado</span>
                        @endif
                    </p>
                    <p class="mb-0"><strong>No. Recibo:</strong> {{ $order->invoice_no }}</p>
                    <p class="mb-0"><strong>Total:</strong> ${{ $order->total }}</p>
                    <p class="mb-0"><strong>Método de pago:</strong> {{ $order->payment_method }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h4 class="fw-bold text-uppercase">Productos</h4>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->orderItems as $item)
                                <tr>
                                    <td>{{ $item->product->nombre_producto }}</td>
                                    <td>${{ $item->product->precio }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>${{ $item->quantity * $item->product->precio }}</td>
                                </tr>
                            @endforeach
                            <tr class="bg-light">
                                <td colspan="3" class="text-end fw-bold">Subtotal:</td>
                                <td>${{ $order->total }}</td>
                            </tr>
                            <tr class="bg-light">
                                <td colspan="3" class="text-end fw-bold">Total:</td>
                                <td>${{ $order->total }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection