@extends('layouts.vendor.main')

@section('title')
   Edit Category | Vendor Dashboard 
@endsection


@section('content')
<div class="container-fluid">
    <h3 class="text-center">Edit Category Form</h3>
    <form action="/vendor/categories/edit" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $category->id }}">
        <div class="mb-3">
            <label for="CategoryName" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="CategoryName" name="category_name" value="{{ $category->name }}">
        </div>
        {{-- <div class="input-group mb-3">
            <label class="input-group-text" for="CategoryImage1">Upload</label>
            <input type="file" class="form-control" id="CategoryImage1" name="CategoryImage1">
        </div> --}}
        
        <div class="mb-3">
            <label for="CategoryDescription">Description</label>
            <textarea class="form-control" placeholder="Leave a comment here" name="category_description" id="CategoryDescription" style="height: 100px">{{ $category->description }}</textarea>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary form-control">Edit</button>
        </div>
    </form>  
</div>
@endsection