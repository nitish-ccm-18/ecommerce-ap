@extends('layouts.app')

@section('title')
   Welcome | GetProduct 
@endsection


@section('content')
<div class="row" id="category-viewer">
    {{-- Here Product will be fetched by AJAX --}}
</div> 
<div class="row" id="product-viewer">
    {{-- Here Product will be fetched by AJAX --}}
</div>    



@push('head')
    <script>
        $(document).ready(function() {
            fetchProducts();
            fetchCategories();
        });

        function fetchProducts() {
            $.get("http://127.0.0.1:8000/test/products", function(data, status){

             data.forEach((product)=> {
                productCard = `
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="public/Image/Products/${product.image}" alt="Product image">
                        <div class="card-body">
                            <h5 class="card-title">${product.name}</h5>
                            <p class="card-text ">${product.description}</p>
                            <p class="card-text">
                                    <span class="text-decoration-line-through">${product.price}</span>
                                    <span class="text-decoration-none">${product.sale_price}</span> Rs
                            </p>
                        </div>
                    </div>`;
                    $('#product-viewer').append(productCard);
              });
            });
        }

        function fetchCategories() {
            $.get("http://127.0.0.1:8000/test/categories", function(data, status){
             data.forEach((category)=> {
                categoryBtn = `<a href="" class="btn btn-outline-dark">${category.name}</a>`;
                $('#category-viewer').append(categoryBtn);
              });
            });
        }


    </script>
@endpush
@endsection