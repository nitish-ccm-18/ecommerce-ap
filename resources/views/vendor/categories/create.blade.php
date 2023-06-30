@extends('layouts.vendor.main')

@section('title')
    Add Category
@endsection

@section('content')
    <div class="container-fluid">
        <h3 class="text-center">Create Category Form</h3>
        <form action="/vendor/categories/create" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="CategoryName" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="CategoryName" name="name">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <label for="CategoryDescription">Description</label>
                <textarea class="form-control" placeholder="Leave a comment here" name="description" id="CategoryDescription"
                    style="height: 100px"></textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label class="" for="thumbnail">Thumbnail</label>
                <input type="file" class="form-control" id="thumbnail" name="thumbnail">
                @error('thumbnail')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary form-control">Create</button>
            </div>
        </form>
    </div>
@endsection
