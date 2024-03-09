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




    public function create()
    {
        return view('categories.addCategory');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // adjust the allowed file types and size as needed
        ]);

        // Upload the image and store the file path in the database
        $imagePath = $request->file('image')->store('category_images', 'public');
        $data['image'] = $imagePath;

        Category::create($data);

        return redirect('/categories/create');
    }



    public function GetAllCategorywithProducts()
    {
        $Categories=  Category::all();
        $products = Product::all();

           return view('categories.category', ['categories'=>  $Categories, 'products'=> $products]);
       }
       }