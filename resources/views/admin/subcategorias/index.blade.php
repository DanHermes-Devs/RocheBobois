@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="card p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0 fw-bold">Subcategorías del producto</h2>
                <a href="{{ route('create.subcategoria') }}" class="btn btn-success">
                    <i class="fa-solid fa-plus"></i>
                    Nueva subcategoría
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

            <table class="table table-striped" id="table_subcategories_products">
                <thead>
                    <tr>
                        <th scope="col">Nombre de subcategoría</th>
                        <th scope="col">Imagen Destacada</th>
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
            
            let table_subcategories_products = '#table_subcategories_products';

            $(table_subcategories_products).DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                bAutoWidth: false,
                
                ajax: {
                    url: "{{ route('subcategorias') }}",
                    type: "GET",
                },
                columns: [
                    {data: 'nombre', name: 'nombre'},
                    {data: 'imagen_destacada',name: 'imagen_destacada'},
                    {data: 'action',name: 'action'}
                ],
                columnDefs: [
                    {
                        targets: 1,
                        render: function(data, type, row) {
                            if (data == null) {
                                return '<p>No existe una imagen</p>';
                            } else {
                                return `<img src="{{ asset('storage/${data}') }}" class="img-fluid w-25" alt="Imagen de la categoría">`;
                            }
                            // return `<img src="{{ asset('storage/${data}') }}" alt="${row.nombre}" class="img-fluid" style="max-width: 100px;">`;
                        }
                    },
                ],
                language: idiomaDataTable
            });
        });
    </script>
@endsection
