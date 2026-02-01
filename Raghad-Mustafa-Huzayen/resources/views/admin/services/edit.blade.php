@extends('admin.layout.master')
@section('title', 'Edit Service')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Service</h1>
        <a href="{{ route('admin.services.index') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Back to Services
        </a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Service Information</h6>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <form action="{{ route('admin.services.update', $service->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="title">Service Title *</label>
                                <input type="text" class="form-control" name="title" id="title" required 
                                       value="{{ old('title', $service->title) }}">
                            </div>
                            
                            <div class="form-group col-md-4">
                                <label for="order">Display Order *</label>
                                <input type="number" class="form-control" name="order" id="order" required 
                                       value="{{ old('order', $service->order) }}" min="0" max="100">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="icon_class">Icon Class *</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="icon_class" id="icon_class" required 
                                       value="{{ old('icon_class', $service->icon_class) }}">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#iconModal">
                                        Browse Icons
                                    </button>
                                </div>
                            </div>
                            <small class="form-text text-muted">
                                Current icon: <i id="iconPreview" class="{{ $service->icon_class }}"></i>
                            </small>
                        </div>

                        <div class="form-group">
                            <label for="description">Description *</label>
                            <textarea class="form-control" name="description" id="description" rows="5" required>{{ old('description', $service->description) }}</textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update Service
                            </button>
                            <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Current Service</h6>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="{{ $service->icon_class }} fa-4x text-primary mb-3"></i>
                        <h5>{{ $service->title }}</h5>
                        <p class="text-muted">Order: {{ $service->order }}</p>
                    </div>
                    
                    <div class="alert alert-info">
                        <p><strong>Created:</strong> {{ $service->created_at->format('M d, Y') }}</p>
                        <p><strong>Last Updated:</strong> {{ $service->updated_at->format('M d, Y') }}</p>
                    </div>
                    
                    <div class="alert alert-warning">
                        <h6><i class="fas fa-eye"></i> Preview:</h6>
                        <div class="service-preview p-3">
                            <i class="{{ $service->icon_class }} fa-2x mb-2 d-block"></i>
                            <h6>{{ $service->title }}</h6>
                            <p class="small">{{ Str::limit($service->description, 100) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Icon Modal (same as create) -->
<div class="modal fade" id="iconModal" tabindex="-1" role="dialog" aria-labelledby="iconModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="iconModalLabel">Select Icon</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    @php
                        $icons = [
                            'fas fa-volleyball-ball', 'fas fa-users', 'fas fa-trophy', 'fas fa-calendar-alt',
                            'fas fa-user-friends', 'fas fa-building', 'fas fa-graduation-cap', 'fas fa-birthday-cake',
                            'fas fa-running', 'fas fa-dumbbell', 'fas fa-stopwatch', 'fas fa-medal',
                            'fas fa-heart', 'fas fa-star', 'fas fa-flag', 'fas fa-shield-alt',
                            'fas fa-gamepad', 'fas fa-basketball-ball', 'fas fa-futbol', 'fas fa-baseball-ball'
                        ];
                    @endphp
                    @foreach($icons as $icon)
                    <div class="col-3 col-md-2 mb-3">
                        <button type="button" class="btn btn-outline-primary btn-block icon-select" data-icon="{{ $icon }}">
                            <i class="{{ $icon }} fa-2x"></i>
                            <small class="d-block mt-1">{{ Str::afterLast($icon, 'fa-') }}</small>
                        </button>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const iconInput = document.getElementById('icon_class');
    const iconPreview = document.getElementById('iconPreview');
    
    iconInput.addEventListener('input', function() {
        iconPreview.className = this.value;
    });
    
    document.querySelectorAll('.icon-select').forEach(button => {
        button.addEventListener('click', function() {
            const iconClass = this.getAttribute('data-icon');
            iconInput.value = iconClass;
            iconPreview.className = iconClass;
            $('#iconModal').modal('hide');
        });
    });
});
</script>

<style>
.service-preview {
    background: #f8f9fa;
    border-radius: 5px;
    border-left: 4px solid #4e73df;
}
</style>
@endsection