<a href="{{ route('show.order', $id) }}" class="btn btn-success">
    <i class="fas fa-eye"></i>
</a>
{{-- <a href="{{ route('admin.orders.pdf', $order) }}" class="btn btn-primary btn-sm">
    <i class="fas fa-file-pdf"></i>
</a> --}}
<a href="{{ route('destroy.order', $id) }}" class="btn btn-danger">
    <i class="fas fa-trash-alt"></i>
</a>