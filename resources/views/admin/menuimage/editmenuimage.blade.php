@extends('admin.layouts.app')
@section('title', 'Edit Menu Image')
@section('content')
<div class="container-xxl">
    <h3>Edit Menu Image</h3>
    <form method="POST" enctype="multipart/form-data" action="{{ route('menuimage.update', $menuImage->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" name="type" id="selected-type" value="{{ $menuImage->type }}">
        
        <div class="row g-3">
            <div class="col-md-4">
                <label class="form-label">Category</label>
                <select name="reference_id" id="category-select" class="form-select type-select" data-type="category" {{ $menuImage->type != 'category' ? 'disabled' : '' }}>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $menuImage->type=='category' && $menuImage->reference_id==$category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label">Product</label>
                <select name="reference_id" id="product-select" class="form-select type-select" data-type="product" {{ $menuImage->type != 'product' ? 'disabled' : '' }}>
                    <option value="">Select Product</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}" {{ $menuImage->type=='product' && $menuImage->reference_id==$product->id ? 'selected' : '' }}>
                            {{ $product->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label">Size</label>
                <select name="reference_id" id="size-select" class="form-select type-select" data-type="size" {{ $menuImage->type != 'size' ? 'disabled' : '' }}>
                    <option value="">Select Size</option>
                    @foreach($sizes as $size)
                        <option value="{{ $size->id }}" {{ $menuImage->type=='size' && $menuImage->reference_id==$size->id ? 'selected' : '' }}>
                            {{ $size->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-12 mt-3">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control dropify">
                @if($menuImage->image)
                    <img src="{{ asset('public/menu_images/'.$menuImage->image) }}" width="80" class="mt-2">
                @endif
            </div>
            <div class="col-md-12 mt-3">
                <button class="btn btn-primary" type="submit">Update</button>
            </div>
        </div>
    </form>
</div>
@push('scripts')
<script>
// Initialize - remove name from disabled selects
document.querySelectorAll('.type-select[disabled]').forEach(s => {
    s.removeAttribute('name');
});

document.querySelectorAll('.type-select').forEach(select => {
    select.addEventListener('change', function() {
        const selectedType = this.getAttribute('data-type');
        
        if(this.value) {
            document.getElementById('selected-type').value = selectedType;
            
            document.querySelectorAll('.type-select').forEach(s => {
                if(s !== this) {
                    s.disabled = true;
                    s.value = '';
                    s.removeAttribute('name');
                }
            });
            this.setAttribute('name', 'reference_id');
        } else {
            document.querySelectorAll('.type-select').forEach(s => {
                s.disabled = false;
                s.setAttribute('name', 'reference_id');
            });
        }
    });
});
</script>
@endpush
@endsection