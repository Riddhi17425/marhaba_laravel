@extends('admin.layouts.app')

@section('title', 'Add Blessing')

@section('content')
<div class="container-xxl">
    <div class="row mb-3">
        <div class="col-md-6">
            <h3>Add Trusted By</h3>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('trusted-by.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>

    <form action="{{ route('trusted-by.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row g-3">

            <div class="col-md-4">
                <label class="form-label">Title</label><span class="text-danger">*</span>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                @error('title') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-md-12">
                <label class="form-label">Description</label><span class="text-danger">*</span>
                <textarea name="description" rows="5" id="description" class="form-control">{{ old('description') }}</textarea>
                @error('description') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label">Image</label><span class="text-danger">*</span>
                <input type="file" name="image" class="form-control">
                @error('image') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script> 

</script>

@endpush