@extends('admin.layouts.app')

@section('title', 'Global Presence Listing')

@section('content')
<div class="container-xxl">
    <div class="row align-items-center mb-3">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h3 class="fw-bold mb-0">Global Presence Listing</h3>
            <a href="{{ route('globalpresence.create') }}" class="btn btn-primary">Add Global Presence</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category Title</th>
                        <th>Logo</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->cat_title }}</td>
                        <td>
                            @if($row->logo_image)
                                <img src="{{ asset('public/GlobalPresence_Logo_Image/'.$row->logo_image) }}" width="80">
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('globalpresence.edit', $row->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('globalpresence.destroy', $row->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $data->links() }}
        </div>
    </div>
</div>
@endsection
