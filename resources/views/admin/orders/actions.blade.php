<a href="{{ route('show.order', $id) }}" class="btn btn-success">
    <i class="fas fa-eye"></i>
</a>
{{-- <a href="{{ route('admin.orders.pdf', $order) }}" class="btn btn-primary btn-sm">
    <i class="fas fa-file-pdf"></i>
</a> --}}
<button data-route="{{ route('destroy.order', $id) }}" class="btn btn-danger delete">
    <i class="fas fa-trash-alt"></i>
</button>

<script>
    $('body').on('click', '.delete', function(e) {
        e.preventDefault();
        let route = $(this).data('route');
        Swal.fire({
            title: '¿Estas seguro?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, ¡Borrar!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: route,
                    type: 'DELETE',
                    success: function(response) {
                        if (response.success) {
                            Swal.fire(
                                '¡Borrado!',
                                'El registro ha sido borrado.',
                                'success'
                            )
                            $('#table_orders').DataTable().ajax.reload();
                        }else{
                            Swal.fire(
                                '¡Error!',
                                'El registro no ha sido borrado.',
                                'error'
                            )
                        }
                    }
                });
            }
        })
    });
</script>