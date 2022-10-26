@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="card p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0 fw-bold">Clientes</h2>
            </div>


            @if (session('store'))
                <div class="alert alert-success alert-block d-flex justify-content-between">
                    <strong>{{ session('store') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <table class="table table-striped" id="table_clientes">
                <thead>
                    <tr>
                        <th scope="col">Nombre del Cliente</th>
                        <th scope="col">Correo Electrónico</th>
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
            let table_clientes = '#table_clientes';

             $(table_clientes).DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                bAutoWidth: false,
                ajax: {
                    url: "{{ route('usuarios') }}",
                    type: "GET",
                },
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'email',name: 'email'},
                    {data: 'action',name: 'action'}
                ],
                language: idiomaDataTable
            });
        });
    </script>
@endsection
