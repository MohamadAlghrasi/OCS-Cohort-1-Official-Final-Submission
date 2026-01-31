<div>
    <div class="mb-4 row justify-content-center ">
        <div class="col-6 ">
        <input 
            type="text" 
            wire:model.live.debounce.500ms="search" 
            placeholder="Search for a teacher.." 
            class="form-control form-control-lg ">
        </div>
    </div>

    <div wire:loading class="text-center mb-3">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Searching...</span>
        </div>
    </div>


           <div class="row gy-5" wire:loading.remove>
            @forelse ($tutors as $tutor)
            <div class="col-lg-4 col-md-6 member">
             <div class="member-img d-flex justify-content-center">
              <img 
              src="{{ $tutor->user?->profile_image 
                    ? asset('storage/profile_images/' . $tutor->user->profile_image) 
                    : asset('storage/profile_images/profile.jpg') }}" 
                   alt="Profile Photo"
                  class="img-fluid rounded-circle shadow"
                 style="width:180px; height:180px; object-fit:cover;"
                id="preview-image"
/>
</div>

                <div class="member-info text-center">
                    <h4>{{ $tutor->user?->name ?? '-' }}</h4>
                    <span class="text-muted">{{ $tutor->subjects->pluck('name')->join(', ') }}</span>
                    <p class="mt-2">{{ Str::limit($tutor->bio, 100) }}</p>
                    <a  href="{{ route('home.tutor_profile', $tutor->id) }}"  class="btn btn-purple mt-2">View Profile</a>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <div class="alert alert-info">
                    <i class="bi bi-info-circle me-2"></i>
                   No tutors found.
                </div>
            </div>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $tutors->links() }}
    </div>
</div>