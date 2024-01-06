<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;


Route::get('/',[HomeController::class,'home']);
Route::get('/about',[HomeController::class,'about']);
Route::get('/shop',[HomeController::class,'shop'])->name('shop'); 
Route::get('/shop-single/{id}',[HomeController::class,'shop_single']);
Route::get('/contact',[HomeController::class,'contact']);
Route::get('/home',[HomeController::class,'index']) -> middleware('auth')->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::post('/add_cart/{id}',[HomeController::class,'add_cart']);
Route::get('/show_cart',[HomeController::class,'show_cart']);
Route::get('/remove_item/{id}',[HomeController::class,'remove_item']);
Route::get('/cash_order',[HomeController::class,'cash_order']);
Route::get('/stripe/{total}',[HomeController::class,'stripe']);
Route::post('stripe/{total}',[HomeController::class,'stripePost'])->name('stripe.post');

Route::get('/show_order',[HomeController::class,'show_order']);
Route::get('/cancel_order/{id}',[HomeController::class,'cancel_order']);
Route::get('/shop_product_search',[HomeController::class,'shop_product_search']);


Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/view_catagory', [AdminController::class, 'view_catagory']);
    Route::post('/add_catagory', [AdminController::class, 'add_catagory']);
    Route::get('/delete_catagory/{id}', [AdminController::class, 'delete_catagory']);

    Route::get('/view_product', [AdminController::class, 'view_product']);
    Route::post('/add_product', [AdminController::class, 'add_product']);
    Route::get('/show_product', [AdminController::class, 'show_product']);
    Route::get('/delete_product/{id}', [AdminController::class, 'delete_product']);
    Route::get('/update_product/{id}', [AdminController::class, 'update_product']);
    Route::post('/update_product_confirm/{id}', [AdminController::class, 'update_product_confirm']);

    Route::get('/order', [AdminController::class, 'order']);
    Route::get('/delivered/{id}', [AdminController::class, 'delivered']);
    Route::get('/search', [AdminController::class, 'orderproduct']);
    Route::get('/admin_product_search', [AdminController::class, 'admin_product_search']);
});




require __DIR__.'/auth.php';
