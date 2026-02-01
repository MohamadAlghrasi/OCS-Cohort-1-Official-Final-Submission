@extends('admin.layout.master')
@section('title', 'Add Service')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add New Service</h1>
        <a href="{{ route('admin.services.index') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Back to Services
        </a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Service Information</h6>
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

                    <form action="{{ route('admin.services.store') }}" method="POST">
                        @csrf
                        
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="title">Service Title *</label>
                                <input type="text" class="form-control" name="title" id="title" required 
                                       value="{{ old('title') }}" placeholder="E.g., Weekly Dodgeball Games">
                            </div>
                            
                            <div class="form-group col-md-4">
                                <label for="order">Display Order *</label>
                                <input type="number" class="form-control" name="order" id="order" required 
                                       value="{{ old('order', 0) }}" min="0" max="100">
                                <small class="form-text text-muted">Lower numbers appear first</small>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="icon_class">Icon Class *</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="icon_class" id="icon_class" required 
                                       value="{{ old('icon_class', 'fas fa-volleyball-ball') }}" placeholder="fas fa-volleyball-ball">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#iconModal">
                                        Browse Icons
                                    </button>
                                </div>
                            </div>
                            <small class="form-text text-muted">
                                Font Awesome class. Preview: <i id="iconPreview" class="{{ old('icon_class', 'fas fa-volleyball-ball') }}"></i>
                            </small>
                        </div>

                        <div class="form-group">
                            <label for="description">Description *</label>
                            <textarea class="form-control" name="description" id="description" rows="5" required 
                                      placeholder="Describe this service in detail...">{{ old('description') }}</textarea>
                            <small class="form-text text-muted">Keep it concise but informative</small>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Add Service
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
                    <h6 class="m-0 font-weight-bold text-primary">Quick Tips</h6>
                </div>
                <div class="card-body">
                    <div class="alert alert-info">
                        <h6><i class="fas fa-info-circle"></i> Service Tips:</h6>
                        <ul class="mb-0">
                            <li>Keep titles clear and descriptive</li>
                            <li>Use bullet points in description for readability</li>
                            <li>Order determines display sequence (0 = first)</li>
                            <li>Choose relevant icons for each service</li>
                        </ul>
                    </div>
                    
                    <div class="alert alert-warning">
                        <h6><i class="fas fa-exclamation-triangle"></i> Common Service Ideas:</h6>
                        <ul class="mb-0">
                            <li>Weekly Dodgeball Games</li>
                            <li>Private Group Bookings</li>
                            <li>Corporate Team Building</li>
                            <li>Tournaments & Events</li>
                            <li>Training & Coaching</li>
                            <li>Equipment Rental</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Icon Modal -->
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
    
    // Update preview when input changes
    iconInput.addEventListener('input', function() {
        iconPreview.className = this.value;
    });
    
    // Icon selection from modal
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
@endsection