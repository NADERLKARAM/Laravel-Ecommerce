<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\CreateProductReques;

class ProductController extends Controller
{



    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }



    public function index(Request $request)
    {
        $searchKey = $request->input('searchkey');
        $perPage =30; // You can adjust the number of items per page as needed

        if ($searchKey) {
            // Use paginate method for pagination
            $products = Product::where('name', 'LIKE', "%$searchKey%")
                ->orWhere('description', 'LIKE', "%$searchKey%")
                ->orWhere('price', 'LIKE', "%$searchKey%")
                ->paginate($perPage);
        } else {
            // Use paginate method for pagination
            $products = Product::paginate($perPage);
        }

        return view('Products.index', compact('products'));
    }




   public function create(){
    $allcategories = Category::all();
    return view("Products.addProduct", ['categories' => $allcategories]);
   }


   function  store(CreateProductReques $request){

    $validatedData = $request->validated();

    $imagePath = $request->file('image')->storeAs('product_images', uniqid() . '.' . $request->file('image')->extension(), 'public');

    $validatedData['image'] = $imagePath;

    Product::create($validatedData);

    return redirect()->route('products.index')->with('success', 'Product created successfully');

}


public function edit(Product $product)
{

    $categories = Category::all();
    return view('Products.editproduct', compact('product', 'categories'));
}



public function update(UpdateProductRequest $request, Product $product)
{

    $validatedData = $request->validated();

    if ($request->hasFile('image')) {
        // Delete old image (if exists) before storing the new one
        Storage::disk('public')->delete($product->image);

        $imagePath = $request->file('image')->storeAs('product_images', uniqid() . '.' . $request->file('image')->extension(), 'public');
        $validatedData['image'] = $imagePath;
    }

    $product->update($validatedData);

    return redirect()->route('products.index')->with('success', 'Product updated successfully');
}



public function destroy(Product $product)
{
    $product->delete();

    return redirect()->route('products.index')->with('success', 'Product deleted successfully');
}


public  function ProductsTable()
{
    $products = Product::all();
    return view('Products.ProductsTable', ['products' => $products]);
}
}
