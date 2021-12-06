<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\RatingController;
use App\Http\Controllers\Frontend\ReviewController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\WishlistController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[FrontendController::class, 'index']);
Route::get('category',[FrontendController::class, 'category']);
Route::get('category/{slug}',[FrontendController::class, 'viewcategory']);
Route::get('category/{cate_slug}/{prod_slug}',[FrontendController::class, 'productView']);

Auth::routes();


Route::get('load-cart-count', [CartController::class, 'cartCount']);
Route::get('load-wishlist-count', [WishlistController::class, 'wishlistCount']);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('add-to-cart', [CartController::class, 'addProduct']);
Route::post('del-cart-item', [CartController::class, 'deleteProduct']);
Route::post('update-cart', [CartController::class, 'updateCart']);

Route::post('add-to-wishlist', [WishlistController::class, 'add']);
Route::post('del-wishlist-item', [WishlistController::class, 'deleteItem']);

Route::middleware(['auth'])->group(function () {
    Route::get('cart', [CartController::class, 'viewCart']);
    Route::get('checkout', [CheckoutController::class, 'index']);
    Route::post('place-order', [CheckoutController::class, 'placeOrder']);

    Route::get('my-orders', [UserController::class, 'index']);
    Route::get('view-order/{id}', [UserController::class, 'view']);

    Route::post('add-rating', [RatingController::class, 'add']);

    Route::get('add-review/{product_slug}/userreview',[ReviewController::class, 'add']);
    Route::post('add-review', [ReviewController::class, 'create']);
    Route::get('edit-review/{product_slug}/userreview', [ReviewController::class, 'edit']);
    Route::put('update-review', [ReviewController::class, 'update']);

    Route::get('wishlist', [WishlistController::class, 'index']);
    
    Route::post('proceed-to-pay', [CheckoutController::class, 'mpesaCheck']);

});

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', 'Admin\FrontendController@index'); 
    
    Route::get('categories', 'Admin\CategoryController@index'); 
    Route::get('add-category', 'Admin\CategoryController@add');
    Route::post('insert-category', 'Admin\CategoryController@insert');
    Route::get('edit-category/{id}', [CategoryController::class,'edit']);
    Route::put('update-category/{id}', [CategoryController::class,'update']);
    Route::get('delete-category/{id}', [CategoryController::class,'destroy']);

    Route::get('products',[ProductController::class, 'index']);
    Route::get('add-products',[ProductController::class, 'add']);
    Route::post('insert-product',[ProductController::class, 'insert']);
    Route::get('edit-product/{id}',[ProductController::class, 'edit']);
    Route::put('update-product/{id}',[ProductController::class, 'update']);
    Route::get('delete-product/{id}', [ProductController::class,'destroy']);

    Route::get('orders', [OrderController::class, 'index']);
    Route::get('admin/view-order/{id}', [OrderController::class, 'view']);
    Route::put('update-order/{id}', [OrderController::class, 'updateOrder']);

    Route::get('order-history', [OrderController::class, 'orderHistory']);

    Route::get('users', [DashboardController::class, 'users']);
    Route::get('view-user/{id}', [DashboardController::class, 'viewUser']);

       
});





