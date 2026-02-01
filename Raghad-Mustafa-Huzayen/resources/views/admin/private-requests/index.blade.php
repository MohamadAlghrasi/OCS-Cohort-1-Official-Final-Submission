@extends('admin.layout.master')
@section('title', 'Private Game Requests')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Private Game Requests</h1>
        <div>
            <span class="mr-3">Total: {{ $requests->count() }}</span>
            <span class="badge badge-warning">Pending: {{ $requests->where('status', 'pending')->count() }}</span>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">All Private Game Requests</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                            <i class="fas fa-filter fa-sm fa-fw text-gray-400"></i> Filter
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in">
                            <a class="dropdown-item" href="{{ route('admin.private-requests.index') }}">All Requests</a>
                            <a class="dropdown-item" href="{{ route('admin.private-requests.index') }}?status=pending">Pending</a>
                            <a class="dropdown-item" href="{{ route('admin.private-requests.index') }}?status=confirmed">Confirmed</a>
                            <a class="dropdown-item" href="{{ route('admin.private-requests.index') }}?status=cancelled">Cancelled</a>
                            <a class="dropdown-item" href="{{ route('admin.private-requests.index') }}?status=completed">Completed</a>
                        </div>
                    </div>
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
                                    <th>ID</th>
                                    <th>Contact Person</th>
                                    <th>Game Details</th>
                                    <th>Venue & Duration</th>
                                    <th>Players</th>
                                    <th>Status</th>
                                    <th>Request Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($requests as $request)
                                <tr>
                                    <td>{{ $request->id }}</td>
                                    <td>
                                        <strong>{{ $request->contact_name }}</strong><br>
                                        <small>{{ $request->email }}</small><br>
                                        <small>{{ $request->phone }}</small>
                                    </td>
                                    <td>
                                        <strong>{{ $request->preferred_date->format('M d, Y') }}</strong><br>
                                        <small>{{ $request->preferred_time }}</small><br>
                                        <small class="text-muted">{{ $request->skill_level }} level</small>
                                    </td>
                                    <td>
                                        {{ $request->venue }}<br>
                                        <small>{{ $request->duration }} hours</small>
                                    </td>
                                    <td>
                                        {{ $request->total_players }} players
                                        @if($request->player_names)
                                            <br><small class="text-muted" title="{{ $request->player_names }}">
                                                {{ Str::limit($request->player_names, 30) }}
                                            </small>
                                        @endif
                                    </td>
                                    <td>
                                        @if($request->status == 'confirmed')
                                            <span class="badge badge-success">Confirmed</span>
                                        @elseif($request->status == 'pending')
                                            <span class="badge badge-warning">Pending</span>
                                        @elseif($request->status == 'cancelled')
                                            <span class="badge badge-danger">Cancelled</span>
                                        @elseif($request->status == 'completed')
                                            <span class="badge badge-info">Completed</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $request->created_at->format('M d, Y') }}<br>
                                        <small>{{ $request->created_at->format('h:i A') }}</small>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <form action="{{ route('admin.private-requests.destroy', $request->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Delete this request?')">
                                                    <i class="fas fa-trash">Delete</i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center">No private game requests found.</td>
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
@endsection