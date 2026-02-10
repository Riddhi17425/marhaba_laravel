@extends('admin.layouts.app')

@section('title', 'Add Catalogue Image')

@section('content')
<div class="container-xxl">
    <div class="row mb-3">
        <div class="col-md-6">
            <h3>Add Catalogue Image</h3>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('catalogue-image.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>

    <form action="{{ route('catalogue-image.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Select Images</label><span class="text-danger">*</span>
                <input type="file" name="image[]" multiple class="form-control">
                @error('image') <span class="text-danger">{{ $message }}</span> @enderror
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