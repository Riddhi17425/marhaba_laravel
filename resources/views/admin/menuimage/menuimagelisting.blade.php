@extends('admin.layouts.app')

@section('title', 'Menu Image Listing')

@section('content')
<div class="container-xxl">
    <div class="row align-items-center">
        <div class="border-0 mb-4">
            <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center 
                        px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Menu Image Listing</h3>
                <a href="{{ route('menuimage.create') }}" class="btn btn-primary">+ Add Menu Image</a>
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
                        <th>Type</th>
                        <th>Reference Name</th>
                        <th>Image</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($menuImages as $key => $menu)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ ucfirst($menu->type) }}</td>
                            <td>
                                @if($menu->type == 'category')
                                    {{ \App\Models\Category::find($menu->reference_id)->name ?? 'N/A' }}
                                @elseif($menu->type == 'product')
                                    {{ \App\Models\Product::find($menu->reference_id)->product_detail_name ?? 'N/A' }}
                                @elseif($menu->type == 'size')
                                    {{ \App\Models\ClothSize::find($menu->reference_id)->name ?? 'N/A' }}
                                @endif
                            </td>
                            <td>
                                @if($menu->image)
                                    <img src="{{ asset('public/menu_images/'.$menu->image) }}" width="60">
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('menuimage.edit', $menu->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('menuimage.destroy', $menu->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this menu image?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center">No Menu Image Found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $menuImages->links() }}
        </div>
    </div>
</div>
@endsection
