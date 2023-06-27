    @extends('layouts.auth.main')


@section('title')
    Forgot Password
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
                                <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                                            <p class="mb-4">We get it, stuff happens. Just enter your email address below
                                                and we'll send you a link to reset your password!</p>
                                        </div>
                                        <div class="text-center">
                                            @if (session('status'))
                                            <div class="alert alert-info" role="alert">
                                                {{ session('status') }}
                                            </div>
                                            @endif
                                        </div>
                                        <form action="{{ route('password.email') }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                    <input type="email" class="form-control form-control-user"
                                                        id="exampleInputEmail" aria-describedby="emailHelp"
                                                        placeholder="Enter Email Address..." name="email"
                                                        value="{{ old('email') }}">
                                                    @error('email')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                              
                                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                                        {{ __('Send Reset Link') }}
                                                    </button>
                        
                                            </div>
                                        </form>
                                        <div class="text-center">
                                            <a class="large" href="{{ route('login') }}">Goto Login</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            @endsection
