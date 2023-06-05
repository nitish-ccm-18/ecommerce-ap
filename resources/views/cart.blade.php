@extends('layouts.app')

@section('title')
    Welcome | GetProduct
@endsection


@section('content')

    @if (Session::get('cart'))
        <div class="row">
            <table class="table" id="products_table">
                <thead>
                    <tr>
                        <th class="text-center">Product</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0 @endphp


                    @foreach (Session::get('cart') as $id => $product)
                        @php $total += $product['price'] * $product['quantity'] @endphp
                        <tr data-id="{{ $id }}">
                            <td data-th="Product">
                                <div class="row">
                                    <div class="col-sm-3 hidden-xs"><img
                                            src="{{ url('public/Image/Products/' . $product['image']) }}" width="100"
                                            height="100" class="img-responsive" /></div>
                                    <div class="col-sm-9">
                                        <h4 class="nomargin">{{ $product['name'] }}</h4>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Price">{{ $product['price'] }}</td>
                            <td data-th="Quantity">
                                <input type="number" value="{{ $product['quantity'] }}"
                                    class="form-control quantity update-cart" style="max-width: 10vw;" />
                            </td>
                            <td data-th="Subtotal" class="text-center">Rs. {{ $product['price'] * $product['quantity'] }}</td>
                            <td class="actions" data-th="">
                                <button class="btn btn-danger btn-sm remove-cart">Remove</button>
                            </td>
                        </tr>
                    @endforeach



                </tbody>
            </table>
            <div class="d-flex justify-content-between">
                 <div>
                    <h3>Total : Rs. {{ $total }}</h3>
                 </div>
                 <div>
                    <a href="" class="btn btn-warning ">&lt;&lt;Continue Shoppping</a>
                    <a href="/checkout" class="btn btn-primary">Checkout</a>
                 </div>
            </div>
    @endif
    </div>

    @push('head')
        <script>
            $('.update-cart').change(function(e) {
                e.preventDefault();

                var ele = $(this);

                $.ajax({
                    url: '{{ route('cart.update') }}',
                    method: 'patch',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr('data-id'),
                        quantity: ele.parents('tr').find('.quantity').val(),
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            });

            $('.remove-cart').click(function(e) {
                e.preventDefault();

                var ele = $(this);

                if (confirm('Are you sure want to remove ?')) {
                    $.ajax({
                        url: ' {{ route('cart.remove') }}',
                        method: 'delete',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: ele.parents('tr').attr('data-id')
                        },
                        success: function(response) {
                            window.location.reload();
                        }
                    });
                }
            });
        </script>
    @endpush

@endsection
