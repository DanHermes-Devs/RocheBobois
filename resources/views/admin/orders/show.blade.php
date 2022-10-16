@extends('admin.layouts.app')
<style>

    .btn_outline_dark {
        background: transparent;
        border: 1px solid #000;
        padding: 0;
        color: #000;
        text-decoration: none;
        width: 180px;
        text-align: center;
        display: flex;
        height: 48px;
        align-items: center;
        justify-content: center;
        gap: .5rem;
    }

    select.form-control {
        padding: 0.6rem !important;
        height: 44.22px !important;
        border-radius: 0 !important;
    }
</style>
@section('content')
<div class="container">
    <div class="card p-4">
        <div class="row mb-5">
            <div class="col-12 mb-4">
                <div class="d-flex flex-column">
                    <h3>
                        Detalles de la Orden 
                        <span class="fw-bold"><b>#{{ $order->order_no }}</b></span>
                    </h3>
                    <p>
                        Pago a través de Paga con Tarjeta de crédito o débito (<a target="_blank" href="https://dashboard.stripe.com/test/payments/{{ $order->transaction_id }}">{{ $order->transaction_id }}</a>). Pagado el {{ $order->created_at->format('d/m/Y') }}.
                    </p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                {{-- Cambiar el Estado de la compra --}}
                <form method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="status">Estado</label>
                        <select name="status" id="status" class="form-control">
                            <option>-- Selecciona una opción --</option>
                            <option value="Pendiente" {{ $order->status == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                            <option value="Procesando" {{ $order->status == 'Procesando' ? 'selected' : '' }}>En Proceso</option>
                            <option value="Completado" {{ $order->status == 'Completado' ? 'selected' : '' }}>Completado</option>
                            <option value="Declinado" {{ $order->status == 'Declinado' ? 'selected' : '' }}>Declinado</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn_outline_dark btn_action actualizar">Actualizar</button>
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-4">
                <div class="d-flex flex-column mb-4">
                    <p class="font-weight-bold">Direacción de Envio</p>
                    <p class="mb-0">{{ $order->user->name }}</p>
                    <p class="mb-0">{{ $order->direccion_principal }}</p>
                    <p class="mb-0">{{ $order->direccion_secundaria }}</p>
                    <p class="mb-0">{{ $order->pais }}</p>
                    <p class="mb-0">{{ $order->estado }}</p>
                    <p class="mb-0">{{ $order->codigo_postal }}</p>
                </div>

                <div class="d-flex flex-column mb-4">
                    <p class="font-weight-bold">Dirección de correo electrónico:</p>
                    <p class="mb-0">{{ $order->user->email }}</p>
                </div>
                
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Teléfono:</p>
                    <p class="mb-0">{{ $order->user->telefono }}</p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="d-flex flex-column mb-4">
                    <p class="font-weight-bold">Método de pago:</p>
                    <p class="mb-0">Paga con Tarjeta de crédito o débito</p>
                </div>
                <div class="d-flex flex-column mb-4">
                    <p class="font-weight-bold">Estado de la orden:</p>
                    <p class="mb-0">
                        {{-- Mostrar un color de badge dependiendo el estado --}}
                        @if ($order->status == 'Pendiente')
                            <span class="badge bg-warning text-dark p-3 rounded-0" style="font-size: 1rem;">{{ $order->status }}</span>
                        @elseif ($order->status == 'Procesando')
                            <span class="badge bg-primary text-white p-3 rounded-0" style="font-size: 1rem;">{{ $order->status }}</span>
                        @elseif ($order->status == 'Completado')
                            <span class="badge bg-success text-white p-3 rounded-0" style="font-size: 1rem;">{{ $order->status }}</span>
                        @elseif ($order->status == 'Declinado')
                            <span class="badge bg-danger text-white p-3 rounded-0" style="font-size: 1rem;">{{ $order->status }}</span>
                        @endif
                    </p>
                </div>
                <div class="d-flex flex-column mb-4">
                    <p class="font-weight-bold">Fecha de la orden:</p>
                    <p class="mb-0">{{ $order->created_at->format('d/m/Y') }}</p>
                </div>
            </div>
        </div>

        {{-- Fila donde se muestran los articulos vendidos en esta orden --}}
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderItems as $item)
                            <tr>
                                <td>{{ $item->product->nombre_producto }}</td>
                                <td>{{ $item->product->precio }}</td>
                                <td>x{{ $item->quantity }}</td>
                                <td>${{ $item->price * $item->quantity }}</td>
                            </tr>
                        @endforeach
                            <tr class="bg-light">
                                <td colspan="3" class="text-right font-weight-bold">Subtotal:</td>
                                <td>${{ $order->total }}</td>
                            </tr>
                            <tr class="bg-light">
                                <td colspan="3" class="text-right font-weight-bold">Total:</td>
                                <td>${{ $order->total }}</td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>

    {{-- {{ dump($orderItems->product->nombre_producto) }} --}}
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.actualizar').click(function(e) {
                e.preventDefault();
                if ($('#status').val() == '-- Selecciona una opción --') {
                    // SweetAlert2
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Debes seleccionar un estado para la orden',
                    })
                } else {

                    $.ajax({
                        type: "PUT",
                        url: "{{ route('update.order', $order->id) }}",
                        data: {
                            "status": $('#status').val()
                        },
                        success: function(response) {
                            if (response.status == 'success') {
                                // SweetAlert2
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Estado de la orden actualizado',
                                    text: 'El estado de la orden ha sido actualizado correctamente',
                                    showConfirmButton: true,
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'Ok',
                                    // timer: 1500,
                                    // timerProgressBar: true,
                                    // didOpen: () => {
                                    //     Swal.showLoading()
                                    // },
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        $('.btn_action').waitMe('hide');
                                        location.reload();
                                    }
                                })
                            }
                        },
                        error: function(error) {
                            console.log(error);
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Ha ocurrido un error al actualizar el estado de la orden',
                            })
                        }
                    });
                }
            });
        });
    </script>
@endsection