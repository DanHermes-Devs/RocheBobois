@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="card p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0 fw-bold">Ordenes</h2>
            </div>

            <table class="table table-striped" id="table_orders">
                <thead>
                    <tr>
                        <th scope="col">Orden</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Total</th>
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
            let table_orders = $('#table_orders').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                bAutoWidth: false,
                ajax: {
                    url: "{{ route('index.orders') }}",
                    type: "GET",
                },
                columns: [
                    { data: 'order_no', name: 'order_no' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'total', name: 'total' },
                    { data: 'action', name: 'action', orderable: false, searchable: false },
                ],
                columnDefs: [
                    {
                        targets: 0,
                        render: function(data, type, row) {
                            return `#${row.order_no} - ${row.nombre_completo}`;
                        }
                    },
                    {
                        targets: 1,
                        render: function(data, type, row) {
                            // Formatear la fecha a dd/mm/yyyy
                            let date = new Date(row.created_at);
                            let day = date.getDate();
                            let month = date.getMonth() + 1;
                            let year = date.getFullYear();
                            return `${day}/${month}/${year}`;
                        }
                    },
                    {
                        targets: 2,
                        render: function(data, type, row) {
                            return `$${row.total}`;
                        }
                    },
                ],
                "language": idiomaDataTable
            });

            table_homeOffices.draw();
        });
    </script>
@endsection
