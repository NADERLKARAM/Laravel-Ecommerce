

@extends('layouts.master')

@section('content')




{{-- add some updates --}}

<div class="product-section mt-150 mb-150">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="product-filters">
                    <ul>

                        @foreach ($categories as $item)
                             <li data-filter="._{{$item -> id}}">{{$item -> name}}</li>
                        @endforeach
                        <li class="active" data-filter="*">الكل</li>

                    </ul>
                </div>
            </div>
        </div>

        <div class="row product-lists">

            @foreach ($products as $item)
            <div class="col-lg-4 col-md-6 text-center _{{$item -> category_id}}">
                <div class="single-product-item">
                    <div class="product-image">
                        <a href="/products/{{ $item->id }}"><img style="max-height: 250px;min-height:250px"  src="{{ asset('storage/' . $item->image) }}" alt=""></a>
                    </div>
                    <h3>{{$item -> name}}</h3>
                    <p class="product-price"> {{$item-> price}}$ </p>
                    <p class="product-price"><span>Quantity </span> {{$item-> quantity}} </p>



                    <a href="/cart" onclick="event.preventDefault(); document.getElementById('add-to-cart-form-{{ $item->id }}').submit();" class="cart-btn">
                        <i class="fas fa-shopping-cart"></i>
                        اضافة الى السلة
                    </a>

                    <form id="add-to-cart-form-{{ $item->id }}" method="POST" action="{{ route('cart.add', $item->id) }}" style="display: none;">
                        @csrf
                        <!-- Include any other form fields if needed -->
                    </form>




                    @if(auth()->check() && auth()->user()->role == 'admin')
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

        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="pagination-wrap">
                    <ul>
                        <li><a href="#">Prev</a></li>
                        <li><a href="#">1</a></li>
                        <li><a class="active" href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">Next</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection
