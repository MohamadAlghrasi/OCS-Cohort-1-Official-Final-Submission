@extends('admin.layout.master')
@section('title', 'Contact Message Details')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Contact Message Details</h1>
        <div>
            <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary btn-sm">
                <i class="fas fa-arrow-left"></i> Back to Messages
            </a>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Left Column: Message Details -->
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Message Information</h6>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5 class="mb-3">Sender Details</h5>
                            <table class="table table-bordered">
                                <tr>
                                    <th width="40%">Name:</th>
                                    <td>{{ $contact->full_name }}</td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>{{ $contact->email }}</td>
                                </tr>
                                <tr>
                                    <th>Message ID:</th>
                                    <td>#{{ $contact->id }}</td>
                                </tr>
                                <tr>
                                    <th>Status:</th>
                                    <td>
                                        @if($contact->status == 'unread')
                                            <span class="badge badge-warning">Unread</span>
                                        @elseif($contact->status == 'read')
                                            <span class="badge badge-info">Read</span>
                                        @elseif($contact->status == 'replied')
                                            <span class="badge badge-success">Replied</span>
                                        @elseif($contact->status == 'closed')
                                            <span class="badge badge-secondary">Closed</span>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                        
                        <div class="col-md-6">
                            <h5 class="mb-3">Message Details</h5>
                            <table class="table table-bordered">
                                <tr>
                                    <th width="40%">Subject:</th>
                                    <td>{{ $contact->subject }}</td>
                                </tr>
                                <tr>
                                    <th>Date Sent:</th>
                                    <td>{{ $contact->created_at->format('M d, Y h:i A') }}</td>
                                </tr>
                                <tr>
                                    <th>Last Updated:</th>
                                    <td>{{ $contact->updated_at->format('M d, Y h:i A') }}</td>
                                </tr>
                                <tr>
                                    <th>Days Ago:</th>
                                    <td>{{ $contact->created_at->diffForHumans() }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <h5 class="mb-3">Message Content</h5>
                        <div class="card">
                            <div class="card-body">
                                <div style="white-space: pre-line;">{{ $contact->message }}</div>
                            </div>
                        </div>
                    </div>
                    
                    @if($contact->admin_notes)
                    <div class="mb-4">
                        <h5 class="mb-3">Admin Notes</h5>
                        <div class="alert alert-warning">
                            {{ $contact->admin_notes }}
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
                    <h6 class="m-0 font-weight-bold text-primary">Manage Message</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.contacts.update', $contact->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="status" class="form-label">Update Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="unread" {{ $contact->status == 'unread' ? 'selected' : '' }}>Unread</option>
                                <option value="read" {{ $contact->status == 'read' ? 'selected' : '' }}>Read</option>
                                <option value="replied" {{ $contact->status == 'replied' ? 'selected' : '' }}>Replied</option>
                                <option value="closed" {{ $contact->status == 'closed' ? 'selected' : '' }}>Closed</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="admin_notes" class="form-label">Admin Notes</label>
                            <textarea name="admin_notes" id="admin_notes" class="form-control" rows="4" placeholder="Add notes about this message...">{{ old('admin_notes', $contact->admin_notes) }}</textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fas fa-save"></i> Update Message
                        </button>
                    </form>
                    
                    <hr class="my-4">
                    
                    <div class="text-center">
                        <div class="mb-3">
                            <a href="mailto:{{ $contact->email }}?subject=Re: {{ $contact->subject }}" class="btn btn-info btn-block">
                                <i class="fas fa-reply"></i> Reply via Email
                            </a>
                        </div>
                        
                        <div class="mb-3">
                            <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-block" onclick="return confirm('Delete this message permanently?')">
                                    <i class="fas fa-trash"></i> Delete Message
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Quick Actions</h6>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-6 mb-3">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        From
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ $contact->first_name }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-6 mb-3">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Email
                                    </div>
                                    <div class="h6 mb-0 font-weight-bold text-gray-800" style="font-size: 0.9rem;">
                                        {{ Str::limit($contact->email, 15) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="alert alert-info mt-3">
                        <i class="fas fa-info-circle"></i>
                        <strong>Message Length:</strong> {{ strlen($contact->message) }} characters<br>
                        <strong>Subject:</strong> {{ $contact->subject }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection