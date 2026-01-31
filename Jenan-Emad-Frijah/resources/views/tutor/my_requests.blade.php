@extends('layouts.tutor')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">My Tutoring Requests</h2>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        @forelse($requests as $req)
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">{{ $req->subject->name ?? 'Deleted Subject' }}</h5>
                    <hr>
                    <p class="mb-2"><strong>Student:</strong> {{ $req->student->name }}</p>
                    <p class="mb-2"><strong>Email:</strong> {{ $req->student->email }}</p>
                    <p class="mb-2"><strong>Location:</strong> {{ $req->student->location }}</p>
                    <p class="mb-2"><strong>Proposed Date:</strong> {{ \Carbon\Carbon::parse($req->proposed_datetime)->format('d M Y, h:i A') }}</p>
                    <p class="mb-2"><strong>Notes:</strong> {{ $req->notes ?? 'No additional notes' }}</p>
                    <p class="mb-3">
                        <strong>Status:</strong>
                        <td>
                        @if($req->status == 'paid')
                        <span class="badge bg-warning text-light">Paid</span>
                        <form method="POST" action="{{ route('tutor.request.completed', $req->id) }}" class="mb-1">
                        @csrf
                        <button class="btn btn-sm btn-primary text-light">Mark as Completed</button>
                        </form>
                        @elseif($req->status == 'pending')
                        <span class="badge bg-secondary text-light">Pending</span>
                        @elseif($req->status == 'accepted')
                        <span class="badge bg-success text-light">Accepted</span>
                        @elseif($req->status == 'completed')
                       <span class="badge bg-info text-light">Completed</span>
                       @elseif(($req->status == 'reviewed'))
                        <span class="badge bg-dark text-light">Reviewed</span>
                       @else 
                        <span class="badge bg-danger text-light">Rejected</span>
                        @endif
</td>


                    </p>

                    @if($req->status == 'pending')
                    <div class="d-flex gap-2">
                        <form action="{{ route('tutor.requests.approve', $req->id) }}" method="POST" class="flex-fill">
                            @csrf
                            <button type="submit" class="btn btn-success w-100">
                                <i class="bi bi-check-circle"></i> Approve
                            </button>
                        </form>
                        <form action="{{ route('tutor.requests.deny', $req->id) }}" method="POST" class="flex-fill">
                            @csrf
                            <button type="submit" class="btn btn-danger w-100">
                                <i class="bi bi-x-circle"></i> Deny
                            </button>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info text-center">
                <i class="bi bi-info-circle"></i> No requests found yet.
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection