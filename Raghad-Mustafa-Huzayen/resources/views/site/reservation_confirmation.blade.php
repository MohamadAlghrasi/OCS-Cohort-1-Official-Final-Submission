@extends('site.layout.master') {{-- Or whatever your site layout is --}}
@section('title', 'Reservation Confirmation')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header bg-success text-white">
                    <h3 class="mb-0"><i class="fas fa-check-circle"></i> Reservation Confirmed!</h3>
                </div>
                <div class="card-body">
                    <div class="alert alert-success">
                        <h4 class="alert-heading">Thank you for your reservation!</h4>
                        <p>Your booking has been submitted successfully. We will contact you shortly to confirm the details.</p>
                    </div>

                    <div class="reservation-details">
                        <h5 class="mb-3">Reservation Details:</h5>
                        <table class="table table-bordered">
                            <tr>
                                <th width="30%">Reservation ID:</th>
                                <td>#{{ $booking->id }}</td>
                            </tr>
                            <tr>
                                <th>Name:</th>
                                <td>{{ $booking->reserved_by_name }}</td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td>{{ $booking->email }}</td>
                            </tr>
                            <tr>
                                <th>Phone:</th>
                                <td>{{ $booking->phone }}</td>
                            </tr>
                            <tr>
                                <th>Number of Players:</th>
                                <td>{{ $booking->number_of_players }}</td>
                            </tr>
                            <tr>
                                <th>Payment Method:</th>
                                <td>{{ ucfirst($booking->payment_method) }}</td>
                            </tr>
                            <tr>
                                <th>Status:</th>
                                <td>
                                    <span class="badge badge-{{ $booking->status == 'confirmed' ? 'success' : 'warning' }}">
                                        {{ ucfirst($booking->status) }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th>Date Submitted:</th>
                                <td>{{ $booking->created_at->format('M d, Y h:i A') }}</td>
                            </tr>
                        </table>
                    </div>

                    @if($booking->special_requests)
                    <div class="special-requests mt-4">
                        <h5>Special Requests:</h5>
                        <div class="alert alert-info">
                            {{ $booking->special_requests }}
                        </div>
                    </div>
                    @endif

                    <div class="mt-4">
                        <a href="{{ route('games.index') }}" class="btn btn-primary">
                            <i class="fas fa-calendar"></i> View More Games
                        </a>
                        <a href="{{ route('index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-home"></i> Back to Home
                        </a>
                    </div>

                    <div class="mt-4 p-3 bg-light rounded">
                        <h6><i class="fas fa-info-circle"></i> What's Next?</h6>
                        <ul class="mb-0">
                            <li>You will receive a confirmation email shortly</li>
                            <li>Our team will contact you within 24 hours to finalize details</li>
                            <li>Please arrive 15 minutes before the game time</li>
                            <li>Make sure to bring comfortable sports clothing</li>
                        </ul>
                    </div>
                </div>
                <div class="card-footer text-muted text-center">
                    Need help? Contact us at <strong>info@yalladodge.com</strong> or call <strong>+962 7 0000 0000</strong>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection