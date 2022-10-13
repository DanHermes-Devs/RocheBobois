@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="card p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0 fw-bold">Eventos</h2>
                <a href="{{ route('create.evento') }}" class="btn btn-success">
                    <i class="fa-solid fa-plus"></i>
                    Nuevo evento
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

            <table class="table table-striped" id="table_events">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Hora</th>
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
            let table_events = $('#table_events').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                bAutoWidth: false,
                
                ajax: {
                    url: "{{ route('eventos') }}",
                    type: "GET",
                },
                columns: [
                    {data: 'nombre_evento', name: 'nombre_evento', width: '25%'},
                    {data: 'fecha', name: 'fecha', width: '25%'},
                    {data: 'hora', name: 'hora', width: '25%'},
                    {data: 'action', name: 'action', width: '25%'},
                ],
                columnDefs: [
                    {
                        targets: 2,
                        render: function(data, type, row) {
                            return data;
                        }
                    },
                ],
                "language": idiomaDataTable
            });

            table_events.draw();
        });
    </script>
@endsection
