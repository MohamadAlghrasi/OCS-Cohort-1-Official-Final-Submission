@extends('layouts.home')
@section('title', 'Page Not Found')

@section('styles')
<style>
    .error-page {
        min-height: 70vh;
        display: flex;
        align-items: center;
        padding: 60px 0;
    }

    .error-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        padding: 50px 30px;
        text-align: center;
    }

    .error-code {
        font-size: 100px;
        font-weight: 800;
        color: #6f42c1;
        margin-bottom: 20px;
    }

    .error-title {
        font-size: 26px;
        font-weight: 600;
        color: #333;
        margin-bottom: 15px;
    }

    .error-text {
        color: #666;
        font-size: 16px;
        margin-bottom: 30px;
        line-height: 1.6;
    }

    .btn-purple {
        background-color: #6f42c1;
        border: none;
        color: white;
        padding: 12px 35px;
        font-size: 16px;
        border-radius: 8px;
        transition: all 0.3s;
    }

    .btn-purple:hover {
        background-color: #5a32a3;
        transform: translateY(-2px);
        color: white;
    }

    .btn-outline {
        border: 2px solid #6f42c1;
        background: transparent;
        color: #6f42c1;
        padding: 10px 30px;
        font-size: 16px;
        border-radius: 8px;
        margin-left: 10px;
        transition: all 0.3s;
    }

    .btn-outline:hover {
        background: #6f42c1;
        color: white;
    }

    @media (max-width: 768px) {
        .error-code {
            font-size: 70px;
        }
        
        .error-title {
            font-size: 22px;
        }
        
        .btn-outline {
            margin-left: 0;
            margin-top: 10px;
        }
    }
</style>
@endsection

@section('content')
<div class="error-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="error-card">
                    <div class="mb-4">
                        <i class="fas fa-exclamation-triangle" style="font-size: 60px; color: #ffc107;"></i>
                    </div>

                    <h1 class="error-code">404</h1>

                    <h2 class="error-title">Page Not Found</h2>

                    <p class="error-text">
                        Sorry, the page you are looking for does not exist or has been moved.
                    </p>

                    <div class="mt-4">
                        <a href="{{ route('home.index') }}" class="btn btn-purple">
                            <i class="fas fa-home"></i> Back to Home
                        </a>
                        <a href="javascript:history.back()" class="btn btn-outline">
                            <i class="fas fa-arrow-left"></i> Go Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection