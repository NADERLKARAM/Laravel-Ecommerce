<?php


use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\ReviewController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AddProductImagesController;
use App\Http\Controllers\OrderController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




//.................................
Route::get('/', [CategoryController::class, 'MainPage']);
Route::get('/category', [CategoryController::class, 'GetAllCategorywithProducts']);
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create')->middleware('admin');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store')->middleware('admin');



Route::get('/category/products/{categoryID}', [ProductController::class, 'getAllProductsWithCategoryID'])->name('category.products');



//...................................
Route::get('/review',[ReviewController::class,'reviews']);
Route::post('/storeReview',[ReviewController::class,'storeReview']);




//........................
Route::prefix('/products')->group(function () {
    Route::get('/productTable', [ProductController::class, 'ProductsTable'])->name('myTable')->middleware('admin');
    Route::get('/create', [ProductController::class, 'create'])->name('products.create')->middleware('admin');
    Route::post('/', [ProductController::class, 'store'])->name('products.store')->middleware('admin');
    Route::get('/', [ProductController::class, 'index'])->name('products.index');
    Route::get('/{product}', [ProductController::class, 'showProduct'])->name('products.show');
    Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('products.edit')->middleware('admin');
    Route::put('/{product}', [ProductController::class, 'update'])->name('products.update')->middleware('admin');
    Route::delete('/delete/{product}', [ProductController::class, 'destroy'])->name('products.destroy')->middleware('admin');
});



//.................................................................
Route::get('/AddProductImages/{productid}', [AddProductImagesController::class, 'AddProductImages'])->middleware('admin');
Route::post('/storeProductImage',[AddProductImagesController::class,'storeProductImage'])->middleware('admin');
Route::get('/removeproductphoto/{imageid?}', [AddProductImagesController::class, 'Removeproductphoto'])->middleware('admin');



//.....................................................................
Route::get('/cart', [CartController::class, 'index'])->name('cart.index')->middleware('auth');
Route::post('/cart/add/{product}', [CartController::class, 'addToCart'])->name('cart.add')->middleware('auth');
Route::delete('/cart/remove/{product}', [CartController::class, "removeFromCart"])->name('cart.remove');















Route::get('/Completeorder', [OrderController::class, 'showCompleteorder'])->middleware('auth');
Route::post('/StoreOrder', [OrderController::class, 'storeOrder'])->name('store.order')->middleware('auth');
Route::get('/getAllOrders', [OrderController::class, 'getAllOrders']);
Route::get('/getAllOrdersWithUserAuth', [OrderController::class, 'getAllOrdersWithUserAuth']);