@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="card p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0 fw-bold">Showrooms</h2>
            <a href="{{ route('create.showroom') }}" class="btn btn-success">
                <i class="fa-solid fa-plus"></i>
                Nuevo showroom
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

        <table class="table table-striped" id="table_showroom">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
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
            let table_showroom = $('#table_showroom').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                bAutoWidth: false,
                
                ajax: {
                    url: "{{ route('showrooms') }}",
                    type: "GET",
                },
                columns: [
                    {data: 'nombre_showroom', name: 'nombre_showroom'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                "language": idiomaDataTable
            });

            // Cargar datatable
            table_showroom.draw();
        });
    </script>
@endsection
