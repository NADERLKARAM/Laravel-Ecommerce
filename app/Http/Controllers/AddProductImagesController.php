<?php

namespace App\Http\Controllers;

use App\Models\ProductImage;
use App\Models\Product;

use Illuminate\Support\Str;

use Illuminate\Http\Request;

class AddProductImagesController extends Controller
{
    public  function AddProductImages($productid)
    {
        $product = Product::find($productid);

        $productImages = ProductImage::where('product_id', $productid)->get();

        return view('Products.AddProductImage', ['product' => $product, 'productImages' => $productImages]);
    }



    public  function storeProductImage(Request $request)
    {

        $request->validate([
            'product_id' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        $photo = new ProductImage();
        $photo->product_id = $request->product_id;


        if ($request->has('photo')) {
            $path = $request->photo->move(
                'product_images',
                Str::uuid()->toString() . '-' . $request->photo->getClientOriginalName()
            );

            $photo->image_path =  $path;
        }else{
            return back()->with('error','the photo is required');
        }

        $photo->save();

        return back();
    }



    public  function Removeproductphoto($imageid = null)
    {

        $photo = ProductImage::find($imageid);
        $photo->delete();

        return back();
    }


}
