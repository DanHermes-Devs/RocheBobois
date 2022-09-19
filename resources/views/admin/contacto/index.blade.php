@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center dashboard__card p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0 fw-bold">Mensajes</h2>
            </div>

            @if($mensajes->count() > 0)
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre completo</th>
                            <th scope="col">Correo electrónico</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Sucursal</th>
                            <th scope="col">Productos interesado</th>
                            <th scope="col">Newsletter</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mensajes as $mensaje)
                            <tr>
                                <td>{{ $mensaje->id }}</td>
                                <td>{{ $mensaje->nombre_completo }}</td>
                                <td>{{ $mensaje->correo_electronico }}</td>
                                <td>{{ $mensaje->telefono }}</td>
                                <td>{{ $mensaje->sucursal }}</td>
                                <td>{{ $mensaje->productos_interesado }}</td>
                                <td>{{ $mensaje->newsletter }}</td>
                                <td>
                                    <button type="button" data-route="" class="btn btn-danger delete_mensaje">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $mensajes->links('pagination::bootstrap-4') }}
            @else
                <div class="alert alert-info">
                    No hay mensajes registrados
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