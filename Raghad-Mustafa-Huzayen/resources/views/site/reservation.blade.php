@extends('site.layout.master')

@section('title', 'Reserve Your Spot - ' . $game->day . ' Game')

@section('content')
<div class="site-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Reservation Header -->
                <div class="text-center mb-5">
                    <h1 class="mb-3">Reserve Your Spot</h1>
                    <div class="game-info-card mb-4">
                        <h3 class="mb-2">{{ $game->day }} Dodgeball Game</h3>
                        <p class="mb-1"><i class="fas fa-map-marker-alt me-2"></i> {{ $game->location }}</p>
                        <p class="mb-1"><i class="fas fa-clock me-2"></i> 
                            {{ \Carbon\Carbon::parse($game->time)->format('g:i A') }} - 
                            {{ \Carbon\Carbon::parse($game->time)->addHours(2)->format('g:i A') }}
                        </p>
                        <p class="mb-0"><i class="fas fa-users me-2"></i> 
                            Available Spots: <strong>{{ $availableSpots }}</strong>
                        </p>
                    </div>
                </div>

                <!-- Reservation Form -->
                <div class="reservation-form-card">
                    <form action="{{ route('reservation.store', $game->id) }}" method="POST" id="reservationForm">
                        @csrf

                        <!-- Primary Contact Information -->
                        <div class="form-section mb-5">
                            <h3 class="section-title mb-4">
                                <i class="fas fa-user-circle me-2"></i>Primary Contact Information
                            </h3>
                            
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="reserved_by_name" class="form-label">
                                        <strong>Full Name *</strong>
                                        <span class="form-subtext">The primary contact for this reservation</span>
                                    </label>
                                    <input type="text" class="form-control" id="reserved_by_name" name="reserved_by_name" 
                                           required placeholder="Enter your full name">
                                </div>
                                
                                <div class="col-md-6 mb-4">
                                    <label for="email" class="form-label">
                                        <strong>Email Address *</strong>
                                        <span class="form-subtext">Confirmation will be sent to this email</span>
                                    </label>
                                    <input type="email" class="form-control" id="email" name="email" 
                                           required placeholder="your.email@example.com">
                                </div>
                                
                                <div class="col-md-6 mb-4">
                                    <label for="phone" class="form-label">
                                        <strong>Phone Number *</strong>
                                        <span class="form-subtext">For urgent updates and confirmations</span>
                                    </label>
                                    <input type="tel" class="form-control" id="phone" name="phone" 
                                           required placeholder="+962 7X XXX XXXX">
                                </div>
                                
                                <div class="col-md-6 mb-4">
                                    <label for="number_of_players" class="form-label">
                                        <strong>Number of Players *</strong>
                                        <span class="form-subtext">Maximum {{ $availableSpots }} spots available</span>
                                    </label>
                                    <select class="form-select" id="number_of_players" name="number_of_players" required>
                                        <option value="">Select number of players</option>
                                        @for($i = 1; $i <= min($availableSpots, 10); $i++)
                                        <option value="{{ $i }}">{{ $i }} player{{ $i > 1 ? 's' : '' }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Player Names (Dynamic Section) -->
                        <div class="form-section mb-5" id="playerNamesSection" style="display: none;">
                            <h3 class="section-title mb-4">
                                <i class="fas fa-users me-2"></i>Player Names
                                <small class="text-muted">(Optional but recommended)</small>
                            </h3>
                            <p class="form-guide mb-4">Please provide the names of all players for our attendance records.</p>
                            
                            <div id="playerNamesContainer">
                                <!-- Player names will be added here dynamically -->
                            </div>
                        </div>

                        <!-- Payment Method -->
                        <div class="form-section mb-5">
                            <h3 class="section-title mb-4">
                                <i class="fas fa-credit-card me-2"></i>Payment Method
                            </h3>
                            <p class="form-guide mb-4">Select your preferred payment method. Payment will be collected at the venue.</p>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="payment-option-card">
                                        <input type="radio" id="cash" name="payment_method" value="cash" class="payment-radio" checked>
                                        <label for="cash" class="payment-label">
                                            <div class="payment-icon">
                                                <i class="fas fa-money-bill-wave fa-2x"></i>
                                            </div>
                                            <div class="payment-details">
                                                <h5>Cash Payment</h5>
                                                <p>Pay at the venue before the game starts</p>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="payment-option-card">
                                        <input type="radio" id="clique" name="payment_method" value="clique" class="payment-radio">
                                        <label for="clique" class="payment-label">
                                            <div class="payment-icon">
                                                <i class="fas fa-mobile-alt fa-2x"></i>
                                            </div>
                                            <div class="payment-details">
                                                <h5>Clique Payment</h5>
                                                <p>Pay via Clique app before the game</p>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Special Requests -->
                        <div class="form-section mb-5">
                            <h3 class="section-title mb-4">
                                <i class="fas fa-comment-dots me-2"></i>Additional Information
                            </h3>
                            <div class="mb-4">
                                <label for="special_requests" class="form-label">
                                    <strong>Special Requests or Notes</strong>
                                    <span class="form-subtext">Any accessibility needs, team preferences, or other requirements</span>
                                </label>
                                <textarea class="form-control" id="special_requests" name="special_requests" 
                                          rows="4" placeholder="Please let us know if you have any special requirements..."></textarea>
                            </div>
                        </div>

                        <!-- Terms & Conditions -->
                        <div class="form-section mb-5">
                            <div class="terms-card">
                                <h5 class="mb-3"><i class="fas fa-file-contract me-2"></i>Terms & Conditions</h5>
                                <div class="terms-content">
                                    <ul>
                                        <li>Reservations are subject to availability</li>
                                        <li>Cancellations must be made at least 24 hours before the game for a full refund</li>
                                        <li>No-shows will be charged the full amount</li>
                                        <li>All players must sign a waiver before participating</li>
                                        <li>Proper athletic attire and indoor shoes are required</li>
                                    </ul>
                                </div>
                                <div class="form-check mt-3">
                                    <input class="form-check-input" type="checkbox" id="terms" required>
                                    <label class="form-check-label" for="terms">
                                        I agree to the terms and conditions and understand the cancellation policy
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg px-5 py-3">
                                <i class="fas fa-calendar-check me-2"></i>Confirm Reservation
                            </button>
                            <p class="text-muted mt-3 small">
                                <i class="fas fa-shield-alt me-1"></i> Your information is secure and will not be shared with third parties
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript for Dynamic Player Names -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const playerCountSelect = document.getElementById('number_of_players');
    const playerNamesSection = document.getElementById('playerNamesSection');
    const playerNamesContainer = document.getElementById('playerNamesContainer');
    
    // Function to create player name fields
    function createPlayerFields(count) {
        playerNamesContainer.innerHTML = '';
        
        if (count > 0) {
            playerNamesSection.style.display = 'block';
            
            for (let i = 1; i <= count; i++) {
                const fieldHTML = `
                    <div class="row mb-3 player-name-field">
                        <div class="col-md-8">
                            <label class="form-label">
                                Player ${i} Name
                                ${i === 1 ? '<span class="text-muted">(Primary contact is Player 1)</span>' : ''}
                            </label>
                            <input type="text" class="form-control" name="player_names[]" 
                                   placeholder="Enter full name of player ${i}">
                        </div>
                    </div>
                `;
                playerNamesContainer.insertAdjacentHTML('beforeend', fieldHTML);
            }
        } else {
            playerNamesSection.style.display = 'none';
        }
    }
    
    // Initial setup
    const initialCount = parseInt(playerCountSelect.value) || 0;
    createPlayerFields(initialCount);
    
    // Update on change
    playerCountSelect.addEventListener('change', function() {
        const count = parseInt(this.value) || 0;
        createPlayerFields(count);
    });
    
    // Form validation
    document.getElementById('reservationForm').addEventListener('submit', function(e) {
        const termsChecked = document.getElementById('terms').checked;
        if (!termsChecked) {
            e.preventDefault();
            alert('Please agree to the terms and conditions');
            document.getElementById('terms').focus();
        }
    });
});
</script>
</div>



@endsection