@extends('layouts.home')
@section('title','Login')
@section('styles')
 <style>
    body{
        color: #000;
        overflow-x: hidden;
        height: 100%;
        background-repeat: no-repeat;
        background-size: 100% 100%;
        background-color: #4C1D95 !important;
    }
    .card{
    padding: 50px 50px;
    margin-top: 60px;
    margin-bottom: 60px;
    border: none !important;
    box-shadow: 0 6px 12px 0 rgba(0,0,0,0.2) ;
    background-color: rgba(255, 255, 255, 0.9); 
}

   
    .form-control-label{
        margin-bottom: 0;
    }
    input, textarea{
        padding: 8px 15px;
        border-radius: 5px !important;
        margin: 5px 0px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        font-size: 18px !important;
        font-weight: 300;
    }
    input:focus, textarea:focus{
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        border: 1px solid #00BCD4;
        outline-width: 0;
        font-weight: 400;
    }

.btn-purple {
  background-color: #6f42c1 !important;
  border-color: #6f42c1 !important;
  color: #fff !important;
  width: 100%;
}

.btn-purple:hover {
  background-color: #5a32a3 !important;
  border-color: #5a32a3 !important;
  color: #fff;
}

.main-text{
    color:white;
    font-family:Arial, Helvetica, sans-serif;
    margin-top: 1%;
}

.footer {
  color: var(--accent-color);
  background-color: var(--background-color);
  font-size: 14px;
  padding-bottom: 50px;
  position: relative;
}

.footer .footer-top {
  padding-top: 50px;
}

.footer .footer-about .logo {
  margin-bottom: 0;
}

.footer .footer-about .logo img {
  max-height: 40px;
  margin-right: 6px;
}

.footer .footer-about .logo span {
  font-size: 26px;
  font-weight: 700;
  letter-spacing: 1px;
  font-family: var(--heading-font);
  color: var(--accent-color);
}

.footer .footer-about p {
  font-size: 14px;
  font-family: var(--heading-font);
}

.footer .social-links a {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  border: 1px solid color-mix(in srgb, var(--accent-color), transparent 50%);
  font-size: 16px;
  color: color-mix(in srgb, var(--accent-color), transparent 30%);
  margin-right: 10px;
  transition: 0.3s;
}

.footer .social-links a:hover {
  color: var(--accent-color);
  border-color: var(--accent-color);
}

.footer h4 {
  font-size: 16px;
  font-weight: bold;
  position: relative;
  padding-bottom: 12px;
  color: color-mix(in srgb, var(--accent-color), transparent 30%);
}

.footer .footer-links {
  margin-bottom: 30px;
}

.footer .footer-links ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

.footer .footer-links ul i {
  padding-right: 2px;
  font-size: 12px;
  line-height: 0;
}

.footer .footer-links ul li {
  padding: 10px 0;
  display: flex;
  align-items: center;
}

.footer .footer-links ul li:first-child {
  padding-top: 0;
}

.footer .footer-links ul a {
  color: color-mix(in srgb, var(--accent-color), transparent 30%);
  display: inline-block;
  line-height: 1;
}

.footer .footer-links ul a:hover {
  color: var(--default-color);
  text-decoration: none;
}

.footer .footer-contact p {
  margin-bottom: 5px;
}

.footer .copyright {
  padding-top: 25px;
  padding-bottom: 25px;
  background-color: color-mix(in srgb, var(--accent-color), transparent 95%);
}

.footer .copyright p {
  margin-bottom: 0;
}

.footer .credits  a{
  margin-top: 6px;
  font-size: 13px;
color: var(--accent-color) ;
}

.register-link{
    color:#4C1D95
}

.register-link:hover{
    color:#6631b6;

}
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

@endsection

@section('content')
<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="col-xl-5 col-lg-6 col-md-8 col-11">
        <h1 class="main-text text-center">Welcome Back!</h1>
        <p class="text-white text-center mb-4">Sign in to continue your journey with us!</p>
        <div class="card">
          @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

            <form method="POST" action="{{ route('login') }}" class="form-card text-left">
             @csrf
              @if(request()->has('redirect'))
        <input type="hidden" name="redirect" value="{{ request()->get('redirect') }}">
    @endif
            <div class="form-group mb-3">
    <label for="email">Email </label>
    <input type="email" name="email" value="{{ old('email') }}" required autofocus class="form-control" id="email" placeholder="Enter your email">
</div>

<div class="form-group mb-3">
    <label for="password">Password </label>
    <input type="password" name="password" required class="form-control" id="password" placeholder="Enter your password">
</div>


<button type="submit" class="btn btn-purple w-100">Login</button>
 <div class="text-center mt-3">
        <p class="mb-0 text-muted">
            Do not have an account?
            <a href="{{ route('user.register_student') }}" class="register-link">Register Now</a>
        </p>
    </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script  src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
@endsection

