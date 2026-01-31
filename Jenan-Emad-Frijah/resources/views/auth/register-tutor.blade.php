
@extends('layouts.home')
@section('content')
@section('title','Sign Up')
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
    padding: 30px 40px;
    margin-top: 60px;
    margin-bottom: 60px;
    border: none !important;
    box-shadow: 0 6px 12px 0 rgba(0,0,0,0.2) ;
    background-color: rgba(255, 255, 255, 0.9); 
}

    .blue-text{
        color: #00BCD4
    }
    .form-control-label{
        margin-bottom: 0
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
        font-weight: 400
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

    <div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <h1 class="main-text">Become Part of Our Community!</h1>
            <p class="text-white mb-4">Sign up now and start your journey with us!</p>
            <div class="card">
                <h5 class="text-center mb-4"></h5>
                @if ($errors->any())
              <div class="alert alert-danger">
             <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
           </ul>
          </div>
          @endif

               <form method="POST" action="{{ route('user.register_tutor') }}" enctype="multipart/form-data" >
                 @csrf
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Full Name</label> <input type="text" id="fname" name="name" placeholder="Sarah Ahmad" onblur="validate(1)"> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Email</label> <input type="text"  id="email" name="email" placeholder="sarah@gmail.com" onblur="validate(2)"> </div>  
                    </div>
                 <div class="row justify-content-between text-left">
        <div class="form-group mb-3">
            <label class="mb-1">
                <i class="fa fa-pencil me-2 text-muted"></i> Bio
            </label>
            <textarea 
                name="bio" 
                class="form-control" 
                rows="4" 
                placeholder="Tell us a little about yourself..."
                style="resize: none; border-radius: 10px;"
            ></textarea>
            <small class="text-muted">Brief description for your profile. Max 250 characters.</small>
        </div>
    </div>

                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Phone Number</label> <input type="tel" id="tel" name="phone" placeholder="07 ########" onblur="validate(3)"> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Location<span class="text-danger"> </span></label> <input type="text" id="location" name="location" placeholder="Amman-Razi street" onblur="validate(4)"> </div>
                    </div>
                    {{-- <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label px-3">Profile Img</label> <input type="file" id="img_upload" name="profile_image" placeholder="" onblur="validate(5)"> </div>
                    </div> --}}

                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Password</label> <input type="password" id="job" name="password" placeholder="" onblur="validate(5)"> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Confirm Password</label> <input type="password" id="job" name="password_confirmation" placeholder="" onblur="validate(5)"> </div>
                    </div>

                    <div class="row justify-content-end">
                        <div class="form-group col-sm-6"> <button type="submit"  class="btn btn-purple">Sign Up </button> </div>
                    </div>
                    <div class="text-center mt-4">
                            <p class="mb-0 text-muted">Already have an account? 
                                <a href="{{ route('login') }}" class="register-link">Login Here</a>
                            </p>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>


@section('scripts')
<script  src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
@endsection
@endsection
