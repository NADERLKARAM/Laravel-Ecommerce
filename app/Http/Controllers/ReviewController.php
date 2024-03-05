<?php

namespace App\Http\Controllers;
use  App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public  function reviews()
    {
        $reviews = Review::all();
        return view('Reviews.addReview', ['reviews' => $reviews]);
    }


    public  function storeReview(Request $request)
    {
        $request->validate([
            'name' =>  ['required',  'max:100'],
            'phone' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $newReview = new Review();
        $newReview->name = $request->name;
        $newReview->phone = $request->phone;
        $newReview->subject = $request->subject;
        $newReview->email = $request->email;
        $newReview->message = $request->message;
        $newReview->save();


        return redirect('/review');
    }
}
