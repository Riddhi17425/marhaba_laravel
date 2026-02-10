@extends('admin.layouts.app')
@section('title', 'Edit Product')
@section('content')
<div class="container-xxl">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-transparent border-bottom">
                    <h3 class="fw-bold mb-0">Edit Product</h3>
                </div>
                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form method="POST" enctype="multipart/form-data" action="{{ route('product.update', $product->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Product Type</label>
                                @php $productType = config('global_values.product_type') @endphp
                                <select name="product_type" class="form-control" required>
                                    <option value="">Select Type</option>
                                    @foreach($productType as $key => $val)
                                        <option value="{{ $key }}" {{ old('product_type', $product->type) == $key ? 'selected' : '' }}>{{ $val }}</option>
                                    @endforeach
                                </select>
                                @error('product_type') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Category</label>
                                <select name="category_id" class="form-control">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            {{-- <div class="col-md-12">
                                <label class="form-label">Sub Category Name</label>
                                <input type="text" name="product_detail_name" class="form-control" value="{{ old('product_detail_name', $product->product_detail_name) }}">
                                @error('product_detail_name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div> --}}
                            
                            <div class="col-md-6">
                                <label class="form-label">Product Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">URL</label>
                                <input type="text" name="url" class="form-control" value="{{ old('url', $product->url) }}" required>
                                @error('url') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6 d-flex align-items-center">
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" name="show_homepage" id="show_homepage" {{ old('show_homepage', $product->show_homepage ?? 0) ? 'checked' : '' }}>
                                    <label class="form-check-label ms-2" for="show_homepage">
                                        Show on Home Page
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Description</label>
                                <textarea name="description" class="form-control summernote">{{ old('description', $product->description) }}</textarea>
                                @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Key Features</label>
                                <textarea name="key_features" class="form-control summernote">{{ old('key_features', $product->key_features) }}</textarea>
                                @error('key_features') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">More Information</label>
                                <textarea name="more_information" class="form-control summernote">{{ old('more_information', $product->more_information) }}</textarea>
                                @error('more_information') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            {{-- <h5>Brand, Size, Color & Product Images</h5> --}}
                            <h5>Size, Product Images</h5>
                            <div id="dynamic-fields">
                                @if(!empty($productBrandSize))
                                    @foreach($productBrandSize as $index => $item)
                                        <div class="row brand-size-row mb-3 align-items-end">
                                            {{-- <div class="col-md-3">
                                                <label>Brand</label>
                                                <select name="brand_id[{{$index}}]" class="form-control brand-select">
                                                    <option value="">Select Brand</option>
                                                    @foreach($brands as $brand)
                                                        <option value="{{ $brand->id }}" data-image="{{ $brand->image }}" {{ old('brand_id.'.$index, $item['brand_id']) == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-2 text-center">
                                                <label>Brand Image</label><br>
                                                <img src="{{ ($item['brand_id'] && ($brand = $brands->find($item['brand_id']))) ? asset('public/brand_images/'.$brand->image) : '' }}" class="brand-preview" width="60" height="60" style="{{ ($item['brand_id'] && ($brand = $brands->find($item['brand_id']))) ? '' : 'display:none' }}; object-fit:contain;">
                                            </div> --}}
                                            <div class="col-md-2">
                                                <label>Size</label>
                                                <select name="size_id[{{$index}}]" class="form-control">
                                                    <option value="">Select Size</option>
                                                    @foreach($sizes as $size)
                                                        <option value="{{ $size->id }}" {{ old('size_id.'.$index, $item['size_id']) == $size->id ? 'selected' : '' }}>{{ $size->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            {{-- <div class="col-md-2">
                                                <label>Color</label>
                                                <select name="color_id[{{$index}}]" class="form-control">
                                                    <option value="">Select Color</option>
                                                    @foreach($colors as $color)
                                                        <option value="{{ $color->id }}" {{ old('color_id.'.$index, $item['color_id'] ?? '') == $color->id ? 'selected' : '' }}>{{ $color->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div> --}}
                                            <div class="col-md-2">
                                                <label>Product Image</label>
                                                <input type="file" name="product_image[{{$index}}]" class="form-control dropify" data-default-file="{{ $item['product_image'] ? asset('public/product_images/'.$item['product_image']) : '' }}">
                                                <input type="hidden" name="old_product_image[{{$index}}]" value="{{ $item['product_image'] }}">
                                            </div>
                                            <div class="col-md-1 d-flex gap-2">
                                                <button type="button" class="btn btn-success add-more">+</button>
                                                <button type="button" class="btn btn-danger remove" style="display:none">-</button>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    @include('admin.product.partials.empty-brand-size-row', ['index' => 0])
                                @endif
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary px-5">Update Product</button>
                    </form>
                </div>
            </div>
        </div>
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
            $(this).find('.add-more').toggle(index === $('.brand-size-row').length - 1);
            $(this).find('.remove').toggle(index !== $('.brand-size-row').length - 1);
        });
    }

    $(document).on('click', '.add-more', function(){
        let newIndex = $('.brand-size-row').length;
        let clone = $('.brand-size-row:first').clone();
        
        // Reset select values
        clone.find('select').val('');
        clone.find('.brand-preview').hide().attr('src', '');
        
        // Destroy dropify instance and clean up wrapper
        let fileInput = clone.find('input[type=file]');
        fileInput.removeClass('dropify');
        clone.find('.dropify-wrapper').replaceWith(fileInput);
        
        // Reset file input attributes
        fileInput.val('');
        fileInput.removeAttr('data-default-file');
        fileInput.attr('name', 'product_image[' + newIndex + ']');
        
        // Update other input names
        clone.find('input[type=hidden]').val('').attr('name', 'old_product_image[' + newIndex + ']');
        clone.find('select[name^="brand_id"]').attr('name', 'brand_id[' + newIndex + ']');
        clone.find('select[name^="size_id"]').attr('name', 'size_id[' + newIndex + ']');
        clone.find('select[name^="color_id"]').attr('name', 'color_id[' + newIndex + ']');
        
        // Append and reinitialize dropify
        $('#dynamic-fields').append(clone);
        clone.find('input[type=file]').addClass('dropify').dropify();
        updateButtons();
    });

    $(document).on('click', '.remove', function(){
        if($('.brand-size-row').length > 1){
            // Destroy dropify before removing
            $(this).closest('.brand-size-row').find('.dropify').dropify('destroy');
            $(this).closest('.brand-size-row').remove();
            
            // Reindex remaining rows
            $('.brand-size-row').each(function(index){
                $(this).find('select[name^="brand_id"]').attr('name','brand_id['+index+']');
                $(this).find('select[name^="size_id"]').attr('name','size_id['+index+']');
                $(this).find('select[name^="color_id"]').attr('name','color_id['+index+']');
                $(this).find('input[name^="product_image"]').attr('name','product_image['+index+']');
                $(this).find('input[name^="old_product_image"]').attr('name','old_product_image['+index+']');
            });
            updateButtons();
        }
    });

    $(document).on('change', '.brand-select', function(){
        let image = $(this).find(':selected').data('image');
        let preview = $(this).closest('.brand-size-row').find('.brand-preview');
        if(image) preview.attr('src', "{{ asset('public/brand_images') }}/"+image).show();
        else preview.hide().attr('src', '');
    });

    // Show brand images on load
    $('.brand-select').each(function(){
        let image = $(this).find(':selected').data('image');
        let preview = $(this).closest('.brand-size-row').find('.brand-preview');
        if(image) preview.attr('src', "{{ asset('public/brand_images') }}/"+image).show();
    });

    updateButtons();
});
</script>
@endpush