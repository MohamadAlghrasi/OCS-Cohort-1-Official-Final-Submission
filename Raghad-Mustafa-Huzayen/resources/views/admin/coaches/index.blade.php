@extends('admin.layout.master')
@section('title', 'Manage Coaches')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage Coaches</h1>
        <a href="{{ route('admin.coaches.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Add New Coach
        </a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">All Coaches</h6>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Title</th>
                                    <th>Experience</th>
                                    <th>Specialty</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($coaches as $coach)
                                <tr>
                                    <td>{{ $coach->id }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $coach->image) }}" 
                                             alt="{{ $coach->name }}" 
                                             style="width: 60px; height: 60px; object-fit: cover; border-radius: 50%;">
                                    </td>
                                    <td>{{ $coach->name }}</td>
                                    <td>{{ $coach->title }}</td>
                                    <td>{{ $coach->experience }}</td>
                                    <td>{{ $coach->specialty }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <form action="{{ route('admin.coaches.destroy', $coach->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this coach?')">
                                                    <i class="fas fa-trash">Delete</i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">No coaches found. <a href="{{ route('admin.coaches.create') }}">Add your first coach</a></td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection