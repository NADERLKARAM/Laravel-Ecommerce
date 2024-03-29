@extends('layouts.master')


@section('content')


        <div class="product-section mt-150 mb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="section-title">
                            <h3><span class="orange-text">Add</span> Products </h3>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 mb-5 mb-lg-0">
                        <div class="form-title">
                        </div>
                        <div id="form_status"></div>
                        <div class="contact-form">


                                <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data"style="text-align:right"  dir="rtl">
                                    @csrf
                                <p>
                                    <input type="text" style="width: 100%" required placeholder="الاسم" name="name"
                                        id="name" value="{{ old('name') }}">
                                    <span class="text-danger">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </p>


                                <p>
                                    <textarea name="description" required id="description" cols="30" rows="10" placeholder="description">

                                  {{ old('description') }}

                                </textarea>

                                </p>
                                <span class="text-danger">
                                    @error('description')
                                        {{ $message }}
                                    @enderror
                                </span>


                                <p>
                                    <input type="file" class="form-control" name="image" id="image">

                                    <span class="text-danger">
                                        @error('image')
                                            {{ $message }}
                                        @enderror
                                    </span>

                                </p>
                                <p><input type="submit" value="حفظ"></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>





@endsection
