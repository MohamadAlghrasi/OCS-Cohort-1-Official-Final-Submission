@extends('layouts.home')
@section('title', 'My Requests')

@section('styles')
<style>
    .star-rating {
        direction: rtl;
        display: inline-flex;
        font-size: 35px;
        justify-content: center;
        margin: 20px 0;
    }
    
    .star-rating input[type="radio"] {
        display: none;
    }
    
    .star-rating label.star {
        color: #ddd;
        cursor: pointer;
        transition: color 0.2s;
        padding: 0 8px;
    }
    
    .star-rating input[type="radio"]:checked ~ label.star,
    .star-rating label.star:hover,
    .star-rating label.star:hover ~ label.star {
        color: #ffc107;
    }
</style>
@endsection

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">My Requests</h1>
    
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-body">
            <table id="datatablesSimple" class="table table-striped" border="1" cellpadding="8" width="100%">
                <thead>
                    <tr>
                        <th>Tutor Name</th>
                        <th>Subject</th>
                        <th>Proposed Date & Time</th> 
                        <th>Notes</th>
                        <th>Status</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($requests as $request)
                    <tr>
                        <td>{{ $request->tutor->user->name ?? 'N/A' }}</td>
                        <td>{{ $request->subject->name ?? 'N/A' }}</td>
                        <td>{{ \Carbon\Carbon::parse($request->proposed_datetime)->format('Y/m/d h:i A') }}</td>
                        <td>{{ $request->notes ?? 'No notes' }}</td>
                        <td>
                            @if($request->status == 'pending')
                                <span class="badge bg-secondary text-light">Pending</span>
                            
                            @elseif($request->status == 'accepted')
                                <div class="d-flex flex-column gap-1">
                                <span class="badge bg-success">Accepted</span>
                                <form action="{{ route('paypal.create') }}" method="POST" class="m-0">
                                @csrf
                                <input type="hidden" name="request_id" value="{{ $request->id }}">
                                <input type="hidden" name="amount" value="5.00">
                                <button type="submit" class="btn btn-sm btn-primary w-100">
                                <i class="fas fa-credit-card"></i> Pay
                                </button>
                                </form>
                                </div>
                            
                            @elseif($request->status == 'completed')
                                @if($request->review)
                                    <span class="badge bg-success"><i class="fas fa-check-circle"></i> Reviewed</span>
                                @else
                                    <button class="btn btn-sm btn-info text-light" data-bs-toggle="modal" data-bs-target="#reviewModal-{{ $request->id }}"><i class="fas fa-star"></i> Leave Review</button>
                                @endif
                            
                            @elseif($request->status == 'paid')
                                <span class="badge bg-warning text-dark">Paid</span>
                            
                            @elseif($request->status == 'reviewed')
                                <span class="badge bg-dark">
                                    <i class="fas fa-star"></i> Reviewed
                                </span>
                            
                            @else
                                <span class="badge bg-danger">Rejected</span>
                            @endif
                        </td>
                        <td>{{ $request->created_at->format('Y/m/d h:i A') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">
                            <i class="fas fa-inbox fa-3x mb-3 d-block text-secondary"></i>
                            No requests found yet.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>


@foreach($requests as $request)
    @if($request->status == 'completed' && !$request->review)
    <div class="modal fade" id="reviewModal-{{ $request->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">
                        <i class="fas fa-star"></i> Leave a Review for {{ $request->tutor->user->name }}
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 bg-light p-3 rounded">
                        <p class="mb-1"><strong><i class="fas fa-book"></i> Subject:</strong> {{ $request->subject->name  ?? 'N\A'}}</p>
                        <p class="mb-0"><strong><i class="fas fa-calendar"></i> Session Date:</strong> {{ \Carbon\Carbon::parse($request->proposed_datetime)->format('d M Y, h:i A') }}</p>
                    </div>
                    <hr>
                    <form action="{{ route('review.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="request_id" value="{{ $request->id }}">
                        
                        {{-- <div class="mb-4">
                            <label class="form-label fw-bold text-center d-block">
                                <i class="fas fa-star text-warning"></i> Rate Your Experience
                            </label>
                            <div class="star-rating">
                                @for($i = 5; $i >= 1; $i--)
                                <input type="radio" id="star-{{ $i }}-{{ $request->id }}" name="rating" value="{{ $i }}" {{ $i == 5 ? 'checked' : '' }} required>
                                <label for="star-{{ $i }}-{{ $request->id }}" class="star">★</label>
                                @endfor
                            </div>
                            <p class="text-center text-muted small">Click on the stars to rate</p>
                        </div> --}}

                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                <i class="fas fa-comment-dots"></i> Your Feedback
                            </label>
                            <textarea name="feedback" class="form-control" rows="4" placeholder="Share your experience with this tutor..." required></textarea>
                            <small class="text-muted">Minimum 10 characters</small>
                        </div>

                        <div class="text-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                <i class="fas fa-times"></i> Cancel
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-paper-plane"></i> Submit Review
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
@endforeach

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#datatablesSimple').DataTable({
            "order": [[ 5, "desc" ]], 
            "pageLength": 10,
            "language": {
                "emptyTable": "No requests available"
            }
        });
    });
</script>
@endsection