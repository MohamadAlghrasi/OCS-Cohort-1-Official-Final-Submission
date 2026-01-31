@extends('admin.layout.master')
@section('title', 'Manage Services')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage Services</h1>
        <a href="{{ route('admin.services.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Add New Service
        </a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">All Services</h6>
                    <span class="badge badge-info">{{ $services->count() }} services</span>
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
                                    <th>Order</th>
                                    <th>Icon</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($services as $service)
                                <tr>
                                    <td class="text-center">
                                        <span class="badge badge-secondary">{{ $service->order }}</span>
                                    </td>
                                    <td class="text-center">
                                        <i class="{{ $service->icon_class }} fa-2x text-primary"></i>
                                    </td>
                                    <td>
                                        <strong>{{ $service->title }}</strong>
                                    </td>
                                    <td>
                                        <div class="description-preview">
                                            {{ Str::limit($service->description, 150) }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Delete this service?')">
                                                    <i class="fas fa-trash">Delete</i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">No services found. <a href="{{ route('admin.services.create') }}">Add your first service</a></td>
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

<style>
.description-preview {
    max-height: 60px;
    overflow: hidden;
    text-overflow: ellipsis;
}
</style>
@endsection