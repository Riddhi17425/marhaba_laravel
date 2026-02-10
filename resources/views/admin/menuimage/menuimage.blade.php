@extends('admin.layouts.app')
@section('title', 'Add Menu Image')
@section('content')
<div class="container-xxl">
    <div class="row align-items-center mb-4">
        <div class="col-12">
            <div class="card-header py-3 no-bg bg-transparent d-flex justify-content-between align-items-center border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Add Menu Image</h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form method="POST" enctype="multipart/form-data" action="{{ route('menuimage.store') }}">
            @csrf
            <input type="hidden" name="type" id="selected-type" value="">
            
            <div class="card mb-3 p-3">
                <div class="card-header py-3 p-0 bg-transparent border-bottom-0">
                    <h6 class="mb-0 fw-bold">Menu Image Information</h6>
                </div>
                <div class="row g-3 align-items-center mt-2">
                    <div class="col-md-4">
                        <label class="form-label">Category</label>
                        <select name="reference_id" id="category-select" class="form-select type-select" data-type="category">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Product</label>
                        <select name="reference_id" id="product-select" class="form-select type-select" data-type="product">
                            <option value="">Select Product</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Size</label>
                        <select name="reference_id" id="size-select" class="form-select type-select" data-type="size">
                            <option value="">Select Size</option>
                            @foreach($sizes as $size)
                                <option value="{{ $size->id }}">{{ $size->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 mt-3">
                        <label class="form-label">Image</label>
                        <input type="file" name="image" class="form-control dropify" required>
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary py-2 px-5 text-uppercase">Save</button>
        </form>
    </div>
</div>
@push('scripts')
<script>
document.querySelectorAll('.type-select').forEach(select => {
    // Disable all except one initially
    select.disabled = false;
    
    select.addEventListener('change', function() {
        const selectedType = this.getAttribute('data-type');
        
        if(this.value) {
            // Set the type in hidden field
            document.getElementById('selected-type').value = selectedType;
            
            // Disable other selects and clear their values
            document.querySelectorAll('.type-select').forEach(s => {
                if(s !== this) {
                    s.disabled = true;
                    s.value = '';
                    s.removeAttribute('name');
                }
            });
            
            // Ensure current select has the name attribute
            this.setAttribute('name', 'reference_id');
        } else {
            // Re-enable all selects if current is cleared
            document.getElementById('selected-type').value = '';
            document.querySelectorAll('.type-select').forEach(s => {
                s.disabled = false;
                s.setAttribute('name', 'reference_id');
            });
        }
    });
});

// Form validation before submit
document.querySelector('form').addEventListener('submit', function(e) {
    const typeField = document.getElementById('selected-type').value;
    const referenceId = document.querySelector('.type-select:not([disabled])').value;
    
    if(!typeField || !referenceId) {
        e.preventDefault();
        alert('Please select either a Category, Product, or Size');
        return false;
    }
});
</script>
@endpush
@endsection