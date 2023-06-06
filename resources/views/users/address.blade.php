@extends('layouts.app')

@section('title')
User Dashboard
@endsection
@section('content')
<form method="post" action="/address/new">
  @csrf
  <h2>Add your address</h2>
    <div class="mb-3">
      <label for="inputAddress">Address Line1</label>
      <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="line1">
    </div>
    <div class="mb-3">
      <label for="inputAddress2">Address Line 2</label>
      <input type="text" class="form-control" id="inputAddress2" name="line2" placeholder="Apartment, studio, or floor">
    </div>
    <div class="form-row mb-3">
      <div class="form-group col-md-5">
        <label for="inputCity">City</label>
        <input type="text" class="form-control" id="inputCity" name="city">
      </div>
      <div class="form-group col-md-4">
        <label for="inputState">State</label>
        <select id="inputState" class="form-control" name="state">
          <option selected>Choose...</option>
          <option>Haryana</option>
          <option>Delhi</option>
          <option>Punjab</option>
          <option>Uttar Pradesh</option>
        </select>
      </div>
      <div class="form-group col-md-2">
        <label for="inputZip">Zip</label>
        <input type="text" class="form-control" id="inputZip" name="pincode">
      </div>
      <div class="form-group col-md-2 mb-2">
        <label for="tag">Tag(i.e. Home,Office etc.)</label>
        <input type="text" name="tag" id="tag" class="form-control">
      </div>
    <button type="submit" class="btn btn-primary ">Save Address</button>
  </form>
@endsection