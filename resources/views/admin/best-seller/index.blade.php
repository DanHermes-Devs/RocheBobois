@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="card p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0 fw-bold">Categorías de Best Seller</h2>
                <a href="{{ route('create.back.best-seller') }}" class="btn btn-success">
                    <i class="fa-solid fa-plus"></i>
                    Nuevo categoría
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

            @if($sellerBests->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Imagen Destacada</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sellerBests as $bestSeller)
                                <tr>
                                    <td>{{ $bestSeller->nombre }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $bestSeller->imagen_destacada) }}" alt="{{ $bestSeller->nombre }}" width="100">
                                    </td>
    
                                    <td>
                                        <a href="{{ route('edit.back.best-seller', $bestSeller->id) }}" class="btn btn-primary">
                                            <i class="fa-solid fa-edit"></i>
                                        </a>
                                        <button type="button" data-route="{{ route('destroy.back.best-seller', $bestSeller->id) }}" class="btn btn-danger delete_home">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $sellerBests->links('pagination::bootstrap-4') }}
            @else
                <div class="alert alert-info">
                    No hay categorías de Best Seller registradas
                </div>
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.delete_home').click(function() {
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
