@extends('layouts.app')

@section('content')

{{-- Tamplate con la orden de compra --}}
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Gracias por tu compra</h3>
                </div>
                <div class="card-body">
                    {{-- <h4>Detalles de la orden</h4>
                    <p>Orden ID: {{ $order->id }}</p>
                    <p>Fecha: {{ $order->created_at }}</p>
                    <p>Total: {{ $order->billing_total }}</p>
                    <p>Método de pago: {{ $order->payment_gateway }}</p>
                    <p>Estado: {{ $order->billing_status }}</p>
                    <p>Correo: {{ $order->billing_email }}</p>
                    <p>Nombre: {{ $order->billing_name }}</p>
                    <p>Dirección: {{ $order->billing_address }}</p>
                    <p>Ciudad: {{ $order->billing_city }}</p>
                    <p>Departamento: {{ $order->billing_province }}</p>
                    <p>Código postal: {{ $order->billing_postalcode }}</p>
                    <p>Teléfono: {{ $order->billing_phone }}</p>
                    <p>Nombre del producto: {{ $order->billing_name }}</p>
                    <p>Descripción del producto: {{ $order->billing_description }}</p>
                    <p>Precio del producto: {{ $order->billing_price }}</p>
                    <p>Cantidad del producto: {{ $order->billing_quantity }}</p> --}}
                </div>
            </div>
        </div>
    </div>

@endsection