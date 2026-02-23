@extends('admin.layouts.app')

@section('title', 'Edit Home Slider Image')

@section('content')
<div class="container-xxl">
    <div class="row mb-3">
        <div class="col-md-6">
            <h3>Edit Home Slider Image</h3>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('homeslider-image.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>

    <form action="{{ route('homeslider-image.update', $id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row g-3">
            <div class="col-md-6">
                @if($id == 1)
                <h5>First Slider Images</h5>
                @elseif($id == 2)
                <h5>Second Slider Images</h5>
                @elseif($id == 3)
                <h5>Third Slider Images</h5>
                @else
                @endif
                <label class="form-label">
                    Select Images
                </label>
                <span class="text-danger">*</span>
                {{-- <input type="file" name="image" class="form-control"> --}}
                <input type="file" name="image[]" id="imageInput" class="form-control" multiple>
                {{-- @if(isset($homeSlider) && is_countable($homeSlider) && count($homeSlider) > 0)
                    @foreach($homeSlider as $key => $val)
                        <img src="{{ asset('public/homeslider_images/'.$val->image) }}" class="m-2" width="100">
                    @endforeach
                @endif --}}
                <div id="existing-images" class="d-flex flex-wrap">
                    @if(isset($homeSlider) && count($homeSlider) > 0)
                        @foreach($homeSlider as $val)
                            <div class="position-relative m-2 image-wrapper" id="image-{{ $val->id }}">
                                <img src="{{ asset('public/homeslider_images/'.$val->image) }}" width="120" class="border rounded">

                                <button type="button"
                                    class="btn btn-danger btn-sm position-absolute top-0 end-0 delete-image"
                                    data-id="{{ $val->id }}">
                                    ✖
                                </button>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div id="new-preview" class="d-flex flex-wrap mt-2"></div>
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
$(document).on('click', '.delete-image', function () {
    let id = $(this).data('id');

    if (confirm('Delete this image?')) {
        $.ajax({
            url: "{{ url('homeslider-image/delete') }}/" + id,
            type: "DELETE",
            data: {
                _token: "{{ csrf_token() }}"
            },
            success: function () {
                $('#image-' + id).remove();
            }
        });
    }
});

$('#imageInput').on('change', function () {
    let files = this.files;

    for (let i = 0; i < files.length; i++) {
        let reader = new FileReader();

        reader.onload = function (e) {
            $('#new-preview').append(`
                <div class="m-2">
                    <img src="${e.target.result}" width="120" class="border rounded">
                </div>
            `);
        };

        reader.readAsDataURL(files[i]);
    }
});
</script>
@endpush