@extends('layouts.app')

@section('title')
   Create Product Category | GetProduct 
@endsection


@section('content')
<h1 class="text-center">Create Category Form</h1>
<form action="/categories/create" method="POST" class="form-control">
    @csrf
    <div class="mb-3">
        <label for="CategoryName" class="form-label">Category Name</label>
        <input type="text" class="form-control" id="CategoryName" name="category_name">
    </div>
    <div class="form-floating mb-3">
        <textarea class="form-control" placeholder="Leave a comment here" name="category_description" id="CategoryDescription" style="height: 100px"></textarea>
        <label for="CategoryDescription">Description</label>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary form-control">Create</button>
    </div>
</form>  
@endsection