<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;


class FirstController extends Controller
{



 public   function Show() {


        $Result=  DB::table('categories')->get();

           return view('welcome', ['categories'=> $Result]);
       }





       public    function prod() {

        $Result=  Product::all();

        return view('product', ['products'=> $Result]);
    }

    public function cat() {


        $Result=  Category::all();

        $products = Product::all();

           return view('category', ['categories'=> $Result, 'products'=> $products]);
       }
}
