@extends('layouts.app')

@section('title')
   Login | GetProduct 
@endsection


@section('content')
    {{ $errors }}
    <form action="/users/login" method="POST" class="form-control">
      @csrf
            <div class="mb-3">
              <label for="UserEmail" class="form-label">Email address</label>
              <input type="email" class="form-control" id="UserEmail" name="user_email">
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else</div>
            </div>
            <div class="mb-3">
              <label for="UserPassword" class="form-label">Password</label>
              <input type="password" class="form-control" id="UserPassword" name="user_password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
    </form>  
@endsection