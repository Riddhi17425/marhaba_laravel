@extends('admin.layouts.app')

@section('title', 'Home Slider Image Listing')

@section('content')
<div class="container-xxl">
    <div class="row align-items-center">
        <div class="border-0 mb-4">
            <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center 
                        px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Home Slider Image Listing</h3>
                {{-- <a href="{{ route('homeslider-image.create') }}" class="btn btn-primary">+ Add Home Slider Image</a> --}}
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
                        {{-- <th>#</th> --}}
                        {{-- <th>Image</th> --}}
                        <th>Slider</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @forelse($homeSliderImg as $key => $homeSlider) --}}
                    {{-- <tr>
                        <td>{{ $key+1 }}</td>
                        <td>
                            @if(isset($homeSlider->image))
                                <img src="{{ asset('public/homeslider_images/'. $homeSlider->image) }}" width="100" height="200">
                            @else
                                -
                            @endif  
                        </td>
                        <td>{{ 
                            $homeSlider->slider == 1 ? 'First Slider' : 
                            ($homeSlider->slider == 2 ? 'Second Slider' : 
                            ($homeSlider->slider == 3 ? 'Third Slider' : '')) 
                            }}</td>
                        <td class="text-center">
                            <a href="{{ route('homeslider-image.edit', $homeSlider->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('homeslider-image.destroy', $homeSlider->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this Image?')">Delete</button>
                            </form>
                        </td>
                    </tr> --}}
                    {{-- @empty
                        <tr><td colspan="7" class="text-center">No Image found.</td></tr> --}}
                    {{-- @endforelse --}}
                    <tr>
                        <td>First Slider</td>
                        <td class="text-center">
                            <a href="{{ route('homeslider-image.edit', 1) }}" class="btn btn-sm btn-warning">Edit</a>
                            {{-- <form action="{{ route('homeslider-image.destroy', 1) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this Image?')">Delete</button>
                            </form> --}}
                        </td>
                    </tr>
                    <tr>
                        <td>Second Slider</td>
                        <td class="text-center">
                            <a href="{{ route('homeslider-image.edit', 2) }}" class="btn btn-sm btn-warning">Edit</a>
                            {{-- <form action="{{ route('homeslider-image.destroy', 2) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this Image?')">Delete</button>
                            </form> --}}
                        </td>
                    </tr>
                    <tr>
                        <td>Third Slider</td>
                        <td class="text-center">
                            <a href="{{ route('homeslider-image.edit', 3) }}" class="btn btn-sm btn-warning">Edit</a>
                            {{-- <form action="{{ route('homeslider-image.destroy', 3) }}" method="POST" style="display:inline;">
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
