@extends('layouts.vendor.main')

@section('title')
    Edit Product | GetProduct
@endsection


@section('content')
    <h1 class="text-center">Edit Product Form</h1>
    <form action="/vendor/products/edit" method="POST" class="form-control" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $product->id }}">
        <div class="mb-3">
            <select class="form-select form-select mb-3" name="category_id" id="categories">
                {{-- List of categories from Categories table --}}
                <option value="{{ $category->id }}" hidden>{{ $category->name }}</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="ProductName" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="ProductName" name="product_name" value="{{ $product->name }}"
                readonly>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Original Price</label>
                <div class="input-group">
                    <span class="input-group-text">Rs</span>
                    <input type="text" class="form-control" aria-label="Amount ()" name="product_price"
                        value="{{ $product->price }}">
                </div>
                @error('product_price')
                <span class="text-danger">{{ $message }}</span>
                 @enderror
            </div>
            <div class="col">
                <label for="ProductName" class="form-label">Sale Price</label>
                <div class="input-group">
                    <span class="input-group-text">Rs</span>
                    <input type="text" class="form-control" aria-label="Amount ()" name="product_sale_price"
                        value="{{ $product->sale_price }}">
                </div>
                @error('product_sale_price')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="ProductName" class="form-label">Quantity</label>
                <input type="number" class="form-control" placeholder="i.e 10" name="product_quantity"
                    value="{{ $product->quantity }}">
                    @error('product_quantity')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col">
                <label for="ProductName" class="form-label">Weight</label>
                <input type="number" class="form-control" placeholder="i.e 10 KG" name="product_weight"
                    value="{{ $product->weight }}">
                    @error('product_weight')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <img src="{{ url('public/Image/Products/' . $product->image) }}" alt="Product Picture">
            </div>
            <div class="col">
                <label class="form-label" for="ProductImage1">Product Image</label>
                <input type="file" class="form-control" id="ProductImage1" name="product_image">
            </div>
        </div>
        <div class="form-floating mb-3">
            <textarea class="form-control" name="product_description" id="ProductDescription" style="height: 100px">{{ $product->description }}</textarea>
            <label for="ProductDescription">Description</label>
            @error('product_description')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary form-control">Edit</button>
        </div>
    </form>


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
                        // Store Current Selected choice id
                        categoryID = $('#categories:first-child').val();
                        data.forEach($category => {
                            if ($category.id == categoryID) {
                                $('#categories').append(
                                    `<option value=${$category.id} selected>${$category.name}</option>`);
                            } else
                                $('#categories').append(
                                    `<option value=${$category.id}>${$category.name}</option>`);
                        });
                    }
                });
            }
        </script>
    @endpush
@endsection
