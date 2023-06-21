@extends('layouts.vendor.main')

@section('title')
    Create Product | GetProduct
@endsection


@section('content')
<div class="container-fluid">
    <h3 class="text-center">Create Product Form</h3>
    <form action="/vendor/products/create" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <select class="form-control form-select mb-3" name="category_id" id="categories">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('categories')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="ProductName" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="ProductName" name="product_name">
            @error('product_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="ProductName" class="form-label">Original Price</label>
                <div class="input-group">
                    <span class="input-group-text">Rs</span>
                    <input type="text" class="form-control" aria-label="Amount ()" name="product_price">
                </div>
                @error('product_price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col">
                <label for="ProductName" class="form-label">Sale Price</label>
                <div class="input-group">
                    <span class="input-group-text">Rs</span>
                    <input type="text" class="form-control" aria-label="Amount ()" name="product_sale_price">
                </div>
                @error('product_sale_price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="ProductName" class="form-label">Quantity</label>
                <input type="number" class="form-control" placeholder="i.e 10" name="product_quantity">
                @error('product_quantity')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col">
                <label for="ProductName" class="form-label">Weight</label>
                <input type="number" class="form-control" placeholder="i.e 10 KG" name="product_weight">
                @error('product_weight')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label" for="ProductImage1">Product Image</label>
            <input type="file" class="form-control" id="ProductImage1" name="product_image">
            @error('product_image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <textarea class="form-control" placeholder="Leave a comment here" name="product_description" id="ProductDescription"
                style="height: 100px"></textarea>
            <label for="ProductDescription">Comments</label>
            @error('product_description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary form-control">Create</button>
        </div>
    </form>
</div>


    @push('head')
        <script>
            $(document).ready(function() {
                fetchCategories();
            });

            function fetchCategories() {
                $.ajax({
                    type: 'get',
                    url: 'http://127.0.0.1:8000/categories/all',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $options = ['<option selected>Select category</option>'];

                        data.forEach($category => {
                            $options.push(`<option value=${$category.id}>${$category.name}</option>`);
                            $('#categories').html($options);
                        });
                    }
                });
            }
        </script>
    @endpush
@endsection
