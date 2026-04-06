@extends('admin.layouts.app')

@section('title', 'Product Listing')

@section('content')
<div class="container-xxl">
    <div class="row align-items-center">
        <div class="border-0 mb-4">
            <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center 
                        px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Product Listing</h3>
                <a href="{{ route('product.create') }}" class="btn btn-primary">+ Add Product</a>
            </div>
        </div>
    </div>

    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Category</th>
                        <th>URL</th>
                        <th>Created</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $key => $product)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ ucfirst($product->type) }}</td>
                            <td>{{ $product->category->name ?? '' }}</td>
                            <td>{{ $product->url }}</td>
                            <td>{{ $product->created_at->format('d-m-Y') }}</td>
                            <td>
                                @if($product->is_active == 1)
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" checked role="switch" onclick="updateStatus(0, {{ $product->id }});">
                                        <label class="form-check-label">Active</label>
                                    </div>
                                @else
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" onclick="updateStatus(1, {{ $product->id }});">
                                        <label class="form-check-label">In-Active</label>
                                    </div>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this product?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-center">No products found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $products->links() }}
        </div>
    </div>
</div>

<script>
function updateStatus(status, productId){
    $.ajax({
        url:  "{{ route('admin.products.update.status') }}",
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        data: {
            id: productId,
            status: status
        },
        success: function (response) {
            if (response.success) {
                location.reload();
            } else {
                alert('Something went wrong');
            }
        },
        error: function () {
            alert('Server error');
        }
    });
}
</script>

@endsection
