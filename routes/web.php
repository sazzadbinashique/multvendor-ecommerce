<?php

use App\Http\Controllers\MerchantController;
use App\Http\Controllers\ShoppingController;
use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\FrontEndController;
use \App\Http\Controllers\BackEndController;
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
// FrontPage

Route::get('/', [ FrontEndController::class, 'index']);
Route::get('redirectTo', [HomeController::class, 'index']);

Route::get('/seller/register', [ \App\Http\Controllers\MerchantController::class, 'registerView'])->name('seller.register');
Route::post('/seller/createNewRegister', [ \App\Http\Controllers\MerchantController::class, 'createNewRegister'])->name('seller.new.register');

Route::get('/product/{alias}', [ FrontEndController::class, 'singleProduct'])->name('single.product');

Route::get('/cart', [ShoppingController::class, 'cart'])->name('cart');
Route::post('/cart/add', [ShoppingController::class, 'add_to_cart'])->name('cart.add');

Route::get('/cart/delete/{id}', [ShoppingController::class, 'cart_delete'])->name('cart.delete');
Route::get('/cart/incr/{id}/{qty}', [ShoppingController::class, 'incr'])->name('cart.incr');
Route::get('/cart/decr/{id}/{qty}', [ShoppingController::class, 'decr'])->name('cart.decr');

Route::get('/cart/rapid/add/{id}', [ShoppingController::class, 'rapid_add'])->name('cart.rapid.add');



/*Admin Route*/

Route::group(['prefix'=>'admin', 'middleware'=>['auth', 'admin']], function (){

    Route::get('/dashboard', [ BackEndController::class, 'index'])->name('admin.dashboard');
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('products', App\Http\Controllers\ProductController::class);

    Route::resource('categories', App\Http\Controllers\CategoryController::class);


});


/*Merchant or Seller route*/
Route::group(['prefix'=>'merchant', 'middleware'=>['auth', 'merchant']], function (){

    Route::get('/dashboard', [ BackEndController::class, 'dashboard'])->name('merchant.dashboard');

    Route::get('/profile', [ BackEndController::class, 'profile'])->name('profile');
    Route::post('/update/profile', [BackEndController::class, 'updateProfile'])->name('update.profile');

    Route::get('/shop/profile', [ MerchantController::class, 'shopProfile'])->name('shop.profile');
    Route::post('/update/shop/profile', [ MerchantController::class, 'updateProfile'])->name('update.shop.profile');


    Route::resource('categories', App\Http\Controllers\CategoryController::class);
    Route::resource('products', App\Http\Controllers\ProductController::class);
    /*Route::resource('shops', App\Http\Controllers\ShopController::class);*/
});


Route::group(['middleware'=>['auth', 'user']], function (){

    Route::get('/', [ FrontEndController::class, 'index'])->middleware('auth')->name('frontend.dashboard');

    Route::get('/profile', [FrontEndController::class, 'profile'])->name('user.profile');
    Route::post('/update/profile', [FrontEndController::class, 'updateProfile'])->name('user.updateProfile');
    Route::get('/change/password', [FrontEndController::class, 'changePassword'])->name('user.changePassword');
});







