@extends('admin.layouts.app')

@section('title', 'Edit Cloth Brand')

@section('content')
<div class="container-xxl">
    <h3>Edit Cloth Brand</h3>
    <form method="POST" enctype="multipart/form-data" action="{{ route('brand.update', $brand->id) }}">
        @csrf
        @method('PUT')

        <div class="card mb-3 p-3">
            <div class="row g-3 align-items-center mt-2">
                <div class="col-md-6">
                    <label class="form-label">Cloth Brand Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $brand->name }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" class="form-control dropify">
                    @if($brand->image)
                        <img src="{{ asset('public/brand_images/'.$brand->image) }}" width="80" class="mt-2">
                    @endif
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update Cloth Brand</button>
    </form>
</div>
@endsection

@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
<link rel="stylesheet" href="{!! asset('public/admin_public/dist/assets/plugin/dropify/dist/css/dropify.min.css') !!}">
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
<script src="{!! asset('public/admin_public/dist/assets/bundles/dropify.bundle.js') !!}"></script>

@endpush

