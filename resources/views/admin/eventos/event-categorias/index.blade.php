@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="card p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0 fw-bold">Categorías de Eventos</h2>
                <a href="{{ route('create.event-category') }}" class="btn btn-success">
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

            <table class="table table-striped" id="table_event_categories">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Imagen Destacada</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($categorias as $categoria)
                        <tr>
                            <td>{{ $categoria->nombre }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $categoria->imagen_destacada) }}" alt="{{ $categoria->nombre }}" class="img-fluid" style="max-width: 100px;">
                            </td>
                            <td>
                                <a href="{{ route('edit.event-category', $categoria->id) }}" class="btn btn-primary">
                                    <i class="fa-solid fa-edit"></i>
                                </a>
                                <button data-route="{{ route('destroy.event-category', $categoria->id) }}"
                                    class="btn btn-danger delete_categoria">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach --}}
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
            let table_event_categories = $('#table_event_categories').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                bAutoWidth: false,
                
                ajax: {
                    url: "{{ route('event-categories') }}",
                    type: "GET",
                },
                columns: [
                    {data: 'nombre', name: 'nombre', width: '25%'},
                    {data: 'imagen_destacada', name: 'imagen_destacada', width: '25%'},
                    {data: 'action', name: 'action', width: '25%'},
                ],
                columnDefs: [
                    {
                        targets: 1,
                        render: function(data, type, row) {
                            return `<img src="{{ asset('storage/${data}') }}" alt="${row.nombre}" class="img-fluid" style="max-width: 100px;">`;
                        }
                    }
                ],
                "language": idiomaDataTable
            });

            table_event_categories.draw();
        });
    </script>
@endsection
