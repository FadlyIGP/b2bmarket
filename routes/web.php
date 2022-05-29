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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group( function () {
    // product
    Route::resource('/products', App\Http\Controllers\ProductController::class);
    Route::get('products/edit/{id}', [App\Http\Controllers\ProductController::class, 'edit']);
    // product Category
    Route::resource('/productcategories', App\Http\Controllers\ProductCategoryController::class);

});
