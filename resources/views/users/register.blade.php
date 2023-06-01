@extends('layouts.app')

@section('title')
   Login | GetProduct 
@endsection


@section('content')
{{ $errors }}
    <form action="/users/register" class="form-control" method="POST">
        @csrf
        <div class="mb-3">
            <label for="UserName" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="UserName" name="name">
        </div>
        <div class="mb-3">
            <label for="UserEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="UserEmail" name="email">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else</div>
        </div>
        <div class="mb-3">
            <label for="UserPassword" class="form-label">Password</label>
            <input type="password" class="form-control" id="UserPassword" name="password">
        </div>
        <div class="mb-3">
            <label for="ConfirmUserPassword" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="ConfirmUserPassword" name="confirm_password">
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
@endsection