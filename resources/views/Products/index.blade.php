@extends('layouts.master')


@section('content')
<!-- product section -->
<div class="product-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3><span class="orange-text">اقسام</span> الموقع</h3>
                    <h4>متعة التسوق عبر موقعنا</h4>
                </div>
            </div>
        </div>


        <div class="row">

            @foreach ($products as $item)
            <div class="col-lg-4 col-md-6 text-center">
                <div class="single-product-item">
                    <div class="product-image">
                        <a href="/single-product/{{ $item->id }}"><img
                                style="max-height: 250px;min-height:250px" src="{{ asset('storage/' . $item->image) }}"
                                alt=""></a>
                    </div>
                    <h3>{{ $item -> name }}</h3>
                    <p class="product-price">{{ $item->price }}$ </p>
                    <p class="product-price"><span>quantity </span> {{ $item->quantity }} </p>


                    <a href="/cart" onclick="event.preventDefault(); document.getElementById('add-to-cart-form-{{ $item->id }}').submit();" class="cart-btn">
                        <i class="fas fa-shopping-cart"></i>
                        اضافة الى السلة
                    </a>

                    <form id="add-to-cart-form-{{ $item->id }}" method="POST" action="{{ route('cart.add', $item->id) }}" style="display: none;">
                        @csrf
                        <!-- Include any other form fields if needed -->
                    </form>


                    @if (Auth::check())
                    <form action="/products/delete/{{ $item->id }}" method="POST" style="display:inline;">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?');">
                            <i class="fas fa-trash"></i> حذف المنتج
                        </button>
                    </form>

                        <a href="/products/{{ $item->id }}/edit" class="btn btn-primary">
                            <i class="fas fa-trash"></i>
                            تعديل المنتج
                        </a>

                        @endif
                    </p>
                </div>
            </div>
            @endforeach

        </div>

        <div style="text-align: center;    margin: 0px auto;">
            {{ $products->links() }}
        </div>


    </div>
</div>
<!-- end product section -->
@endsection;

<style>
    svg {
        height: 50px !important;
    }
</style>
