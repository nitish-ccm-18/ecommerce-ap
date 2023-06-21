@extends('layouts.app')

@section('title')
    Welcome | GetProduct
@endsection


@section('content')
<div class="d-flex align-items-center justify-content-center">
        {{ session('status') }}
        <span id="status"></span>
        <form action="/password/reset" method="post">
            @csrf
            <input type="email" class="form-control" id="user-email" name="email">
            <button type="submit" id="send_password_reset_mail_btn"  class="btn">Email Password Reset Link</button>
        </form>
</div>
@push('head')
<script>
    
</script>
@endpush
@endsection