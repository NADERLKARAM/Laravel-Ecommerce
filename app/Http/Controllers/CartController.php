<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{

    public function index(){
        $user_id = auth()->user() -> id;
        $cartProducts = Cart::with('Product')->where('user_id', $user_id)->get();
        return view('cart.index',['products' => $cartProducts]);
    }





    public function addToCart(Product $product)
    {
        $user_id = auth()->id(); // Use auth()->id() to get the authenticated user's ID

        // Use relationships to simplify the code
        $userCart = Cart::where('user_id', $user_id)->where('product_id', $product->id)->first();

        if ($userCart) {
            // Increment quantity if the product is already in the cart
            $userCart->quantity += 1;
            $userCart->save();
        } else {
            // Add the product to the cart if not already present
            $userCart = new Cart([
                'user_id' => $user_id,
                'product_id' => $product->id,
                'quantity' => 1,
            ]);
            $userCart->save();
        }

        return redirect()->route('cart.index');
    }



    public function removeFromCart(Product $product)
    {
        $user_id = auth()->id();

        // Find and delete the specific product from the user's cart
        Cart::where('user_id', $user_id)->where('product_id', $product->id)->delete();

        return redirect()->route('cart.index')->with('success', 'Product removed from cart successfully');
    }
}