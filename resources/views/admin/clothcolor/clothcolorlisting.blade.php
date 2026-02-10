@extends('admin.layouts.app')

@section('title', 'Cloth Color Listing')

@section('content')
<div class="container-xxl">
    <div class="row align-items-center">
        <div class="border-0 mb-4">
            <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center 
                        px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Cloth Color Listing</h3>
                <a href="{{ route('clothcolor.create') }}" class="btn btn-primary">+ Add Cloth Color</a>
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
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($clothcolors as $key => $clothcolor)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $clothcolor->name }}</td>
                            <td class="text-center">
                                <a href="{{ route('clothcolor.edit', $clothcolor->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('clothcolor.destroy', $clothcolor->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this clothcolor?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center">No Cloth Color Found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $clothcolors->links() }}
        </div>
    </div>
</div>
@endsection
