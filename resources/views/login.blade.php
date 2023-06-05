@extends('layouts.app')

@section('title')
  Login | GetProduct 
@endsection


@section('content')
    <div class="row ">
      <div class="col align-self-center">
        <h2 class="text-center">Login</h2>
        <form action="/authenticate" method="POST" class="form-control">
          @csrf
          {{-- UserName input --}}
          <div class="mb-3">
            <label for="Email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="Email" name="email">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else</div>
            @error('email')
              <div class="error">{{ $message }}</div>
            @enderror
          </div>
    
          <div class="mb-3">
            <label for="Password" class="form-label">Password</label>
            <input type="password" class="form-control" id="Password" name="password">
            @error('password')
              <div class="error">{{ $message }}</div>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary">Login</button>
        </form> 
        New User? <a href="/users/register" class="btn btn-sm btn-outline-primary">Register</a> 
      </div>
    </div>
@endsection