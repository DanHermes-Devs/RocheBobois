<div class="d-flex">
    @if ($status == 'Confirmado')
        <span></span>
    @else
        {{-- Actualizar Estado --}}
        <button class="btn btn-success update_status mr-1" data-route="{{ route('checkin.booking', $id) }}" data-id="{{ $id }}" title="Confirmar asistencia">
            <i class="fa-solid fa-check"></i>
        </button>

        {{-- Eliminar --}}
        <button data-route="{{ route('destroy.booking', $id) }}" class="mr-1 btn btn-danger delete_producto"
            title="Cancelar reserva">
            <i class="fa-solid fa-xmark"></i>
        </button>
    @endif
    {{-- Mostrar --}}
    <a href="{{ route('show.booking', $id) }}" class="btn btn-info" title="Ver reserva">
        <i class="fa-solid fa-eye"></i>
    </a>
</div>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // Actualizar estado de la reserva
    $('.update_status').on('click', function(e) {
        e.preventDefault();
        var route = $(this).data('route');
        var id = $(this).data('id');

        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡El estado de la reserva será actualizado!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Si, actualizar!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: route,
                    type: 'PUT',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        Swal.fire(
                            '¡Actualizado!',
                            'El estado de la reserva ha sido actualizado.',
                            'success'
                        )
                        setTimeout(function() {
                            // Actualizamos la tabla
                            $('#table_bookings').DataTable().ajax.reload();
                        }, 2000);
                    },
                    error: function(data) {
                        Swal.fire(
                            '¡Error!',
                            'Ha ocurrido un error al actualizar el estado de la reserva.',
                            'error'
                        )
                    }
                });
            }
        })
    });


    // Eliminar Reserva
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
                        if (response.status == 'success') {
                            Swal.fire(
                                '¡Eliminado!',
                                'El registro ha sido eliminado.',
                                'success'
                            ).then((result) => {
                                if (result.isConfirmed) {
                                    // Actualizamos la tabla
                                    $('#table_bookings').DataTable().ajax.reload();
                                }
                            });
                        }
                    }
                });
            }
        });
    });
</script>
