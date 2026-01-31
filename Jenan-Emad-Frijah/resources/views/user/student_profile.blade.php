@extends('layouts.home')
@section('title', 'Home Page')
@section('styles')
<style>
    body{
    background:#f8f8f8
}

.btn-purple {
  background-color: #6f42c1 !important;
  border-color: #6f42c1 !important;
  color: #fff !important;
}

.btn-purple:hover {
  background-color: #5a32a3 !important;
  border-color: #5a32a3 !important;
  color: #fff;
}

.card {
        border: none;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
        border-radius: 15px;
    }

#btn1{
    width:30%;
}
</style>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
@endsection
@section('content')
<div class="container mt-5">
  <div class="row flex-lg-nowrap justify-content-center">

    <div class="col-10 mx-auto">
      <div class="row">
        <div class="col mb-3">
          <div class="card">
          <div class="card-body">
            <div class="e-profile">
              <div class="row">
                <div class="col-8 col-sm-auto mb-3">
            
                </div>
                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                  <div class="text-center text-sm-left mb-2 mb-sm-0">
                <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap" >{{auth()->user()->name}}</h4>
                    <p class="mb-0">{{auth()->user()->email}}</p>
                
                  </div>
                  <div class="text-center text-sm-right">
                    <span class="badge badge-secondary">administrator</span>
                  </div>
                </div>
              </div>
              <ul class="nav nav-tabs">
                <li class="nav-item"><a href="" class="active nav-link">Settings</a></li>
              </ul>
              <div class="tab-content pt-3">
                <div class="tab-pane active">
                  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

@if (session('status') === 'profile-updated')
  <div class="alert alert-success">Profile updated successfully.</div>
@endif


                  <form class="form" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                      @csrf
                    @method('PATCH')
 
                    <div class="row">
                      <div class="col">
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>User Name</label>
                              <input class="form-control" type="text" name="name"  value="{{ old('name', auth()->user()->name) }}">
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label>Email</label>
                              <input class="form-control" type="text" name="email"  value="{{ old('email', auth()->user()->email) }}">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Phone Number</label>
                              <input class="form-control" type="tel" name="phone" value="{{ old('phone', auth()->user()->phone) }}">
                            </div>
                          </div>
                        

                          <div class="col">
                            <div class="form-group">
                              <label>Location</label>
                              <input class="form-control"  name="location" type="text" value="{{ old('location', auth()->user()->location) }}">
                            </div>
                          </div>
                       </div>
                          <div class="row mt-3">
        <div class="col d-flex justify-content-end">
            <button class="btn btn-purple" type="submit">Update</button>
        </div>
    </div>
                      </div>
                    </div>
                      </form>

  @if (session('status') === 'password-updated')
  <div class="alert alert-success">Password updated successfully.</div>
@endif

<form method="POST" action="{{ route('password.update') }}">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col">
            <label>Current Password</label>
            <input class="form-control" name="current_password" type="password">
        </div>
        <div class="col">
            <label>New Password</label>
            <input class="form-control" name="password" type="password">
        </div>
    </div>

    <div class="row mt-2">
        <div class="col">
            <label>Confirm Password</label>
            <input class="form-control" name="password_confirmation" type="password">
        </div>
    </div>

    <div class="row mt-3">
        <div class="col d-flex justify-content-end">
            <button class="btn btn-purple" type="submit">Update Password</button>
        </div>
    </div>
</form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>
</div>
</div>

@endsection