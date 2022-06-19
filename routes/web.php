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

Route::get('/', [App\Http\Controllers\PageController::class, 'homepage'])->name('homepage');

Auth::routes();

// route web
Route::get('/homeuser', [App\Http\Controllers\WebController\HomeuserController::class, 'index'])->name('home.buyer');
Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);

    // router for buyer here
    Route::get('index2', [App\Http\Controllers\WebController\HomeuserController::class, 'index2'])->name('firstpage');
    // carts
    Route::resource('/carts', App\Http\Controllers\WebController\CartController::class);
    Route::get('updateqty/{id}', [App\Http\Controllers\WebController\CartController::class, 'updateqty']);
    Route::get('chekedcart/{id}', [App\Http\Controllers\WebController\CartController::class, 'chekedcart']);
    // product
    Route::resource('/infoproducts', App\Http\Controllers\WebController\InfoProductController::class);
    // profile
    Route::resource('/profiles', App\Http\Controllers\WebController\ProfileController::class);
    // address

    Route::resource('/address', App\Http\Controllers\WebController\AddressController::class);

    Route::resource('/wishlists', App\Http\Controllers\WebController\WishlistController::class);
    // payment
    Route::resource('/payments', App\Http\Controllers\WebController\PaymentController::class);
    // transactions
    Route::resource('/transactions', App\Http\Controllers\WebController\TransactionController::class);



    
    
});


// route cms
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function() {

    // product
    Route::resource('/products', App\Http\Controllers\CmsController\ProductController::class);
    Route::get('products/edit/{id}', [App\Http\Controllers\CmsController\ProductController::class, 'edit']);
    Route::get('products/delete/{id}', [App\Http\Controllers\CmsController\ProductController::class, 'destroy']);
    // Route::get('products/edit/image/{id}', [App\Http\Controllers\CmsController\ProductController::class, 'editImage']);
    // Route::post('products/update/image', [App\Http\Controllers\CmsController\ProductController::class, 'updateImage']);

    // product Category
    Route::resource('/productcategories', App\Http\Controllers\CmsController\ProductCategoryController::class);
    Route::get('productcategories/edit/{id}', [App\Http\Controllers\CmsController\ProductCategoryController::class, 'edit']);
    Route::get('productcategories/delete/{id}', [App\Http\Controllers\CmsController\ProductCategoryController::class, 'destroy']);
    Route::get('showview', [App\Http\Controllers\CmsController\ProductCategoryController::class, 'showview']);
    Route::get('sendtoajax', [App\Http\Controllers\CmsController\ProductCategoryController::class, 'sendtoajax']);

    // Product Images
    Route::resource('/productimages', App\Http\Controllers\CmsController\ProductImageController::class);
    Route::get('productimages/edit/{id}', [App\Http\Controllers\CmsController\ProductImageController::class, 'edit']);
    Route::get('productimages/delete/{id}', [App\Http\Controllers\CmsController\ProductImageController::class, 'destroy']);

    // Transaction
    Route::resource('/transaction', App\Http\Controllers\CmsController\TransactionController::class);
    Route::get('viewitem/{id}', [App\Http\Controllers\CmsController\TransactionController::class, 'viewitem']);    
    Route::post('/transaction/updatestatus', [App\Http\Controllers\CmsController\TransactionController::class, 'updatestatus']);
    Route::get('viewpayment/{id}', [App\Http\Controllers\CmsController\TransactionController::class, 'viewpayment']);
    Route::post('/payment/payupdatestatus', [App\Http\Controllers\CmsController\TransactionController::class, 'payupdatestatus']);
    Route::post('payment/payupdatestatus/cancelled', [App\Http\Controllers\CmsController\TransactionController::class, 'statuscancel']);

    // Report
    Route::get('/report/transaction/journal', [App\Http\Controllers\CmsController\ReportController::class, 'transactionjournallist']);
    Route::get('/report/transaction/loadjournal', [App\Http\Controllers\CmsController\ReportController::class, 'loadjournallist']);
    Route::get('/report/transaction/journal/print', [App\Http\Controllers\CmsController\ReportController::class, 'transactionprint']);
    Route::get('/report/transaction/cancellation', [App\Http\Controllers\CmsController\ReportController::class, 'cancellationjournal']);
    Route::get('/report/transaction/loadcancellation', [App\Http\Controllers\CmsController\ReportController::class, 'loadcancellationjournal']);
    Route::get('/report/transaction/cancellation/print', [App\Http\Controllers\CmsController\ReportController::class, 'cancellationprint']);

    // Profile
    Route::resource('/getprofile', App\Http\Controllers\CmsController\ProfileController::class);
    Route::post('/getprofile/updateaddress', [App\Http\Controllers\CmsController\ProfileController::class, 'updateAddress']);
    Route::post('/getprofile/updateuser', [App\Http\Controllers\CmsController\ProfileController::class, 'updateUser']);

    // Bank Account
    Route::resource('/bankaccount', App\Http\Controllers\CmsController\BankAccountController::class);
});
