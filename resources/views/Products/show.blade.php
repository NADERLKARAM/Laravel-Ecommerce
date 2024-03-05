@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ $product->name }}
                    </div>
                    <div class="card-body">
                        <p>description :{{ $product->description }}</p>
                        <p>Price: ${{ $product->price }}</p>

                        {{-- You can also add images, features, or any other relevant information --}}

                        <div class="product-image">
                            <a href="single-product.html"><img src="assets/img/dd.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
