<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
   public function showCompleteorder()    {
    $user_id = auth()->user() -> id;
    $cartProducts = Cart::with('Product')->where('user_id', $user_id)->get();

    return view('orders.showCompleteorder',['cartProducts' => $cartProducts]);
}


public function storeOrder(StoreOrderRequest $request)
{
    $user_id = auth()->user()->id;

    // Retrieve cart products for the user
    $cartProducts = Cart::with('Product')->where('user_id', $user_id)->get();

    // Check if there are any products in the cart before proceeding
    if ($cartProducts->isEmpty()) {
        // If cart is empty, return an error response or redirect with an error message
        return back()->with('error', 'Your cart is empty. Please add products before placing an order.');
    }

    // Create a new order
    $newOrder = new Order();
    $newOrder->name = $request->name;
    $newOrder->address = $request->address;
    $newOrder->email = $request->email;
    $newOrder->phone = $request->phone;
    $newOrder->note = $request->note;
    $newOrder->user_id = $user_id;

    $newOrder->save();

    // Loop through cart products and create order details
    foreach ($cartProducts as $item) {
        $newOrderDetail = new OrderDetail();
        $newOrderDetail->product_id = $item->product_id;
        $newOrderDetail->price = $item->Product->price;
        $newOrderDetail->quantity = $item->quantity;
        $newOrderDetail->order_id = $newOrder->id;
        $newOrderDetail->save();
    }

    // Clear the user's cart after creating order details
    Cart::where('user_id', $user_id)->delete();

    return redirect('/')->with('success', 'Order placed successfully!');
}




}