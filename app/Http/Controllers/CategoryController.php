<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Product;

use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public  function MainPage()
    {

        $categories = Category::all();
        return view('welcome', ['categories' => $categories]);
    }


    public function GetAllCategorywithProducts()
    {
        $Categories=  Category::all();
        $products = Product::all();

           return view('category', ['categories'=>  $Categories, 'products'=> $products]);
       }
       }
