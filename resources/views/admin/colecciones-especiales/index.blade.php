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

        @if($colecciones->count() > 0)
            {{-- Tabla responsive --}}
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Nombre de la colección</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($colecciones as $coleccion)
                            <tr>
                                <td>{{ $coleccion->nombre_disenador }}</td>
                                <td>{{ $coleccion->nombre_coleccion }}</td>
                                <td>
                                    <a href="{{ route('edit.coleccion', $coleccion->id) }}" class="btn btn-primary">
                                        <i class="fa-solid fa-edit"></i>
                                    </a>
                                    <button type="button" data-route="{{ route('destroy.coleccion', $coleccion->id) }}" class="btn btn-danger delete_coleccion">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $colecciones->links('pagination::bootstrap-4') }}
        @else
            <div class="alert alert-info">
                No hay colecciones registradas
            </div>
        @endif
    </div>
</div>
@endsection

{{-- Scripts --}}
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.delete_coleccion').click(function() {
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
