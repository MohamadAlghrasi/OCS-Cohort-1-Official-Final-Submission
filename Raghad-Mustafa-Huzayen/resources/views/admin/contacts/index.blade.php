@extends('admin.layout.master')
@section('title', 'Contact Messages')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Contact Messages</h1>
        <div>
            <span class="mr-3">Total: {{ $contacts->count() }}</span>
            <span class="badge badge-warning">Unread: {{ $contacts->where('status', 'unread')->count() }}</span>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">All Contact Messages</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                            <i class="fas fa-filter fa-sm fa-fw text-gray-400"></i> Filter
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in">
                            <a class="dropdown-item" href="{{ route('admin.contacts.index') }}">All Messages</a>
                            <a class="dropdown-item" href="{{ route('admin.contacts.index') }}?status=unread">Unread</a>
                            <a class="dropdown-item" href="{{ route('admin.contacts.index') }}?status=read">Read</a>
                            <a class="dropdown-item" href="{{ route('admin.contacts.index') }}?status=replied">Replied</a>
                            <a class="dropdown-item" href="{{ route('admin.contacts.index') }}?status=closed">Closed</a>
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
                                    <th>From</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($contacts as $contact)
                                <tr class="{{ $contact->status == 'unread' ? 'table-warning' : '' }}">
                                    <td>{{ $contact->id }}</td>
                                    <td>
                                        <strong>{{ $contact->full_name }}</strong><br>
                                        <small>{{ $contact->email }}</small>
                                    </td>
                                    <td>{{ $contact->subject }}</td>
                                    <td>
                                        <div class="message-preview">
                                            {{ Str::limit($contact->message, 100) }}
                                        </div>
                                    </td>
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
                                    <td>
                                        {{ $contact->created_at->format('M d, Y') }}<br>
                                        <small>{{ $contact->created_at->format('h:i A') }}</small>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.contacts.show', $contact->id) }}" class="btn btn-sm btn-info" title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Delete this message?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">No contact messages found.</td>
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

<style>
.message-preview {
    max-height: 60px;
    overflow: hidden;
    text-overflow: ellipsis;
}
.table-warning {
    background-color: #fff3cd !important;
}
</style>
@endsection