@extends('admin.layouts.app')

@section('title', 'Edit Girl/Boy Collection Image')

@section('content')
<div class="container-xxl">
    <div class="row mb-2">
        <div class="col-md-6">
            <div class="d-flex align-items-center">
                <h4 class="mb-0" style="color: #333;">
                    @if($id == 1)
                        <i class="icofont-child" style="color: #ff69b4; font-size: 24px;"></i> Girl Collection Images
                    @elseif($id == 2)
                        <i class="icofont-child" style="color: #4169e1; font-size: 24px;"></i> Boy Collection Images
                    @else
                        Collection Images
                    @endif
                </h4>
            </div>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('collection-random-image.index') }}" class="btn btn-sm btn-outline-secondary">
                <i class="icofont-arrow-left"></i> Back
            </a>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert" style="font-size: 0.9rem;">
            <h6 class="alert-heading mb-1">Validation Errors</h6>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <form action="{{ route('collection-random-image.update', $id) }}" method="POST" enctype="multipart/form-data" id="collectionImageForm">
        @csrf
        @method('PUT')

        <!-- Existing Images Section -->
        <div class="card mb-2 shadow-sm">
            <div class="card-header bg-light border-bottom py-2 px-3">
                <h6 class="mb-0">
                    <i class="icofont-ui-image" style="color: #6c757d;"></i> 
                    Existing Images
                </h6>
            </div>
            <div class="card-body p-2">
                <div id="existing-images-table">
                    @if(isset($collectionSlider) && count($collectionSlider) > 0)
                        <div class="table-responsive" style="font-size: 0.9rem;">
                            <table class="table table-hover mb-0 table-sm">
                                <thead class="table-light">
                                    <tr>
                                        <th width="15%" class="text-center">Preview</th>
                                        <th width="60%">Image Name</th>
                                        <th width="15%" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($collectionSlider as $val)
                                        <tr id="image-{{ $val->id }}" class="align-middle">
                                            <td class="text-center py-1">
                                                <img src="{{ asset('public/collection_random_image/'.$val->image) }}" width="60" height="60" class="border rounded" style="object-fit: cover;">
                                            </td>
                                            <td class="py-1">
                                                <strong class="image-name-text" style="font-size: 0.9rem;">{{ $val->name ?? ucfirst(str_replace('-', ' ', pathinfo($val->image, PATHINFO_FILENAME))) }}</strong>
                                                <br>
                                                <small class="text-muted" style="font-size: 0.8rem;">{{ substr($val->image, 0, 30) }}...</small>
                                            </td>
                                            <td class="text-center py-1">
                                                <button type="button" class="btn btn-xs btn-danger delete-image" data-id="{{ $val->id }}" title="Delete this image">
                                                    <i class="icofont-ui-delete"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info mb-0" style="font-size: 0.9rem;">
                            <i class="icofont-ui-alert"></i> No existing images. Add new images below.
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- New Images Section -->
        <div class="card shadow-sm mb-2">
            <div class="card-header bg-light border-bottom py-2 px-3">
                <h6 class="mb-0">
                    <i class="icofont-plus-circle" style="color: #28a745;"></i> 
                    Add New Images
                </h6>
            </div>
            <div class="card-body p-2">
                <div class="mb-2">
                    <button type="button" class="btn btn-sm btn-success" id="addImageRow">
                        <i class="icofont-plus"></i> Add Row
                    </button>
                </div>

                <div class="table-responsive" style="font-size: 0.9rem;">
                    <table class="table table-hover table-sm mb-0" id="new-images-table">
                        <thead class="table-light">
                            <tr>
                                <th width="25%">Image <span class="text-danger">*</span></th>
                                <th width="50%">Image Name <span class="text-danger">*</span></th>
                                <th width="15%" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody id="new-images-body">
                        </tbody>
                    </table>
                </div>

                <small class="form-text text-muted d-block mt-1" style="font-size: 0.8rem;">
                    <i class="icofont-ui-alert"></i> JPG, PNG, GIF, SVG | Max 2MB
                </small>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="row mt-2">
            <div class="col-md-12">
                <button type="submit" class="btn btn-sm btn-primary">
                    <i class="icofont-save"></i> Save Changes
                </button>
                <a href="{{ route('collection-random-image.index') }}" class="btn btn-sm btn-secondary">
                    <i class="icofont-close"></i> Back to List
                </a>
            </div>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<style>
    .image-preview-box {
        position: relative;
        display: inline-block;
        margin-right: 5px;
    }
    
    .preview-delete-btn {
        position: absolute;
        top: -8px;
        right: -8px;
        border-radius: 50%;
        width: 28px;
        height: 28px;
        padding: 0;
        display: none;
    }
    
    .image-preview-box:hover .preview-delete-btn {
        display: flex;
    }
    
    .table-hover tbody tr:hover {
        background-color: #f8f9fa;
    }
    
    .btn-xs {
        padding: 0.25rem 0.5rem;
        font-size: 0.75rem;
    }
    
    .card-body {
        padding: 0.75rem !important;
    }
</style>

<script>
let imageRowCount = 0;

// Add new image row
$(document).on('click', '#addImageRow', function () {
    imageRowCount++;
    let rowHtml = `
        <tr id="new-row-${imageRowCount}" class="align-middle">
            <td class="py-1">
                <div class="input-group input-group-sm">
                    <input type="file" name="new_image[]" class="form-control image-input" data-row="${imageRowCount}" accept="image/*" required style="font-size: 0.85rem;">
                </div>
                <small class="text-muted d-block mt-1">Selected: <span class="image-name-display">None</span></small>
                <div class="image-preview mt-1">
                </div>
            </td>
            <td class="py-1">
                <input type="text" name="new_name[]" class="form-control form-control-sm" placeholder="e.g., Summer Dress" required style="font-size: 0.85rem;">
            </td>
            <td class="text-center py-1">
                <button type="button" class="btn btn-xs btn-outline-danger remove-new-row" data-row="${imageRowCount}" title="Remove this row">
                    <i class="icofont-ui-delete"></i>
                </button>
            </td>
        </tr>
    `;
    $('#new-images-body').append(rowHtml);
});

// Remove new row
$(document).on('click', '.remove-new-row', function () {
    let rowId = $(this).data('row');
    $(`#new-row-${rowId}`).remove();
});

// Preview new image
$(document).on('change', '.image-input', function () {
    let rowId = $(this).data('row');
    let file = this.files[0];
    let $row = $(`#new-row-${rowId}`);
    
    if (file) {
        // Validate file
        const validTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml', 'image/webp'];
        const maxSize = 2 * 1024 * 1024; // 2MB
        
        if (!validTypes.includes(file.type)) {
            alert('Invalid file type. Please upload JPG, PNG, GIF, or SVG.');
            this.value = '';
            $row.find('.image-preview').html('');
            $row.find('.image-name-display').text('None');
            return;
        }
        
        if (file.size > maxSize) {
            alert('File size exceeds 2MB. Please choose a smaller file.');
            this.value = '';
            $row.find('.image-preview').html('');
            $row.find('.image-name-display').text('None');
            return;
        }
        
        let fileName = file.name;
        let reader = new FileReader();
        
        reader.onload = function (e) {
            $row.find('.image-preview').html(
                `<div class="image-preview-box">
                    <img src="${e.target.result}" width="60" height="60" class="border rounded" style="object-fit: cover;">
                </div>`
            );
            $row.find('.image-name-display').text(fileName);
        };
        
        reader.readAsDataURL(file);
    }
});

// Delete existing image
$(document).on('click', '.delete-image', function () {
    let id = $(this).data('id');
    let imageName = $(this).closest('tr').find('.image-name-text').text();

    if (confirm(`Delete "${imageName}"? This action cannot be undone.`)) {
        $.ajax({
            url: "{{ url('collection-random-image/delete') }}/" + id,
            type: "DELETE",
            data: {
                _token: "{{ csrf_token() }}"
            },
            success: function (response) {
                $('#image-' + id).fadeOut(300, function() {
                    $(this).remove();
                });
                
                // Show success message
                const alert = $(`
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle"></i> Image deleted successfully
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                `);
                $('form').before(alert);
                
                setTimeout(() => {
                    alert.fadeOut(300, function() { $(this).remove(); });
                }, 3000);
            },
            error: function (xhr) {
                alert('Error deleting image. Please try again.');
                console.error(xhr);
            }
        });
    }
});

// Form submission handler
$(document).on('submit', '#collectionImageForm', function(e) {
    let hasFiles = $('#new-images-body tr').length > 0;
    
    if (hasFiles) {
        let allFilesSelected = true;
        $('#new-images-body tr').each(function() {
            let fileInput = $(this).find('.image-input')[0];
            if (!fileInput.files.length) {
                allFilesSelected = false;
                $(this).find('.image-input').addClass('is-invalid');
            }
        });
        
        if (!allFilesSelected) {
            e.preventDefault();
            alert('Please select an image for all rows or remove empty rows.');
            return false;
        }
    }
});
</script>
@endpush