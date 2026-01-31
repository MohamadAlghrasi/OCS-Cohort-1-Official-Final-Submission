@extends('layouts.tutor')
@section('title','Tutor Profile')
@section('content')

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Poppins', sans-serif;
    background-color: aliceblue;
}

.wrapper {
    padding: 30px 50px;
    border: 1px solid #ddd;
    border-radius: 15px;
    margin: 10px auto;
    max-width: 80%;
}

h4 {
    letter-spacing: -1px;
    font-weight: 400;
}

.img {
    width: 100px;
    height: 100px;
    border-radius: 6px;
    object-fit: cover;
}

#img-section p {
    font-size: 12px;
    color: #777;
    margin-bottom: 10px;
}

#img-section b {
    font-size: 14px;
}

label {
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 500;
    color: #777;
    padding-left: 3px;
}

.form-control {
    border-radius: 10px;
}

.form-control:focus {
    box-shadow: none;
    border: 1.5px solid #0779e4;
}

.btn-purple {
    background-color: #6f42c1 !important;
    border-color: #6f42c1 !important;
    color: #fff !important;
}

.btn-purple:hover {
    background-color: #5a32a3 !important;
    border-color: #5a32a3 !important;
}

@media(max-width:576px) {
    .wrapper {
        padding: 25px 20px;
    }
}
</style>

<div class="wrapper bg-white mt-sm-2">
    <h4 class="pb-4 border-bottom">Account settings</h4>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="py-2">
        <form action="{{ route('tutor.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="d-flex align-items-start py-3 border-bottom">
                <img src="{{ $user->profile_image 
                             ? asset('storage/profile_images/' . $user->profile_image) 
                             : asset('storage/profile_images/profile.jpg') }}" 
                     class="img" 
                     alt="Profile Photo"
                     id="preview-image">

                <div class="pl-sm-4 pl-2" id="img-section">
                    <b>Profile Photo</b>
                    <p>Accepted: .png, .jpg, .jpeg (Max: 1MB)</p>
                    <input type="file" 
                           name="profile_image" 
                           id="profile_image"
                           class="form-control-file" 
                           accept="image/*">
                </div>
            </div>

        
            <div class="row py-2">
                <div class="col-md-6">
                    <label for="name">Full Name</label>
                    <input type="text" name="name" class="bg-light form-control" value="{{ $user->name }}" required>
                </div>
                <div class="col-md-6">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" class="bg-light form-control" value="{{ $user->email }}" required>
                </div>
            </div>

            <div class="row py-2">
                <div class="col-md-6 pt-md-0 pt-3">
                    <label for="phone">Phone Number</label>
                    <input type="tel" name="phone" class="bg-light form-control" value="{{ $user->phone }}">
                </div>
                <div class="col-md-6 pt-md-0 pt-3">
                    <label for="location">Location</label>
                    <input type="text" name="location" class="bg-light form-control" value="{{ $user->location }}">
                </div>
            </div>

    
            <div class="row py-2">
                <div class="col-md-12">
                    <label for="bio">Bio</label>
                    <textarea class="bg-light form-control" name="bio" rows="4">{{ $user->tutor->bio ?? '' }}</textarea>
                </div>
            </div>


            <div class="row py-2">
                <div class="col-md-4">
                    <label for="current_password">Current Password</label>
                    <input type="password" name="current_password" class="bg-light form-control">
                </div>
                <div class="col-md-4 pt-md-0 pt-3">
                    <label for="password">New Password</label>
                    <input type="password" name="password" class="bg-light form-control" >
                </div>
                <div class="col-md-4 pt-md-0 pt-3">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="bg-light form-control">
                </div>
            </div>

            <div class="py-3 pb-4 border-bottom">
                <button type="submit" class="btn btn-purple mr-3"> Save Changes</button>
            </div>
        </form>
    </div>
</div>

<script>

document.getElementById('profile_image').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview-image').src = e.target.result;
        }
        reader.readAsDataURL(file);
    }
});
</script>

@endsection