@extends('layouts.app')

@section('title')
    User Dashboard
@endsection
@section('content')
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">New Address Form</h1>
                            </div>
                            <form method="post" action="/address/new" class="">
                                @csrf
                                <div class="mb-3">
                                  <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                  placeholder="Line 1" name="line1">
                                    @error('line1')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="inputAddress2" name="line2"
                                        placeholder="Line 2">
                                    @error('line2')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                    
                                        <input type="text" class="form-control" id="inputCity" name="city" placeholder="City">
                                        @error('city')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <select id="inputState" class="form-control" name="state">
                                            <option>Select State</option>
                                            <option value="Haryana">Haryana</option>
                                            <option value="Delhi">Delhi</option>
                                            <option value="Punjab">Punjab</option>
                                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                                        </select>
                                        @error('state')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-2 ">
                                        <input type="text" class="form-control" placeholder="Zipcode" name="pincode">
                                        @error('pincode')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                    <div class="form-group  mb-2">
                                        <label for="tag"></label>
                                        <input type="text" name="tag" id="tag" class="form-control" placeholder="Tag(i.e. Home,Office etc.)">
                                        @error('tag')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-block btn-outline-primary ">Save Address</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        @csrf
    @endsection
