@extends('admin.layouts.app')
@section('title', 'Add Product')
@section('content')
<div class="container-xxl">
    <div class="row align-items-center mb-4">
        <div class="col-12">
            <div class="card-header py-3 bg-transparent border-bottom">
                <h3 class="fw-bold mb-0">Add Product</h3>
            </div>
        </div>
    </div>

    <div class="card-body">
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <form method="POST" enctype="multipart/form-data" action="{{ route('product.store') }}">
            @csrf
            <div class="card mb-3 p-3">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Product Type</label>
                        @php $productType = config('global_values.product_type') @endphp
                        <select name="product_type" class="form-control" required>
                            <option value="">Select Type</option>
                            @foreach($productType as $key => $val)
                                <option value="{{ $key }}" {{ old('product_type') == $key ? 'selected' : '' }}>{{ $val }}</option>
                            @endforeach
                        </select>
                        @error('product_type') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Category</label>
                        <select name="category_id" class="form-control">
                            <option value="">Select Category</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    {{-- <div class="col-md-12">
                        <label class="form-label">Sub Category Name</label>
                        <input type="text" name="product_detail_name" class="form-control" value="{{ old('product_detail_name') }}">
                        @error('product_detail_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div> --}}
                    <div class="col-md-6">
                        <label class="form-label">Product Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">URL</label>
                        <input type="text" name="url" class="form-control" value="{{ old('url') }}" required>
                        @error('url') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Brand</label>
                            <select name="brand_id" class="form-control brand-select">
                                <option value="">Select Brand</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}" data-image="{{ $brand->image }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                @endforeach
                            </select>
                            @error('brand_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-2 text-center">
                            <label>Brand Image</label><br>
                            <img src="" id="brand-preview" width="60" height="60" style="display:none; object-fit:contain;">
                        </div>
                    </div>

                    <div class="col-md-6 d-flex align-items-center">
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="show_homepage" id="show_homepage" {{ old('show_homepage') ? 'checked' : '' }}>
                            <label class="form-check-label ms-2" for="show_homepage">
                                Show on Home Page
                            </label>
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control summernote">{{ old('description') }}</textarea>
                        @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Key Features</label>
                        <textarea name="key_features" class="form-control summernote">{{ old('key_features') }}</textarea>
                        @error('key_features') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">More Information</label>
                        <textarea name="more_information" class="form-control summernote">{{ old('more_information') }}</textarea>
                        @error('more_information') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    
                    <div class="col-12 mt-3">
                        {{-- <h5>Brand, Size, Color & Product Images</h5> --}}
                        <h5>Size, Product Images</h5>
                        <div id="dynamic-fields">
                            <div class="row brand-size-row mb-3">
                                {{-- <div class="col-md-3">
                                    <label>Brand</label>
                                    <select name="brand_id[0]" class="form-control brand-select">
                                        <option value="">Select Brand</option>
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}" data-image="{{ $brand->image }}" {{ old('brand_id.0') == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('brand_id.0') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-2 text-center">
                                    <label>Brand Image</label><br>
                                    <img src="" class="brand-preview" width="60" height="60" style="display:none; object-fit:contain;">
                                </div> --}}
                                <div class="col-md-2">
                                    <label>Size</label>
                                    <select name="size_id[0]" class="form-control">
                                        <option value="">Select Size</option>
                                        @foreach($sizes as $size)
                                            <option value="{{ $size->id }}" {{ old('size_id.0') == $size->id ? 'selected' : '' }}>{{ $size->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('size_id.0') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                {{-- <div class="col-md-2">
                                    <label>Color</label>
                                    <select name="color_id[0]" class="form-control">
                                        <option value="">Select Color</option>
                                        @foreach($colors as $color)
                                            <option value="{{ $color->id }}" {{ old('color_id.0') == $color->id ? 'selected' : '' }}>{{ $color->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('color_id.0') <span class="text-danger">{{ $message }}</span> @enderror
                                </div> --}}
                                <div class="col-md-2">
                                    <label>Product Image</label>
                                    <input type="file" name="product_image[0]" class="form-control dropify">
                                    @error('product_image.0') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-1 d-flex align-items-end">
                                    <button type="button" class="btn btn-success add-more">+</button>
                                    <button type="button" class="btn btn-danger remove" style="display:none">-</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary px-5">Save</button>
        </form>
    </div>
</div>
@endsection

@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('public/admin_public/dist/assets/plugin/dropify/dist/css/dropify.min.css') }}">
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
<script src="{{ asset('public/admin_public/dist/assets/bundles/dropify.bundle.js') }}"></script>
<script>
$(document).ready(function(){
    $('.dropify').dropify();
    $('.summernote').summernote({ height: 200 });

    function updateButtons() {
        $('.brand-size-row').each(function(index) {
            if (index === $('.brand-size-row').length - 1) {
                $(this).find('.add-more').show();
                $(this).find('.remove').hide();
            } else {
                $(this).find('.add-more').hide();
                $(this).find('.remove').show();
            }
        });
    }

    // Add More
    $(document).on('click', '.add-more', function(){
        let newIndex = $('.brand-size-row').length;
        let clone = $('.brand-size-row:first').clone();
        clone.find('select').val('');
        clone.find('.brand-preview').hide().attr('src', '');
        clone.find('.dropify').attr('data-default-file', '');
        clone.find('.dropify-wrapper').removeClass('has-preview');
        clone.find('.dropify-preview').hide();
        clone.find('.dropify-clear').trigger('click');
        clone.find('input[type=hidden]').remove();
        // clone.find('select[name^="brand_id"]').attr('name', 'brand_id[' + newIndex + ']');
        clone.find('select[name^="size_id"]').attr('name', 'size_id[' + newIndex + ']');
        // clone.find('select[name^="color_id"]').attr('name', 'color_id[' + newIndex + ']');
        clone.find('input[name^="product_image"]').attr('name', 'product_image[' + newIndex + ']');
        $('#dynamic-fields').append(clone);
        clone.find('.dropify').dropify();
        updateButtons();
    });

    // Remove row
    $(document).on('click', '.remove', function(){
        if ($('.brand-size-row').length > 1) {
            $(this).closest('.brand-size-row').remove();
            $('.brand-size-row').each(function(index) {
                // $(this).find('select[name^="brand_id"]').attr('name', 'brand_id[' + index + ']');
                $(this).find('select[name^="size_id"]').attr('name', 'size_id[' + index + ']');
                // $(this).find('select[name^="color_id"]').attr('name', 'color_id[' + index + ']');
                $(this).find('input[name^="product_image"]').attr('name', 'product_image[' + index + ']');
            });
            updateButtons();
        }
    });

    // Auto show brand image
    $(document).on('change', '.brand-select', function(){
        let image = $(this).find(':selected').data('image');
        let preview = $(this).closest('.brand-size-row').find('.brand-preview');
        if(image && image !== '') {
            preview.attr('src', "{{ asset('public/brand_images') }}/" + image).show();
        } else {
            preview.hide().attr('src', '');
        }
    });

    // Trigger brand image preview on page load for pre-selected brands
    $('.brand-select').each(function() {
        let image = $(this).find(':selected').data('image');
        let preview = $(this).closest('.brand-size-row').find('.brand-preview');
        if(image && image !== '') {
            preview.attr('src', "{{ asset('public/brand_images') }}/" + image).show();
        }
    });
    updateButtons();

    // -------------------------------
    //NEW CODE
    $(document).on('change', '.brand-select', function(){
        let image = $(this).find(':selected').data('image');
        let preview = $('#brand-preview');
        if(image && image !== '') {
            preview.attr('src', "{{ asset('public/brand_images') }}/" + image).show();
        } else {
            preview.hide().attr('src', '');
        }
    });
    
});
</script>
@endpush