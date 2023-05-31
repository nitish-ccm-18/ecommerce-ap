@extends('layouts.app')

@section('title')
   Welcome | GetProduct 
@endsection


@section('content')
<div class="card w-75">
    <div class="card-body">
      <h5 class="card-title">{{ $category->name }}</h5>
      <p class="card-text">{{ $category->description }}</p>
      <a href="#" class="btn btn-primary">Dummy Button</a>
    </div>
  </div>
@endsection