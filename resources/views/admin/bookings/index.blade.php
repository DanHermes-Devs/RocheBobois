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

            <table class="table table-striped table-hover" id="table_bookings">
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
                </tbody>
            </table>
                
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

            let table_bookings = '#table_bookings';

            $(table_bookings).DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                bAutoWidth: false,
                ajax: {
                    url: "{{ route('bookings') }}",
                    type: "GET",
                },
                columns: [
                    {data: 'nombre_usuario', name: 'nombre_usuario', width: '14.2%'},
                    {data: 'nombre_evento', name: 'nombre_evento', width: '14.2%'},
                    {data: 'fecha', name: 'fecha', width: '14.2%'},
                    {data: 'hora', name: 'hora', width: '14.2%'},
                    {data: 'status', name: 'status', width: '14.2%'},
                    {data: 'codigo_reserva', name: 'codigo_reserva', width: '14.2%'},
                    {data: 'action', name: 'action', width: '14.2%'},
                ],
                columnDefs: [
                    {
                        targets: 4,
                        render: function(data, type, row) {
                            if (data === 'Confirmado') {
                                return '<span class="badge badge-success">Check-in</span>';
                            } else {
                                return '<span class="badge badge-danger">Sin Check-in</span>';
                            }
                        }
                    },
                    {
                        targets: 5,
                        render: function(data, type, row) {
                            return `<img src="/storage/uploads/qr_codes_reservations/${data}.png" class="w-100 img-fluid">`;
                        }
                    },
                ],
                "language": idiomaDataTable
            });
        });
    </script>
@endsection
