@extends('admin.layouts.app')

@section('title', 'Add Category')

@section('content')
<div class="container-xxl">
    <div class="row align-items-center mb-4">
        <div class="col-12">
            <div class="card-header py-3 no-bg bg-transparent d-flex justify-content-between align-items-center border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Add Category</h3>
            </div>
        </div>
    </div>

    <div class="card-body">
        <form method="POST" enctype="multipart/form-data" action="{{ route('category.store') }}">
            @csrf
            <div class="card mb-3 p-3">
                <div class="card-header py-3 p-0 bg-transparent border-bottom-0">
                    <h6 class="mb-0 fw-bold">Category Information</h6>
                </div>

                <div class="row g-3 align-items-center mt-2">
                    <div class="col-md-6">
                        <label class="form-label">Category Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">URL</label>
                        <input type="text" name="url" class="form-control" value="{{ old('url') }}" required>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Image</label>
                        <input type="file" name="image" class="form-control dropify">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Mobile Image</label>
                        <input type="file" name="menu_image" class="form-control dropify">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary py-2 px-5 text-uppercase">Save</button>
        </form>
    </div>
</div>
@endsection

@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
<link rel="stylesheet" href="{!! asset('public/admin_public/dist/assets/plugin/dropify/dist/css/dropify.min.css') !!}">
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
<script src="{!! asset('public/admin_public/dist/assets/bundles/dropify.bundle.js') !!}"></script>
<script>
$(document).ready(function(){
    $('.dropify').dropify();
    $('textarea[name="description"]').summernote({
        height: 200,
        toolbar: [
            ['style', ['bold', 'italic', 'underline']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link', 'picture', 'hr']],
            ['view', ['fullscreen', 'codeview']]
        ]
    });
});
</script>
@endpush
