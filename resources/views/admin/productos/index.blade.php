@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="card p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0 fw-bold">Productos</h2>
                <div class="d-flex" style="gap: 1rem;">
                    <a href="{{ route('create.producto') }}" class="btn btn-success">
                        <i class="fa-solid fa-plus"></i>
                        Nuevo producto
                    </a>
                    <a href="{{ route('import.productos') }}" class="btn btn-primary">Importar Productos</a>
                    <a href="{{ route('export.productos') }}" class="btn btn-primary">Exportar Productos</a>
                </div>

            </div>


            @if (session('store'))
                <div class="alert alert-success alert-block d-flex justify-content-between">
                    <strong>{{ session('store') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            
            <table class="table table-striped" id="table_products">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Precio</th>
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
            let table_products = $('#table_products').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                bAutoWidth: false,
                
                ajax: {
                    url: "{{ route('productos') }}",
                    type: "GET",
                },
                columns: [
                    {data: 'nombre_producto', name: 'nombre_producto'},
                    {data: 'descripcion', name: 'descripcion'},
                    {data: 'precio', name: 'precio'},
                    {data: 'action', name: 'action'}
                ],
                columnDefs: [
                    {
                        targets: 1,
                        render: function(data, type, row) {
                            return data.length > 100 ?
                                data.substr(0, 100) + '…' :
                                data;
                        }
                    },
                    {
                        targets: 2,
                        render: function(data, type, row) {
                            // Mostramos decimales
                            return '$' + data;
                        }
                    }
                ],
                language: idiomaDataTable
            });

            table_products.draw();
        });
    </script>
@endsection