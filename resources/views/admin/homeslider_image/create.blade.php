@extends('admin.layouts.app')

@section('title', 'Add Home Page Slider Image')

@section('content')
<div class="container-xxl">
    <div class="row mb-3">
        <div class="col-md-6">
            <h3>Add Home Page Slider Image</h3>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('homeslider-image.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>

    <form action="{{ route('homeslider-image.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row g-3">
            <div class="col-md-7">
                <label class="form-label">Select First Slider Images</label><span class="text-danger">*</span>
                <input type="file" name="first_slider_image[]" multiple class="form-control">
                @error('first_slider_image') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-7">
                <label class="form-label">Select Second Slider Images</label><span class="text-danger">*</span>
                <input type="file" name="second_slider_image[]" multiple class="form-control">
                @error('second_slider_image') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-7">
                <label class="form-label">Select Third Slider Images</label><span class="text-danger">*</span>
                <input type="file" name="third_slider_image[]" multiple class="form-control">
                @error('third_slider_image') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Save Images</button>
            </div>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>

</script>
@endpush