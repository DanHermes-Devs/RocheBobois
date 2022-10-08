@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="card p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0 fw-bold">Roche Bobois Building</h2>
                <a href="{{ route('create.building') }}" class="btn btn-success">
                    <i class="fa-solid fa-plus"></i>
                    Nuevo building
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

            <table class="table table-striped table-hover" id="table_buildings">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col" width="50%">Imagen destacada</th>
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
            let table_buildings = $('#table_buildings').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                bAutoWidth: false,
                pageLength: 50,
                ajax: {
                    url: "{{ route('building') }}",
                    type: "GET",
                },
                columns: [
                    {data: 'nombre_hotel', name: 'nombre_hotel'},
                    {data: 'descripcion', name: 'descripcion'},
                    {data: 'imagen_destacada', name: 'imagen_destacada'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                columnDefs: [
                    {
                        targets: 2,
                        render: function(data, type, row) {
                            return `<img src="{{ asset('storage/${data}') }}" alt="${row.nombre}" class="img-fluid" style="max-width: 100px;">`;
                        }
                    },
                ],
                "language": idiomaDataTable
            });

            table_buildings.draw();
        });
    </script>
@endsection
