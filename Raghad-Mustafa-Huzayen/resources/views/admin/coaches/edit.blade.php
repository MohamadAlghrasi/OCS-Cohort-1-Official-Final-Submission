@extends('admin.layout.master')
@section('title', 'Edit Coach')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Coach</h1>
        <a href="{{ route('admin.coaches.index') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Back to Coaches
        </a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Coach Information</h6>
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

                    <form action="{{ route('admin.coaches.update', $coach->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Full Name *</label>
                                <input type="text" class="form-control" name="name" id="name" required 
                                       value="{{ old('name', $coach->name) }}">
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="title">Title/Position *</label>
                                <input type="text" class="form-control" name="title" id="title" required 
                                       value="{{ old('title', $coach->title) }}">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="experience">Experience *</label>
                                <input type="text" class="form-control" name="experience" id="experience" required 
                                       value="{{ old('experience', $coach->experience) }}">
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="specialty">Specialty *</label>
                                <input type="text" class="form-control" name="specialty" id="specialty" required 
                                       value="{{ old('specialty', $coach->specialty) }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="bio">Bio/Description *</label>
                            <textarea class="form-control" name="bio" id="bio" rows="4" required>{{ old('bio', $coach->bio) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="image">Profile Image</label>
                            @if($coach->image)
                                <div class="mb-3">
                                    <p><strong>Current Image:</strong></p>
                                    <img src="{{ asset('storage/' . $coach->image) }}" 
                                         alt="{{ $coach->name }}" 
                                         class="img-fluid rounded" 
                                         style="max-height: 200px;">
                                </div>
                            @endif
                            
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image" id="image" accept="image/*">
                                <label class="custom-file-label" for="image">Choose new file (optional)...</label>
                            </div>
                            <small class="form-text text-muted">Leave empty to keep current image. Max 2MB.</small>
                            <div class="mt-2" id="imagePreview"></div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update Coach
                            </button>
                            <a href="{{ route('admin.coaches.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Current Coach Details</h6>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <img src="{{ asset('storage/' . $coach->image) }}" 
                             alt="{{ $coach->name }}" 
                             class="img-fluid rounded-circle" 
                             style="width: 150px; height: 150px; object-fit: cover;">
                        <h5 class="mt-3">{{ $coach->name }}</h5>
                        <p class="text-muted">{{ $coach->title }}</p>
                    </div>
                    
                    <div class="alert alert-info">
                        <p><strong>Created:</strong> {{ $coach->created_at->format('M d, Y') }}</p>
                        <p><strong>Last Updated:</strong> {{ $coach->updated_at->format('M d, Y') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Image Preview Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('imagePreview');
    
    imageInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.innerHTML = `
                    <div class="alert alert-info">
                        <p><strong>New Image Preview:</strong></p>
                        <img src="${e.target.result}" class="img-fluid rounded" style="max-height: 200px;">
                    </div>
                `;
            }
            reader.readAsDataURL(file);
        }
    });
    
    imageInput.addEventListener('change', function() {
        const fileName = this.files[0] ? this.files[0].name : 'Choose new file (optional)...';
        const label = this.nextElementSibling;
        label.textContent = fileName;
    });
});
</script>
@endsection