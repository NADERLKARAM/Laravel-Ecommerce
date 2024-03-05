@extends('layouts.master')


@section('content')


{{-- <img src="data:image/svg+xml;base64,{{ base64_encode($qrCode) }}" class="m-5" alt="QR Code"> --}}

{{-- <div class="m-5">
{!! $barcode !!}
</div> --}}



    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">تعديل </span> المنتج</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 mb-5 mb-lg-0">
                    <div class="form-title">
                    </div>
                    <div id="form_status"></div>
                    <div class="contact-form">


                        <form method="post" enctype="multipart/form-data" action="{{ route('products.update', $product) }}" style="text-align: right" dir="rtl">
                            @csrf()
                            @method("PUT")
                            <p>

                                <input type="hidden" style="width: 100%" required placeholder="" name="id"
                                id="id" value="{{ $product->id }}">

                                <input type="text" style="width: 100%" required placeholder="الاسم" name="name"
                                    id="name" value="{{ $product->name }}">
                                <span class="text-danger">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </p>

                            <p style="display: flex; ">

                                <input type="number" style="width: 50%" required class="ml-4" placeholder="السعر"
                                    name="price" value="{{ $product->price }}" id="price">
                                <span class="text-danger">
                                    @error('price')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <input type="number" style="width: 50%" required
                                value="{{ $product->quantity }}"
                                    placeholder="الكمية" name="quantity" id="quantity">
                                <span class="text-danger">
                                    @error('quantity')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </p>

                            <p>
                                <textarea name="description" required id="description" cols="30" rows="10" placeholder="description">

                                  {{ $product->description }}

                                </textarea>

                            </p>
                            <span class="text-danger">
                                @error('description')
                                    {{ $message }}
                                @enderror
                            </span>
                            <p>
                                <select class="form-control" required name="category_id" id="category_id">
                                    @foreach ($categories as $item)
                                        @if ($item->id == $product->category_id)
                                            <option value="{{ $item->id }}" selected> {{ $item->name }} </option>
                                        @else
                                            <option value="{{ $item->id }}"> {{ $item->name }} </option>
                                        @endif
                                    @endforeach
                                </select>

                                <span class="text-danger">
                                    @error('category_id')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </p>




                            <input type="file" class="form-control" name="image" id="image">
                            <span class="text-danger">
                                @error('image')
                                    {{$message}}
                                @enderror
                            </span>

                            <p><input type="submit" value="حفظ"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
