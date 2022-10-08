@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="card p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0 fw-bold">Productos</h2>
                <a href="{{ route('create.producto') }}" class="btn btn-success">
                    <i class="fa-solid fa-plus"></i>
                    Nuevo producto
                </a>
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
                pageLength: 50,
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
                language: idiomaDataTable
            });

            table_products.draw();
        });
    </script>
@endsection