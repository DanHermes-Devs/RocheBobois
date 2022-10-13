@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="card p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0 fw-bold">Categorías de Roche Bobois Building</h2>
                <a href="{{ route('create.building-category') }}" class="btn btn-success">
                    <i class="fa-solid fa-plus"></i>
                    Nueva categoría
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

            <table class="table table-striped" id="table_building_categories">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
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
            let table_building_categories = $('#table_building_categories').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                bAutoWidth: false,
                
                ajax: {
                    url: "{{ route('building-categories') }}",
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
                            return `<img src="{{ asset('storage/${data}') }}" alt="${row.nombre}" class="img-fluid" style="max-width: 100px;">`;
                        }
                    },
                ],
                language: idiomaDataTable
            });

            table_building_categories.draw();
        });
    </script>
@endsection
