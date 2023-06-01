@extends('layouts.app')

@section('title')
  User Login | GetProduct 
@endsection


@section('content')
    {{ $errors }}
      <div class="row ">
        <div class="col align-self-center">
          <h2 class="text-center">User Login</h2>
          <form action="/authenticate" method="POST" class="form-control">
            @csrf
            {{-- user email --}}
            <div class="mb-3">
              <label for="UserEmail" class="form-label">Email address</label>
              <input type="email" class="form-control" id="UserEmail" name="email">
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else</div>
            </div>

            {{-- user password --}}
            <div class="mb-3">
              <label for="UserPassword" class="form-label">Password</label>
              <input type="password" class="form-control" id="UserPassword" name="password">
            </div>      
            <button type="submit" class="btn btn-primary">Login</button>
          </form>  
        </div>
      </div>

@endsection