<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\WebController\HomeuserController::class, 'index'])->name('home');

Auth::routes();

// route web
Route::get('/homeuser', [App\Http\Controllers\WebController\HomeuserController::class, 'index'])->name('home.buyer');
Route::middleware(['auth'])->group(function () {
    // router for buyer here
    Route::resource('/carts', App\Http\Controllers\WebController\CartController::class);
    Route::get('updateqty/{id}', [App\Http\Controllers\WebController\CartController::class, 'updateqty']);
    Route::get('chekedcart/{id}', [App\Http\Controllers\WebController\CartController::class, 'chekedcart']);
    

    


    

    
});


// route cms
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {
    // product
    Route::resource('/products', App\Http\Controllers\CmsController\ProductController::class);
    Route::get('products/edit/{id}', [App\Http\Controllers\CmsController\ProductController::class, 'edit']);
    // product Category
    Route::resource('/productcategories', App\Http\Controllers\CmsController\ProductCategoryController::class);
});
