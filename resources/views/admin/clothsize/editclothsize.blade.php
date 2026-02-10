@extends('admin.layouts.app')

@section('title', 'Edit Cloth Size')

@section('content')
<div class="container-xxl">
    <div class="row align-items-center mb-4">
        <div class="col-12">
            <div class="card-header py-3 no-bg bg-transparent d-flex justify-content-between align-items-center border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Edit Cloth Size </h3><span class="text-danger">NOTE: Need to add Size between below range - <br/>Age Range : 0 Months to 3 Years<br/>Age Range : 2 Years to 7 Years<br/>Age Range : 6 Years to 14 Years</span>
            </div>
        </div>
    </div>

    <form method="POST" enctype="multipart/form-data" action="{{ route('clothsize.update', $clothsize->id) }}">
        @csrf
        @method('PUT')

        <div class="card mb-3 p-3">
            <div class="row g-3 align-items-center mt-2">
                <div class="col-md-6">
                    <label class="form-label">Cloth Size Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $clothsize->name }}" required>
                </div>
                {{-- <div class="col-md-6">
                    <label class="form-label">Cloth Size Text</label>
                    <input type="text" name="name_text" class="form-control" value="{{ $clothsize->name_text }}" required>
                </div> --}}
                {{-- <div class="col-md-6">
                    <label class="form-label">Cloth Size From & To</label>
                    <div class="row">
                        <div class="col-md-2">
                            <input type="text" name="size_from" class="form-control @error('size_from') is-invalid @enderror"
                                value="{{ old('size_from', $sizeFromValue) }}">
                            @error('size_from')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <select name="month_year1" class="form-control @error('month_year1') is-invalid @enderror">
                                <option value="">Select</option>
                                <option value="months" {{ old('month_year1', $monthYear1) == 'months' ? 'selected' : '' }}>Months</option>
                                <option value="years" {{ old('month_year1', $monthYear1) == 'years' ? 'selected' : '' }}>Years</option>
                            </select>
                            @error('month_year1')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <input type="text" name="size_to" class="form-control @error('size_to') is-invalid @enderror"
                                value="{{ old('size_to', $sizeToValue) }}">
                            @error('size_to')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <select name="month_year2" class="form-control @error('month_year2') is-invalid @enderror">
                                <option value="">Select</option>
                                <option value="months" {{ old('month_year2', $monthYear2) == 'months' ? 'selected' : '' }}>Months</option>
                                <option value="years" {{ old('month_year2', $monthYear2) == 'years' ? 'selected' : '' }}>Years</option>
                            </select>
                            @error('month_year2')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Cloth Size Text</label>
                    <input type="text" name="name_text" class="form-control @error('name_text') is-invalid @enderror" value="{{ old('name_text', $clothsize->name_text) }}">
                    @error('name_text')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div> --}}
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update Cloth Size</button>
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

