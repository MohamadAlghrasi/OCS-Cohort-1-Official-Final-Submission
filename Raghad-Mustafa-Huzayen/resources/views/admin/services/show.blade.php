@extends('admin.layout.master')
@section('title', 'View Service')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Service Details</h1>
        <div>
            <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-primary btn-sm">
                <i class="fas fa-edit"></i> Edit
            </a>
            <a href="{{ route('admin.services.index') }}" class="btn btn-secondary btn-sm">
                <i class="fas fa-arrow-left"></i> Back to Services
            </a>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Service Information</h6>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-8">
                            <h3 class="mb-3">{{ $service->title }}</h3>
                            <div class="mb-4">
                                <span class="badge badge-secondary">Order: {{ $service->order }}</span>
                                <span class="badge badge-info ml-2">
                                    <i class="{{ $service->icon_class }}"></i> {{ Str::afterLast($service->icon_class, 'fa-') }}
                                </span>
                            </div>
                            
                            <div class="service-description">
                                <h5>Description:</h5>
                                <div class="card">
                                    <div class="card-body">
                                        <div style="white-space: pre-line;">{{ $service->description }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="text-center">
                                <div class="icon-display mb-4">
                                    <i class="{{ $service->icon_class }} fa-5x text-primary"></i>
                                </div>
                                
                                <div class="card border-left-primary shadow h-100 py-2 mb-3">
                                    <div class="card-body">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Created
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            {{ $service->created_at->format('M d, Y') }}
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Last Updated
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            {{ $service->updated_at->format('M d, Y') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">Quick Stats</h6>
                                </div>
                                <div class="card-body">
                                    <p><strong>Description Length:</strong> {{ strlen($service->description) }} characters</p>
                                    <p><strong>Title Length:</strong> {{ strlen($service->title) }} characters</p>
                                    <p><strong>Display Position:</strong> {{ $service->order }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">Preview</h6>
                                </div>
                                <div class="card-body">
                                    <div class="service-preview">
                                        <div class="text-center">
                                            <i class="{{ $service->icon_class }} fa-3x text-primary mb-3"></i>
                                            <h5>{{ $service->title }}</h5>
                                            <p class="small text-muted">{{ Str::limit($service->description, 80) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.icon-display {
    padding: 30px;
    background: #f8f9fa;
    border-radius: 10px;
    border: 2px dashed #dee2e6;
}
.service-preview {
    background: #f8f9fa;
    padding: 20px;
    border-radius: 8px;
    border: 1px solid #e3e6f0;
}
</style>
@endsection