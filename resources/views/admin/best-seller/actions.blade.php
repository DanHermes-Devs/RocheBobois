<a href="{{ route('edit.back.best-seller', $id) }}" class="btn btn-warning">
    <i class="fa fa-pencil-alt"></i>
</a>

<button type="button" data-route="{{ route('destroy.back.best-seller', $id) }}"
    class="btn btn-danger delete_bestSeller">
    <i class="fas fa-trash-alt"></i>
</button>


<script>
    // Borrar Coleccion
    $('.delete_bestSeller').click(function() {
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
                                    $('#table_seller').DataTable().ajax.reload();
                                }
                            });
                        }
                    }
                });
            }
        });
    });
</script>
