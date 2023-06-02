@extends('layouts.app')
@section('title','Edit Profile')

@section('content')
<div class="row justify-content-center">
<form action="/users/profile/edit" method="post" class="col-md-8 " enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="UserName" class="form-label">Full Name</label>
        <input type="text" class="form-control" id="UserEmail" placeholder="John Doe" name="name" value="{{ $user->name }}">
    
    </div>
    <div class="mb-3">
        <label for="UserEmail" class="form-label">Email address</label>
        <input type="email" class="form-control" id="UserEmail" placeholder="name@example.com" name="UserEmail" value="{{ $user->email }}" disabled>
    
    </div>
    {{-- <div class="row mb-3">
        <div class="col border">
            <img src="{{ url('public/Image/users/'.$user->profile_picture) }}" alt="User Picture">
        </div>
        <div class="col">
            <label for="UserProfile" class="form-label">Profile Picture</label>
            <input type="file" class="form-control" id="UserProfile" placeholder="UserProfilePicture" name="profile_image">
        </div>
    </div> --}}
    <div class="mb-3">
        <input type="submit" value="Update" class="form-control btn btn-primary">
    </div>
</form>
</div>
@endsection