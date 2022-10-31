@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="card p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0 fw-bold">Ordenes</h2>
                {{-- Crear filtro para exportar ordenes por fecha --}}
                <div class="row align-items-center">
                    <form action="{{ route('admin.orders.export') }}" method="POST" class="d-flex align-items-center mr-3" style="gap: .8rem;">
                        @csrf
                        <input type="date" name="start_date" class="form-control me-2">
                        <input type="date" name="end_date" class="form-control me-2">
                        <button type="submit" class="btn btn-primary w-100">Exportar Filtro</button>
                    </form>
                    <a href="{{ route('exportar.ordenes') }}" class="btn btn-primary">Exportar Ordenes</a>
                </div>
            </div>

            {{-- Mostramos un mensaje flash de borrado con exito --}}
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
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
            
            let table_orders = '#table_orders';

            $(table_orders).DataTable({
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
                            // Mostrar la fecha
                            return row.created_at;
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
        });
    </script>
@endsection
