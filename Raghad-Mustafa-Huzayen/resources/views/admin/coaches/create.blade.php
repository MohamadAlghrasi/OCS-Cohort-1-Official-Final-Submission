@extends('admin.layout.master')
@section('title', 'Add Coach')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add New Coach</h1>
        <a href="{{ route('admin.coaches.index') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Back to Coaches
        </a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Coach Information</h6>
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

                    <form action="{{ route('admin.coaches.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Full Name *</label>
                                <input type="text" class="form-control" name="name" id="name" required 
                                       value="{{ old('name') }}" placeholder="Enter coach's full name">
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="title">Title/Position *</label>
                                <input type="text" class="form-control" name="title" id="title" required 
                                       value="{{ old('title') }}" placeholder="E.g., Head Coach, Assistant Coach">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="experience">Experience *</label>
                                <input type="text" class="form-control" name="experience" id="experience" required 
                                       value="{{ old('experience') }}" placeholder="E.g., 5 years, 10+ years">
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="specialty">Specialty *</label>
                                <input type="text" class="form-control" name="specialty" id="specialty" required 
                                       value="{{ old('specialty') }}" placeholder="E.g., Defense, Strategy, Training">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="bio">Bio/Description *</label>
                            <textarea class="form-control" name="bio" id="bio" rows="4" required 
                                      placeholder="Describe the coach's background, achievements, and coaching style...">{{ old('bio') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="image">Profile Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image" id="image" accept="image/*">
                                <label class="custom-file-label" for="image">Choose file...</label>
                            </div>
                            <small class="form-text text-muted">Optional. Recommended size: 400x400px. Max 2MB.</small>
                            <div class="mt-2" id="imagePreview"></div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Add Coach
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
                    <h6 class="m-0 font-weight-bold text-primary">Quick Tips</h6>
                </div>
                <div class="card-body">
                    <div class="alert alert-info">
                        <h6><i class="fas fa-info-circle"></i> Coach Profile Tips:</h6>
                        <ul class="mb-0">
                            <li>Keep bio concise but informative</li>
                            <li>Highlight key achievements</li>
                            <li>Mention special training or certifications</li>
                            <li>Include unique coaching style or philosophy</li>
                        </ul>
                    </div>
                    
                    <div class="alert alert-warning">
                        <h6><i class="fas fa-exclamation-triangle"></i> Image Guidelines:</h6>
                        <ul class="mb-0">
                            <li>Use professional-looking photos</li>
                            <li>Square images work best</li>
                            <li>Good lighting and clear face visible</li>
                            <li>Appropriate attire (sportswear preferred)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Image Preview Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Image preview
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('imagePreview');
    
    imageInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.innerHTML = `
                    <div class="alert alert-info">
                        <p><strong>Image Preview:</strong></p>
                        <img src="${e.target.result}" class="img-fluid rounded" style="max-height: 200px;">
                    </div>
                `;
            }
            reader.readAsDataURL(file);
        }
    });
    
    // Update custom file input label
    imageInput.addEventListener('change', function() {
        const fileName = this.files[0] ? this.files[0].name : 'Choose file...';
        const label = this.nextElementSibling;
        label.textContent = fileName;
    });
});
</script>
@endsection