@extends('admin.layouts.app')

@section('title', 'Global Presence Edit')

@section('content')
<div class="container-xxl">
    <div class="row align-items-center">
        <div class="border-0 mb-4">
            <div
                class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Global Presence Edit</h3>
            </div>
        </div>
    </div> <!-- Row end -->

    <div class="card-body">

        <form method="post" enctype="multipart/form-data" action="{{ route('globalpresence.update', $data->id) }}">
            @csrf
            @method('PUT')
            <div class="col-lg-12">
                <div class="card mb-3 p-3">
                    <div class="card-header py-3 p-0 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold">Global Presence Information</h6>
                    </div>
                    <div class="row g-3 align-items-center">

                        <!-- Name -->
                        <div class="col-md-6">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $data->name) }}" required>
                        </div>

                        <!-- Category Dropdown -->
                        <div class="col-md-6">
                            <label class="form-label">Category Title</label>
                            <select class="form-select" name="cat_title" required>
                                <option value="">Select Category</option>
                                <option value="Africa" {{ old('cat_title', $data->cat_title) == 'Africa' ? 'selected' : '' }}>Africa</option>
                                <option value="Middle East" {{ old('cat_title', $data->cat_title) == 'Middle East' ? 'selected' : '' }}>Middle East</option>
                                <option value="South Asia" {{ old('cat_title', $data->cat_title) == 'South Asia' ? 'selected' : '' }}>South Asia</option>
                            </select>
                            @if ($errors->has('cat_title'))
                                <span class="text-danger">{{ $errors->first('cat_title') }}</span>
                            @endif
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label">Logo Name</label>
                            <input type="text" name="logo_name" class="form-control" value="{{ old('logo_name', $data->logo_name) }}">
                        </div>

                        <div class="col-md-6">
                            <label for="description" class="form-label">Description</label>
                            <textarea id="description" name="description" class="form-control">{{ old('description', $data->description) }}</textarea>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label" for="logo_image">Logo Image</label>
                            <input type="file" id="logo_image" name="logo_image" class="form-control dropify" data-default-file="{{ $data->logo_image ? asset('public/GlobalPresence_Logo_Image/'.$data->logo_image) : '' }}">
                        </div>

                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-success btn-set-task w-sm-100 py-2 px-5 text-uppercase">Update</button>
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
$(document).ready(function() {
    // Summernote for description
    $('#description').summernote({
        placeholder: 'Enter description here...',
        height: 200,
        toolbar: [
            ['style', ['bold', 'italic', 'underline']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link', 'picture', 'hr']],
            ['view', ['fullscreen', 'codeview']]
        ]
    });

    // Dropify for image upload
    $('.dropify').dropify();
});
</script>
@endpush
