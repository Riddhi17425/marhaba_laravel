@extends('admin.layouts.app')

@section('title', 'Collection Slider Image Listing')

@section('content')
<div class="container-xxl">
    <div class="row align-items-center">
        <div class="border-0 mb-4">
            <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center 
                        px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Collection Slider Image Listing</h3>
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
                        <th>Slider</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <tr>
                        <td>Girl Collection Slider</td>
                        <td class="text-center">
                            <a href="{{ route('collection-random-image.edit', 1) }}" class="btn btn-sm btn-warning">Edit</a>
                            {{-- <form action="{{ route('collection-random-image.destroy', 1) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this Image?')">Delete</button>
                            </form> --}}
                        </td>
                    </tr>
                    <tr>
                        <td>Boy Collection Slider</td>
                        <td class="text-center">
                            <a href="{{ route('collection-random-image.edit', 2) }}" class="btn btn-sm btn-warning">Edit</a>
                            {{-- <form action="{{ route('collection-random-image.destroy', 2) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this Image?')">Delete</button>
                            </form> --}}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- <div class="mt-3">
            {{ $homeSliderImg->links() }}
        </div> --}}
    </div>
</div>
@endsection
