<!-- profile.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
     <h1>Edit Profile</h1>
  	<hr>
	<div class="row">
      <!-- left column -->
      <div class="col-md-3">
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <h3>Personal info</h3>
        
        <form class="form-horizontal" method="post" action="/profile/update">
            @csrf
            @method('patch')
          <div class="form-group">
            <label class="col-lg-3 control-label">Name</label>
            <div class="col-lg-8">
              <p>{{$profile[0]->name}}</p>
              <input class="form-control" type="text" value="" name="name">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">Gender</label>
            <div class="col-lg-8">
              <input class="" type="radio" value="Male" name="gender">Male
              <input class="" type="radio" value="Female" name="gender">Female
              <input class="" type="radio" value="Other" name="gender">Others
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Phone</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="phone" value="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Occupation</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="" name="occupation">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Address</label>
            <div class="col-md-8">
              <input class="form-control" type="text" type="address" value="">
            </div>
        </div>
        <div class="text-center">
          <img src="" class="avatar img-circle" alt="avatar">
          <h6>Upload a different photo...</h6>
          <input type="file" class="form-control" name="avatar">
        </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="button" class="btn btn-primary" value="Save Changes">
              <span></span>
              <input type="reset" class="btn btn-default" value="Cancel">
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
<hr>
@endsection
