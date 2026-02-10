@extends('admin.layouts.app')

@section('title', 'Catalogue Image Listing')

@section('content')
<div class="container-xxl">
    <div class="row align-items-center">
        <div class="border-0 mb-4">
            <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center 
                        px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Catalogue Image Listing</h3>
                <a href="{{ route('catalogue-image.create') }}" class="btn btn-primary">+ Add Catalogue Image</a>
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
                        <th>Image</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($catImgs as $key => $catImg)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>
                                @if(isset($catImg->image))
                                    <img src="{{ asset('public/catalogue_images/'. $catImg->image) }}" width="100" height="200">
                                @else
                                    -
                                @endif  
                            </td>
                            <td class="text-center">
                                <a href="{{ route('catalogue-image.edit', $catImg->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('catalogue-image.destroy', $catImg->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this Image?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-center">No Image found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $catImgs->links() }}
        </div>
    </div>
</div>
@endsection
