@extends('layouts.vendor.main')

@section('title')
   Edit Category | Vendor Dashboard 
@endsection

@section('content')
<div class="container-fluid">
    <h3 class="text-center">Edit Category Form</h3>
    <form action="/vendor/categories/edit" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $category->id }}">
        <div class="mb-3">
            <label for="CategoryName" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="CategoryName" name="name" value="{{ $category->name }}">
        </div>
        <div class="mb-3">
            <label for="CategoryDescription">Description</label>
            <textarea class="form-control" placeholder="Leave a comment here" name="description" id="CategoryDescription" style="height: 100px">{{ $category->description }}</textarea>
        </div>
        <div class="form-group mb-3">
            <div class="col">
                <img src="{{ url('public/Image/Categories/' . $category->thumbnail ) }}" alt="Category Thumbnail">
            </div>
            <label class="" for="thumbnail">Thumbnail</label>
            <input type="file" class="form-control" id="thumbnail" name="thumbnail">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary form-control">Edit</button>
        </div>
    </form>  
</div>
@endsection