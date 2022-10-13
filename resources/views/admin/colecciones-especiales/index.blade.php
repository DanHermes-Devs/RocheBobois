@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="card p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0 fw-bold">Colecciones Especiales</h2>
            <a href="{{ route('create.coleccion') }}" class="btn btn-success">
                <i class="fa-solid fa-plus"></i>
                Nueva colección
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

        <table class="table table-striped" id="table_colecciones">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Nombre de la colección</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
@endsection

{{-- Scripts --}}
@section('scripts')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            let table_coleciones = $('#table_colecciones').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                bAutoWidth: false,
                
                ajax: {
                    url: "{{ route('colecciones-especiales') }}",
                    type: "GET",
                },
                columns: [
                    {data: 'nombre_disenador', name: 'nombre_disenador'},
                    {data: 'nombre_coleccion', name: 'nombre_coleccion'},
                    {data: 'action', name: 'action', orderable: false},
                ],
                "language": idiomaDataTable
            });

            table_coleciones.draw();
            
        });
    </script>
@endsection
