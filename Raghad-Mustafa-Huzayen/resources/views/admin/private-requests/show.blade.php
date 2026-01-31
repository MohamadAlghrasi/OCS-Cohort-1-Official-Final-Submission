@extends('admin.layout.master')
@section('title', 'Private Game Request Details')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Private Game Request Details</h1>
        <div>
            <a href="{{ route('admin.private-requests.index') }}" class="btn btn-secondary btn-sm">
                <i class="fas fa-arrow-left"></i> Back to Requests
            </a>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Left Column: Request Details -->
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Request Information</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="mb-3">Contact Details</h5>
                            <table class="table table-bordered">
                                <tr>
                                    <th width="40%">Name:</th>
                                    <td>{{ $request->contact_name }}</td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>{{ $request->email }}</td>
                                </tr>
                                <tr>
                                    <th>Phone:</th>
                                    <td>{{ $request->phone }}</td>
                                </tr>
                                <tr>
                                    <th>Request ID:</th>
                                    <td>#{{ $request->id }}</td>
                                </tr>
                                <tr>
                                    <th>Status:</th>
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
                                </tr>
                            </table>
                        </div>
                        
                        <div class="col-md-6">
                            <h5 class="mb-3">Game Details</h5>
                            <table class="table table-bordered">
                                <tr>
                                    <th width="40%">Preferred Date:</th>
                                    <td>{{ $request->preferred_date->format('M d, Y') }}</td>
                                </tr>
                                <tr>
                                    <th>Preferred Time:</th>
                                    <td>{{ $request->preferred_time }}</td>
                                </tr>
                                <tr>
                                    <th>Venue:</th>
                                    <td>{{ $request->venue }}</td>
                                </tr>
                                <tr>
                                    <th>Duration:</th>
                                    <td>{{ $request->duration }} hours</td>
                                </tr>
                                <tr>
                                    <th>Skill Level:</th>
                                    <td>{{ ucfirst($request->skill_level) }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <h5 class="mb-3">Player Information</h5>
                            <table class="table table-bordered">
                                <tr>
                                    <th width="40%">Total Players:</th>
                                    <td>{{ $request->total_players }}</td>
                                </tr>
                                @if($request->player_names)
                                <tr>
                                    <th>Player Names:</th>
                                    <td>
                                        <div style="max-height: 100px; overflow-y: auto;">
                                            {{ $request->player_names }}
                                        </div>
                                    </td>
                                </tr>
                                @endif
                            </table>
                        </div>
                        
                        <div class="col-md-6">
                            <h5 class="mb-3">Timestamps</h5>
                            <table class="table table-bordered">
                                <tr>
                                    <th width="40%">Request Created:</th>
                                    <td>{{ $request->created_at->format('M d, Y h:i A') }}</td>
                                </tr>
                                <tr>
                                    <th>Last Updated:</th>
                                    <td>{{ $request->updated_at->format('M d, Y h:i A') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    
                    @if($request->additional_info)
                    <div class="mt-4">
                        <h5 class="mb-3">Additional Information</h5>
                        <div class="alert alert-info">
                            {{ $request->additional_info }}
                        </div>
                    </div>
                    @endif
                    
                    @if($request->admin_notes)
                    <div class="mt-4">
                        <h5 class="mb-3">Admin Notes</h5>
                        <div class="alert alert-warning">
                            {{ $request->admin_notes }}
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        
        <!-- Right Column: Quick Actions -->
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Manage Request</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.private-requests.update', $request->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="status" class="form-label">Update Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="pending" {{ $request->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="confirmed" {{ $request->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                <option value="cancelled" {{ $request->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                <option value="completed" {{ $request->status == 'completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="admin_notes" class="form-label">Admin Notes</label>
                            <textarea name="admin_notes" id="admin_notes" class="form-control" rows="4" placeholder="Add notes about this request...">{{ old('admin_notes', $request->admin_notes) }}</textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fas fa-save"></i> Update Request
                        </button>
                    </form>
                    
                    <hr class="my-4">
                    
                    <div class="text-center">
                        <div class="mb-3">
                            <a href="mailto:{{ $request->email }}" class="btn btn-info btn-block">
                                <i class="fas fa-envelope"></i> Email Contact
                            </a>
                        </div>
                        
                        <div class="mb-3">
                            <a href="tel:{{ $request->phone }}" class="btn btn-warning btn-block">
                                <i class="fas fa-phone"></i> Call Contact
                            </a>
                        </div>
                        
                        <div class="mb-3">
                            <form action="{{ route('admin.private-requests.destroy', $request->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-block" onclick="return confirm('Delete this request permanently?')">
                                    <i class="fas fa-trash"></i> Delete Request
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Quick Stats</h6>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-6 mb-3">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Players
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ $request->total_players }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-6 mb-3">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Duration
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ $request->duration }}h
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i>
                        <strong>Venue:</strong> {{ $request->venue }}<br>
                        <strong>Skill Level:</strong> {{ ucfirst($request->skill_level) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection