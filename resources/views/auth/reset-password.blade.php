    
    @extends('layouts.auth.main')

    @section('title')
        Reset Password
    @endsection
    @section('content')
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        @if (session('status'))
                                        <div class="alert alert-info" role="alert">
                                            {{ session('status') }}
                                        </div>
                                        @endif
                                    </div>
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Reset Password</h1>
                                    </div>
                                    <form  action="{{ route('password.update') }}" method="POST" class="user">
                                      @csrf
                                      <input type="hidden" name="token" value="{{ $token }}">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." name="email" value="{{ $email ?? old('email') }}">
                                              @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                              @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" name="password">
                                              @error('password')
                                                <div class="text-danger">{{ $message }}</div>
                                              @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" name="password_confirmation">
                                              @error('password_confirmation ')
                                                <div class="text-danger">{{ $message }}</div>
                                              @enderror
                                        </div>
                                        <input type="submit" value="Reset Password"  class="btn btn-primary btn-user btn-block">
                                        <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    @endsection
