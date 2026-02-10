@extends('admin.layouts.app')

@section('title', 'Trusted By Listing')

@section('content')
<div class="container-xxl">
    <div class="row align-items-center">
        <div class="border-0 mb-4">
            <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center 
                        px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Why choose Us Listing</h3>
                <a href="{{ route('whychoose-us.create') }}" class="btn btn-primary">+ Add Why choose us</a>
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
                        <th>Title</th>
                        <th>Description</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($whyChooseData as $key => $whyChooseUs)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $whyChooseUs->title ?? '' }}</td>
                            <td>{{ $whyChooseUs->desc ?? '' }}</td>
                            <td class="text-center">
                                <a href="{{ route('whychoose-us.edit', $whyChooseUs->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('whychoose-us.destroy', $whyChooseUs->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this Image?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-center">No Image found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $whyChooseData->links() }}
        </div>
    </div>
</div>
@endsection
