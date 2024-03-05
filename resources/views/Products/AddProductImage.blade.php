@extends('layouts.master')


@section('content')
    <div class="container mt-5 mb-5" style="text-align:center">


        <form action="/storeProductImage" method="post" enctype="multipart/form-data" >
            @csrf
            <div class="row mt-5 mb-5">
                <input type="hidden" style="width: 100%" name="product_id" id="product_id" value="{{ $product->id }}">



                <div class="col-9  pt-3">
                    <input type="file" class="form-control" name="photo" id="photo">
                </div>

                <div class="col-3">
                    <input type="submit" class="w-100" value="حفظ">
                </div>

                <span class="text-danger">
                    @error('photo')
                        {{ $message }}
                    @enderror
                </span>
            </div>
        </form>





        <div class="row">
            @foreach ($productImages as $item)
                <div class="col-4">
                    <img class="m-2" src="{{ asset($item->image_path) }}" width="300" height="300" alt="">
                    
                    <a href="/removeproductphoto/{{ $item->id }}" class="btn btn-danger">
                        <i class="fas fa-trash"></i>
                        حذف الصورة
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
