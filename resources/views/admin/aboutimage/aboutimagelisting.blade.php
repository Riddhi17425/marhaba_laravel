@extends('admin.layouts.app')

@section('title', 'About Image Listing')

@section('content')
<div class="container-xxl">
    <div class="row align-items-center">
        <div class="border-0 mb-4">
            <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center 
                        px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">About Image Listing</h3>
                <a href="{{ route('aboutimage.create') }}" class="btn btn-primary">+ Add About Image</a>
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
                        <th>Image</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($aboutImages as $key => $aboutimage)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $aboutimage->name }}</td>
                            <td>
                                @if($aboutimage->image)
                                    <img src="{{ asset('public/about_images/'.$aboutimage->image) }}" width="60">
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('aboutimage.edit', $aboutimage->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('aboutimage.destroy', $aboutimage->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this aboutimage?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center">No About Image Found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $aboutImages->links() }}
        </div>
    </div>
</div>
@endsection
