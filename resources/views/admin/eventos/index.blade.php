@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center dashboard__card p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0 fw-bold">Eventos</h2>
                <a href="{{ route('create.evento') }}" class="btn btn-success">
                    <i class="fa-solid fa-plus"></i>
                    Nuevo evento
                </a>
            </div>


            @if (session('store'))
                <div class="alert alert-success alert-block d-flex justify-content-between">
                    <strong>{{ session('store') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if($eventos->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Nombre del evento</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Hora</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($eventos as $evento)
                                <tr>
                                    <td>{{ $evento->nombre_evento }}</td>
                                    {{-- Usar Carbon para dar formato a la fecha de DD-MM-YYYY --}}
                                    <td> {{ Carbon\Carbon::parse($evento->fecha)->format('d/m/Y') }} </td>
                                    {{-- Usar Carbon para dar formato de 12hrs a la hora --}}
                                    <td> {{ Carbon\Carbon::parse($evento->hora)->format('h:i A') }} </td>
    
                                    <td>
                                        <a href="{{ route('edit.evento', $evento->id) }}" class="btn btn-primary">
                                            <i class="fa-solid fa-edit"></i>
                                        </a>
                                        <button type="button" data-route="{{ route('destroy.evento', $evento->id) }}" class="btn btn-danger delete_evento">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $eventos->links('pagination::bootstrap-4') }}
            @else
                <div class="alert alert-info">
                    No hay eventos registrados
                </div>
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.delete_evento').click(function() {
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
