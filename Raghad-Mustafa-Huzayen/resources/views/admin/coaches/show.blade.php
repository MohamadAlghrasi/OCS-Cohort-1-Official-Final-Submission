@extends('admin.layout.master')
@section('title', 'View Coach')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Coach Details</h1>
        <div>
            <a href="{{ route('admin.coaches.edit', $coach->id) }}" class="btn btn-primary btn-sm">
                <i class="fas fa-edit"></i> Edit
            </a>
            <a href="{{ route('admin.coaches.index') }}" class="btn btn-secondary btn-sm">
                <i class="fas fa-arrow-left"></i> Back to Coaches
            </a>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-body text-center">
                    <img src="{{ asset('storage/' . $coach->image) }}" 
                         alt="{{ $coach->name }}" 
                         class="img-fluid rounded-circle mb-4"
                         style="width: 200px; height: 200px; object-fit: cover;">
                    <h3>{{ $coach->name }}</h3>
                    <p class="text-primary font-weight-bold">{{ $coach->title }}</p>
                    <div class="mt-4">
                        <p><i class="fas fa-award"></i> <strong>Experience:</strong> {{ $coach->experience }}</p>
                        <p><i class="fas fa-star"></i> <strong>Specialty:</strong> {{ $coach->specialty }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Coach Bio</h6>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <p style="white-space: pre-line;">{{ $coach->bio }}</p>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Created At
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                {{ $coach->created_at->format('M d, Y') }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar-plus fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Last Updated
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                {{ $coach->updated_at->format('M d, Y') }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-sync-alt fa-2x text-gray-300"></i>
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
@endsection