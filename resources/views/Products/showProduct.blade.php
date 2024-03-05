@extends('layouts.master')


@section('content')





<div class="single-product mt-150 mb-150">
    <div class="container">
        <div class="section-title text-center">
            <h3><span class="orange-text">Product</span> Details</h3>
        </div>
        <div class="row">

            <div class="col-md-6">
                <div class="testimonial-sliders">


                    @foreach ($product->images as $item)
                    <div class="single-testimonial-slider">
                        <div class="client-avater">
                            <img style="width: 50%; height: 500px;max-width:none !important;border:black 5px;border-radius:5px 100px !important" src="{{asset($item -> image_path)}}" alt="">
                        </div>
                        <div class="client-meta">

                        </div>
                    </div>
                @endforeach


                </div>
            </div>



            <div class="col-md-3" style="margin-top: 140px ">
                <div class="single-product-img">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="">
                </div>
            </div>
            <div class="col-md-3" style="margin-top: 140px ">
                <div class="single-product-content">
                    <h3>{{$product -> name}}</h3>
                    <h4>القسم : {{$product -> Category -> name}}</p>
                    <p class="single-product-pricing"><span>الكمية : {{$product -> quantity}}</span> $ {{$product -> price}}</p>
                    <p>{{$product -> description}}</p>
                    <div class="single-product-form">

                        <a href="/cart" onclick="event.preventDefault(); document.getElementById('add-to-cart-form-{{ $product->id }}').submit();" class="cart-btn">
                            <i class="fas fa-shopping-cart"></i>
                            اضافة الى السلة
                        </a>

                        <form id="add-to-cart-form-{{ $product->id }}" method="POST" action="{{ route('cart.add', $product->id) }}" style="display: none;">
                            @csrf
                            <!-- Include any other form fields if needed -->
                        </form>


                    </div>

                </div>
            </div>




        </div>
    </div>
</div>
<div class="container">
    <div class="section-title text-center">
        <h3><span class="orange-text">Related</span> Products</h3>

    </div>
<div class="row">



    @foreach ($relatedProducts as $item)
    <div class="col-lg-4 col-md-6 text-center">
        <div class="single-product-item">
            <div class="product-image">
                <a href="/single-product/{{$item->id}}"><img style="max-height: 250px;min-height:250px"
                        src="{{ asset('storage/' . $item->image) }}" alt=""></a>
            </div>
            <h3>{{ $item->name }}</h3>
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




            <p class="mt-3">

            </p>

        </div>
    </div>
@endforeach

</div>
</div>





@endsection
