<a href="{{ route('edit.coleccion', $id) }}" class="btn btn-warning">
    <i class="fa fa-pencil-alt"></i>
</a>

<button type="button" data-route="{{ route('destroy.coleccion', $id) }}" class="btn btn-danger delete_coleccion">
    <i class="fas fa-trash-alt"></i>
</button>


<script>
    // Borrar Coleccion
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
                        if (response.status == 'success') {
                            Swal.fire(
                                '¡Eliminado!',
                                'El registro ha sido eliminado.',
                                'success'
                            ).then((result) => {
                                if (result.isConfirmed) {
                                    $('#table_colecciones').DataTable().ajax.reload();
                                }
                            });
                        }
                    }
                });
            }
        });
    });
</script>
