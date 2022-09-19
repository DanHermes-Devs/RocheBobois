@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center dashboard__card p-4">
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
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- Validamos que haya registros --}}
            @if ($buildings->count())
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre del hotel</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Imagen destacada</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($buildings as $building)
                            <tr>
                                <th scope="row">{{ $building->id }}</th>
                                <td>{{ $building->nombre_hotel }}</td>
                                <td>{!! $building->descripcion !!}</td>
                                <td>
                                    @if (File::exists(public_path('storage/' . $building->imagen_destacada)) && $building->imagen_destacada != null)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/'.$building->imagen_destacada) }}" alt="{{ $building->imagen_destacada }}" class="img-fluid w-25">
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('edit.building', $building->id) }}" class="btn btn-primary">
                                        <i class="fa-solid fa-edit"></i>
                                    </a>
                                    <button data-route="{{ route('destroy.building', $building->id) }}"
                                        class="btn btn-danger delete_producto">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $buildings->links('pagination::bootstrap-4') }}
            @else
                <div class="alert alert-info">
                    No hay buildings registrados
                </div>
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.delete_producto').click(function() {
                let id = $(this).val();
                let token = $("meta[name='csrf-token']").attr("content");
                
                // Confirmar con Sweetalert
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, eliminalo!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: $(this).data('route'),
                            type: 'DELETE',
                            data: {
                                "id": id,
                                "_token": token,
                            },
                            success: function(response) {
                                console.log(response);
                                if(response.status == 'success') {
                                    Swal.fire(
                                        '¡Eliminado!',
                                        'El registro ha sido eliminado.',
                                        'success'
                                    ).then((result) => {
                                        if(result.isConfirmed) {
                                            location.reload();
                                        }
                                    });
                                }
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection