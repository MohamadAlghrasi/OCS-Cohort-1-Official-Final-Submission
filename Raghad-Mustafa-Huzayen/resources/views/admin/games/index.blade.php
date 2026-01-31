@extends('admin.layout.master')
@section('title', 'Manage Games')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage Games</h1>
        <a href="{{ route('admin.games.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Add New Game
        </a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">All Games</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('admin.games.create') }}">Add New Game</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Export Games</a>
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
                                    <th>Date & Time</th>
                                    <th>Type</th>
                                    <th>Location</th>
                                    <th>Players</th>
                                    <th>Status</th>
                                    <th>Price</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($games as $game)
                                <tr>
                                    <td>{{ $game->id }}</td>
                                    <td>
                                        {{ $game->date->format('M d, Y') }}<br>
                                        <small>{{ $game->time }}</small>
                                    </td>
                                    <td>
                                        @if($game->type == 'weekly')
                                            <span class="badge badge-primary">Weekly</span>
                                        @elseif($game->type == 'tournament')
                                            <span class="badge badge-success">Tournament</span>
                                        @elseif($game->type == 'private')
                                            <span class="badge badge-info">Private</span>
                                        @else
                                            <span class="badge badge-secondary">{{ $game->type }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $game->location ?? 'Not set' }}</td>
                                    <td>
                                        <div class="progress" style="height: 20px;">
                                            @php
                                                $percentage = ($game->registered_players / $game->max_players) * 100;
                                                $color = $percentage >= 80 ? 'bg-success' : ($percentage >= 50 ? 'bg-warning' : 'bg-info');
                                            @endphp
                                            <div class="progress-bar {{ $color }}" role="progressbar" style="width: {{ $percentage }}%;" 
                                                 aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100">
                                                {{ $game->registered_players }}/{{ $game->max_players }}
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if($game->status == 'confirmed')
                                            <span class="badge badge-success">Confirmed</span>
                                        @elseif($game->status == 'pending')
                                            <span class="badge badge-warning">Pending</span>
                                        @elseif($game->status == 'cancelled')
                                            <span class="badge badge-danger">Cancelled</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($game->price)
                                            JOD {{ number_format($game->price, 2) }}
                                        @else
                                            <span class="text-muted">Free</span>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.games.destroy', $game->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this game?')">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center">No games found. <a href="{{ route('admin.games.create') }}">Add your first game</a></td>
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

@push('scripts')
<!-- Page level plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "order": [[1, "asc"]], // Sort by date (column index 1) ascending
            "columnDefs": [
                {
                    "targets": [7], // Actions column (8th column)
                    "orderable": false,
                    "searchable": false
                }
            ]
        });
    });
</script>
@endpush