@extends('admin.layouts.app')

@section('title', 'Add Blessing')

@section('content')
<div class="container-xxl">
    <div class="row mb-3">
        <div class="col-md-6">
            <h3>Edit Why choose Us</h3>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('whychoose-us.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>

   <form action="{{ route('whychoose-us.update', $whyChooseData->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Title</label><span class="text-danger">*</span>
                <input type="text" name="title" class="form-control" 
                    value="{{ old('title', $whyChooseData->title) }}">
                @error('title') 
                    <span class="text-danger">{{ $message }}</span> 
                @enderror
            </div>
            
            <div class="col-md-6">
                <label class="form-label">Select Images</label><span class="text-danger">*</span>
                <input type="file" name="image" class="form-control" value="{{ old('image') }}">
                @if(isset($whyChooseData->image))
                    <img src="{{ asset('public/why_chooseus/'.$whyChooseData->image) }}" width="100">
                @endif
                @error('image') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            
            <div class="col-md-12">
                <label class="form-label">Description</label><span class="text-danger">*</span>
                <textarea name="description" rows="5" id="description" class="form-control">{{ old('description', $whyChooseData->desc) }}</textarea>
                @error('description') 
                    <span class="text-danger">{{ $message }}</span> 
                @enderror
            </div>

            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script> 


</script>

@endpush