@extends('layouts.users.main')
@section('title')
    User Profile
@endsection

@section('content')
    {{-- {{dd($profile)}} --}}
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="{{ $profile[0]->profile->avatar ? url('public/Image/Users/' . $profile[0]->profile->avatar) : 'https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp' }}"
                            alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                        <p class="">
                            {{ $profile[0]->name }} <br>
                            <small><i class="fa-solid fa-envelope"></i>{{ $profile[0]->email }}</small>
                        </p>

                        <p class="text-muted mb-1">Occupation : {{ $profile[0]->profile->occupation }}</p>
                        <p class="text-muted mb-4">
                            <i class="fa-solid fa-location-dot"></i>
                            {{ $profile[0]->profile->address }}
                        </p>
                        <p class="text-muted">
                            Gender : {{ $profile[0]->profile->gender ? $profile[0]->profile->gender : 'Not Selected' }}
                        </p>
                        <div class="d-flex justify-content-center mb-2">
                            <button type="button" class="btn btn-primary">Follow</button>
                            <button type="button" class="btn btn-outline-primary ms-1">Message</button>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-lg-8">


                <div class="card card-body">
                    <form class="form-horizontal" method="post" action="/profile/update" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Name</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" value="{{ $profile[0]->name }}" name="name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Gender</label>
                            <div class="col-lg-8">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Male" name="gender"
                                        id="male_gender">
                                    <label class="form-check-label" for="male_gender">
                                        Male
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Female" name="gender"
                                        id="female_gender">
                                    <label class="form-check-label" for="female_gender">
                                        Female
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Phone</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" name="phone"
                                    value="{{ $profile[0]->profile->phone }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Occupation</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" value="{{ $profile[0]->profile->occupation }}"
                                    name="occupation">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Address</label>
                            <div class="col-md-8">
                                <input class="form-control" type="address" value="{{ $profile[0]->profile->address }}"
                                    name="address">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">User Avatar</label>
                            <div class="col-md-8">
                                <input type="file" class="form-control" name="avatar">
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-primary" value="Update Profile">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
