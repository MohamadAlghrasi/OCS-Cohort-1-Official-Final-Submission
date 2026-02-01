@extends('admin.layout.master')
@section('title', 'Add Game')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add New Game</h1>
        <a href="{{ route('admin.games.index') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Back to Games
        </a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Game Information</h6>
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

                    <form action="{{ route('admin.games.store') }}" method="POST">
                        @csrf
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="type">Game Type *</label>
                                <select name="type" id="type" class="form-control" required>
                                    <option value="">Select Game Type</option>
                                    <option value="weekly" {{ old('type') == 'weekly' ? 'selected' : '' }}>Weekly Game</option>
                                    <option value="tournament" {{ old('type') == 'tournament' ? 'selected' : '' }}>Tournament</option>
                                    <option value="friendly" {{ old('type') == 'friendly' ? 'selected' : '' }}>Friendly Match</option>
                                    <option value="training" {{ old('type') == 'training' ? 'selected' : '' }}>Training Session</option>
                                </select>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="status">Status *</label>
                                <select name="status" id="status" class="form-control" required>
                                    <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="confirmed" {{ old('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                    <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="date">Date *</label>
                                <input type="date" class="form-control" name="date" id="date" required 
                                       min="{{ date('Y-m-d') }}" 
                                       value="{{ old('date') }}">
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="time">Time *</label>
                                <input type="time" class="form-control" name="time" id="time" required
                                       value="{{ old('time') }}">
                            </div>
                        </div>

                        <!-- LOCATION FIELD ADDED HERE -->
                        <div class="form-group">
                            <label for="location">Location *</label>
                            <select name="location" id="location" class="form-control" required>
                                <option value="">Select Location</option>
                                <option value="International Academy Amman" {{ old('location') == 'International Academy Amman' ? 'selected' : '' }}>
                                    International Academy Amman
                                </option>
                                <option value="Islamic Educational College" {{ old('location') == 'Islamic Educational College' ? 'selected' : '' }}>
                                    Islamic Educational College
                                </option>
                                <option value="other" {{ old('location') == 'other' ? 'selected' : '' }}>Other (specify in description)</option>
                            </select>
                            <small class="form-text text-muted">Select from our available venues</small>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="max_players">Maximum Players *</label>
                                <input type="number" class="form-control" name="max_players" id="max_players" 
                                       required min="4" max="50" value="{{ old('max_players', 20) }}">
                                <small class="form-text text-muted">Recommended: 10-30 players</small>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="price">Price per Player (JOD)</label>
                                <input type="number" step="0.01" class="form-control" name="price" id="price"
                                       value="{{ old('price', 5) }}">
                                <small class="form-text text-muted">Leave empty for free games</small>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description">Description (Optional)</label>
                            <textarea class="form-control" name="description" id="description" rows="3" 
                                      placeholder="E.g., Beginner-friendly session, tournament qualifier, etc.">{{ old('description') }}</textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Add Game
                            </button>
                            <a href="{{ route('admin.games.index') }}" class="btn btn-secondary">Cancel</a>
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
                        <h6><i class="fas fa-info-circle"></i> Game Setup Tips:</h6>
                        <ul class="mb-0">
                            <li><strong>International Academy Amman:</strong> Indoor court, capacity 30 players</li>
                            <li><strong>Islamic Educational College:</strong> Outdoor court, capacity 40 players</li>
                            <li>Weekly games typically have 20-30 players</li>
                            <li>Set status to "confirmed" once venue is booked</li>
                            <li>Set minimum 1 week ahead for better registration</li>
                        </ul>
                    </div>
                    
                    <div class="alert alert-warning">
                        <h6><i class="fas fa-exclamation-triangle"></i> Reminder:</h6>
                        <p class="mb-0">After creating a game, it will automatically appear on the Weekly Games page for users to register.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection