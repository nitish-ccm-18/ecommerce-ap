@extends('layouts.app')

@section('title')
   Create Product | GetProduct 
@endsection


@section('content')
{{ $errors }}
<h1 class="text-center">Create Product Form</h1>
    <form action="/products/create" method="POST" class="form-control" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <select class="form-select form-select mb-3" name="category_id" id="categories">
                {{-- List of categories from Categories table --}}
            </select>
        </div>
        <div class="mb-3">
            <label for="ProductName" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="ProductName" name="product_name">
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="ProductName" class="form-label">Original Price</label>
                <div class="input-group">
                    <span class="input-group-text">Rs</span>
                    <input type="text" class="form-control" aria-label="Amount ()" name="product_price">
                </div>
            </div>
            <div class="col">
                <label for="ProductName" class="form-label">Sale Price</label>
                <div class="input-group">
                    <span class="input-group-text">Rs</span>
                    <input type="text" class="form-control" aria-label="Amount ()" name="product_sale_price">
                </div>
            </div>
          </div>
        <div class="row mb-3">
            <div class="col">
                <label for="ProductName" class="form-label">Quantity</label>
                <input type="number" class="form-control" placeholder="i.e 10" name="product_quantity">
            </div>
            <div class="col">
                <label for="ProductName" class="form-label">Weight</label>
                <input type="number" class="form-control" placeholder="i.e 10 KG" name="product_weight">
            </div>
        </div>
        
        <div class="mb-3">
            <label class="form-label" for="ProductImage1">Product Image</label>
            <input type="file" class="form-control" id="ProductImage1" name="product_image">
        </div>
        <div class="form-floating mb-3">
            <textarea class="form-control" placeholder="Leave a comment here" name="product_description" id="ProductDescription" style="height: 100px"></textarea>
            <label for="ProductDescription">Comments</label>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary form-control">Create</button>
        </div>
    </form>


    @push('head')
        <script>
            $( document ).ready(function() {
                fetchCategories();
            });

            function fetchCategories() {
                $.ajax({
                    type : 'get',
                    url : 'http://127.0.0.1:8000/categories/all',
                    dataType : 'json',
                    success : function(data) {
                        console.log(data);
                        $options = ['<option selected>Select category</option>'];

                        data.forEach($category => {
                            $options.push(`<option value=${$category.id}>${$category.name}</option>`);
                            $('#categories').html($options);
                        }
                        );
                    }
                });
            }
        </script>
    @endpush
@endsection