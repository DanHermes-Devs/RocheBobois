@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="card p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0 fw-bold">Reservas</h2>
            </div>


            @if (session('store'))
                <div class="alert alert-success alert-block d-flex justify-content-between">
                    <strong>{{ session('store') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            {{-- Validamos que haya registros --}}
            @if ($bookings->count())
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Nombre del Usuario</th>
                            <th scope="col">Nombre del Evento</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Hora</th>
                            <th scope="col">Estatus</th>
                            <th scope="col">Código QR</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                            <tr>
                                <td>{{ $booking->nombre_usuario }}</td>
                                <td>{{ $booking->nombre_evento }}</td>
                                <td>{{ $booking->fecha }}</td>
                                <td>{{ $booking->hora }}</td>
                                <td>
                                    @if ($booking->status == 'Confirmado')
                                        <span class="badge badge-success">Check-in</span>
                                    @else
                                        <span class="badge badge-danger">Sin check-in</span>
                                    @endif
                                </td>
                                <td>
                                    <img src="{{ asset('storage/uploads/qr_codes_reservations/' . $booking->codigo_reserva . '.png') }}" alt="QR" width="100">
                                </td>
                                <td class="d-flex" style="column-gap: .5rem;">
                                    @if($booking->status == 'Confirmado')
                                        <span></span>   
                                    @else
                                        {{-- Actualizar Estado --}}
                                        <form action="{{ route('checkin.booking', $booking->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="confirmado" value="Confirmado">
                                            <button type="submit" class="btn btn-success" title="Confirmar asistencia">
                                                <i class="fa-solid fa-check"></i>
                                            </button>
                                        </form>

                                        {{-- Eliminar --}}
                                        <button data-route="{{ route('destroy.booking', $booking->id) }}"
                                            class="btn btn-danger delete_producto" title="Cancelar reserva">
                                            <i class="fa-solid fa-xmark"></i>
                                        </button>
                                    @endif
                                    {{-- Mostrar --}}
                                    <a href="{{ route('show.booking', $booking->id) }}" class="btn btn-info" title="Ver reserva">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $bookings->links('pagination::bootstrap-4') }}
            @else
                <div class="alert alert-info">
                    No hay reservas registradas
                </div>
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

            // Eliminar Reserva
            $('.delete_producto').click(function() {
                let id = $(this).val();
                let token = $("meta[name='csrf-token']").attr("content");
                
                // Confirmar con Sweetalert
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, eliminalo!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: $(this).data('route'),
                            type: 'DELETE',
                            data: {
                                "id": id,
                                "_token": token,
                            },
                            success: function(response) {
                                console.log(response);
                                if(response.status == 'success') {
                                    Swal.fire(
                                        '¡Eliminado!',
                                        'El registro ha sido eliminado.',
                                        'success'
                                    ).then((result) => {
                                        if(result.isConfirmed) {
                                            location.reload();
                                        }
                                    });
                                }
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
