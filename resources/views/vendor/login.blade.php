@extends('layouts.app')

@section('title')
   Login | GetProduct 
@endsection


@section('content')
    {{ $errors }}
    <form action="/vendors/login" method="POST" class="form-control">
      @csrf
            <div class="mb-3">
              <label for="vendorEmail" class="form-label">Email address</label>
              <input type="email" class="form-control" id="vendorEmail" name="vendor_email">
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else</div>
            </div>
            <div class="mb-3">
              <label for="vendorPassword" class="form-label">Password</label>
              <input type="password" class="form-control" id="vendorPassword" name="vendor_password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
    </form>  
@endsection