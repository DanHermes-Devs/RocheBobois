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

        @if ($showrooms->count() > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($showrooms as $showroom)
                        <tr>
                            <td>{{ $showroom->nombre_showroom }}</td>
                            <td>
                                <a href="{{ route('edit.showroom', $showroom->id) }}" class="btn btn-primary">
                                    <i class="fa-solid fa-edit"></i>
                                </a>
                                <button type="button" data-route="{{ route('destroy.showroom', $showroom->id) }}"
                                    class="btn btn-danger delete_showroom">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $showrooms->links('pagination::bootstrap-4') }}
        @else
            <div class="alert alert-info">
                No hay showrooms registrados
            </div>
        @endif
    </div>
</div>
@endsection


@section('scripts')
    <script>
        $(document).ready(function() {
            $('.delete_showroom').click(function() {
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
                                if (response.status == 'success') {
                                    Swal.fire(
                                        '¡Eliminado!',
                                        'El registro ha sido eliminado.',
                                        'success'
                                    ).then((result) => {
                                        if (result.isConfirmed) {
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
