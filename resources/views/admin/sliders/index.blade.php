@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="card p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0 fw-bold">Sliders</h2>
                <a href="{{ route('create.slider') }}" class="btn btn-success">
                    <i class="fa-solid fa-plus"></i>
                    Nuevo slider
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

            <table class="table table-striped" id="table_slider">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Imagen destacada</th>
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
            let talbe_slider = $('#table_slider').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                bAutoWidth: false,
                
                ajax: {
                    url: "{{ route('sliders') }}",
                    type: "GET",
                },
                columns: [
                    {data: 'nombre_producto', name: 'nombre_producto'},
                    {data: 'imagen_destacada', name: 'imagen_destacada', width: '40%'},
                    {data: 'action', name: 'action'},
                ],
                columnDefs: [
                    {
                        targets: 1,
                        render: function(data, type, row) {
                            return `<img src="/storage/${data}" class="w-25 img-fluid">`;
                        }
                    },
                ],
                "language": idiomaDataTable
            });

            talbe_slider.draw();
        });
    </script>
@endsection