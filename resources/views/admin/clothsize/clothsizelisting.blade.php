@extends('admin.layouts.app')

@section('title', 'Cloth Size Listing')

@section('content')
<div class="container-xxl">
    <div class="row align-items-center">
        <div class="border-0 mb-4">
            <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center 
                        px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Cloth Size Listing</h3>
                <a href="{{ route('clothsize.create') }}" class="btn btn-primary">+ Add Cloth Size</a>
            </div>
        </div>
    </div>

    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Name Text</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($clothsizes as $key => $clothsize)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $clothsize->name }}</td>
                            <td>{{ $clothsize->name_text }}</td>
                            <td class="text-center">
                                <a href="{{ route('clothsize.edit', $clothsize->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('clothsize.destroy', $clothsize->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this clothsize?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center">No Cloth Size Found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $clothsizes->links() }}
        </div>
    </div>
</div>
@endsection
