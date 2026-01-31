@extends('site.layout.master')

@section('title', 'Reservation Confirmation')

@section('content')
<div class="site-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Success Card -->
                <div class="confirmation-card text-center">
                    <div class="confirmation-icon mb-4">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    
                    <h1 class="mb-3">Reservation Confirmed!</h1>
                    <p class="lead mb-4">Thank you for reserving spots with Yalla Dodge. Your game details are below.</p>
                    
                    <!-- Reservation Details -->
                    <div class="reservation-details-card mb-5">
                        <h3 class="mb-4">Reservation Details</h3>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <strong>Reservation ID:</strong>
                                <div class="detail-value">#{{ str_pad($reservation->id, 6, '0', STR_PAD_LEFT) }}</div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Status:</strong>
                                <div class="detail-value">
                                    <span class="badge bg-success">Confirmed</span>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Game Day:</strong>
                                <div class="detail-value">{{ $reservation->weeklyGame->day }}</div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Time:</strong>
                                <div class="detail-value">
                                    {{ \Carbon\Carbon::parse($reservation->weeklyGame->time)->format('g:i A') }}
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Location:</strong>
                                <div class="detail-value">{{ $reservation->weeklyGame->location }}</div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Number of Players:</strong>
                                <div class="detail-value">{{ $reservation->number_of_players }}</div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Contact Person:</strong>
                                <div class="detail-value">{{ $reservation->reserved_by_name }}</div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Payment Method:</strong>
                                <div class="detail-value text-capitalize">{{ $reservation->payment_method }}</div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Important Information -->
                    <div class="alert alert-info mb-5">
                        <h4 class="alert-heading mb-3"><i class="fas fa-info-circle me-2"></i>Important Information</h4>
                        <ul class="mb-0">
                            <li>Please arrive <strong>15 minutes early</strong> for check-in</li>
                            <li>Bring valid ID and wear appropriate athletic attire</li>
                            <li>Payment will be collected at the venue before the game</li>
                            <li>For cancellations, contact us at least 24 hours in advance</li>
                        </ul>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="action-buttons">
                        <a href="{{ route('weekly-games') }}" class="btn btn-outline-primary me-3">
                            <i class="fas fa-calendar-alt me-2"></i>View More Games
                        </a>
                        <a href="mailto:support@yalladodge.com" class="btn btn-outline-secondary">
                            <i class="fas fa-envelope me-2"></i>Contact Support
                        </a>
                    </div>
                    
                    <!-- Confirmation Email -->
                    <div class="mt-5">
                        <p class="text-muted">
                            <i class="fas fa-envelope me-1"></i>
                            A confirmation email has been sent to <strong>{{ $reservation->email }}</strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection