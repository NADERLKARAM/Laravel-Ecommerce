@extends('layouts.master')



@section('content')

<div class="cart-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="cart-table-wrap">
                    <table class="cart-table">
                        <thead class="cart-table-head">
                            <tr class="table-head-row">
                                <th class="product-remove"></th>
                                <th class="product-image">Product Image</th>
                                <th class="product-name">ID</th>
                                <th class="product-name">Name</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-total">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $item)

                            <tr class="table-body-row">
                                <td class="product-remove">
                                    <form action="{{ route('cart.remove', ['product' => $item->product->id]) }}" method="post">
                                        @csrf
                                        @method('delete') <!-- Use 'delete' method for removing a specific product -->
                                        <button type="submit" class="remove-button"><i class="far fa-window-close"></i></button>
                                    </form>
                                </td>
                                <td>
                                    <img src = '{{ asset('storage/' . $item->product->image) }}' width="100" height="100" />
                                </td>
                                <td class="product-id">{{ $item->product->id }}</td>
                                <td class="product-name">{{ $item->product->name }}</td>
                                <td class="product-price">${{ $item->product->price }}</td>
                                <td class="product-quantity">
                                    <input type="number" name="quantity" value="{{ $item->quantity }}" placeholder="0" min="0">
                                </td>

                                <td class="product-total">${{ $item->product->price * $item->quantity }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="total-section">
                    <table class="total-table">
                        <thead class="total-table-head">
                            <tr class="table-total-row">
                                <th>Total</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="total-data">
                                <td><strong>Total: </strong></td>
                                <td>
                                    {{ $products->sum(function ($item) {
                                        return $item->product->price * $item->quantity;
                                    }) }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="cart-buttons">
                        <a href="/Completeorder" class="boxed-btn black">Check Out</a>
                    </div>
                </div>

                <div class="coupon-section">
                    <h3>Apply Coupon</h3>
                    <div class="coupon-form-wrap">
                        <form action="index.html">
                            <p><input type="text" placeholder="Coupon"></p>
                            <p><input type="submit" value="Apply"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
