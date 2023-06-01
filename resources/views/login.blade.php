@extends('layouts.app')

@section('title')
  Login | GetProduct 
@endsection


@section('content')
    {{ $errors }}
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
          </div>
    
          <div class="mb-3">
            <label for="Password" class="form-label">Password</label>
            <input type="password" class="form-control" id="Password" name="password">
          </div>
          <button type="submit" class="btn btn-primary">Login</button>
        </form>  
      </div>
    </div>
@endsection