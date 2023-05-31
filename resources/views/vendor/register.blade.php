@extends('layouts.app')

@section('title')
   Login | GetProduct 
@endsection


@section('content')
{{ $errors }}
    <form action="/vendors/create" class="form-control" method="POST">
        @csrf
        <div class="mb-3">
            <label for="vendorName" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="vendorName" name="vendor_name">
        </div>
        <div class="mb-3">
            <label for="vendorEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="vendorEmail" name="vendor_email">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else</div>
        </div>
        <div class="mb-3">
            <label for="vendorPassword" class="form-label">Password</label>
            <input type="password" class="form-control" id="vendorPassword" name="vendor_password">
        </div>
        <div class="mb-3">
            <label for="ConfirmvendorPassword" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="ConfirmvendorPassword" name="confirm_vendor_password">
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
@endsection