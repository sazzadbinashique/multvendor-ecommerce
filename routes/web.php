<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Merchant\MerchantController;
use App\Http\Controllers\ShoppingController;
use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\FrontEndController;
use \App\Http\Controllers\Admin\BackEndController;
use \App\Http\Controllers\SslCommerzPaymentController;
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

Route::get('redirectTo', [HomeController::class, 'index']);

Route::get('/', [ FrontEndController::class, 'index']);


// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END


Route::get('/about-us', [ FrontEndController::class, 'aboutUs'])->name('about');
Route::get('/privacy-policy', [ FrontEndController::class, 'privacyPolicy'])->name('privacy');
Route::get('/terms-and-condition', [ FrontEndController::class, 'termAndCondition'])->name('term.condition');
Route::get('/return-policy', [ FrontEndController::class, 'returnPolicy'])->name('return.policy');
Route::get('/contact-us', [ FrontEndController::class, 'contactUs'])->name('contact');

Route::get('/categories', [ FrontEndController::class, 'shopCategory'])->name('shop.category');
Route::get('/shops', [ FrontEndController::class, 'allShop'])->name('shops');
Route::get('/shop/{alias}', [ FrontEndController::class, 'shopByStore'])->name('shop.store');
Route::get('/brands', [ FrontEndController::class, 'allBrand'])->name('brands');
Route::get('/brand/{alias}', [ FrontEndController::class, 'brandByStore'])->name('brand.store');

Route::get('/seller/register', [ MerchantController::class, 'registerView'])->name('seller.register');
Route::post('/seller/createNewRegister', [ MerchantController::class, 'createNewRegister'])->name('seller.new.register');

Route::get('/product/{alias}', [ FrontEndController::class, 'singleProduct'])->name('single.product');

Route::get('/cart', [ShoppingController::class, 'cart'])->name('cart');
Route::post('/cart/add', [ShoppingController::class, 'add_to_cart'])->name('cart.add');
Route::get('/cart/delete/{id}', [ShoppingController::class, 'cart_delete'])->name('cart.delete');
Route::get('/cart/incr/{id}/{qty}', [ShoppingController::class, 'incr'])->name('cart.incr');
Route::get('/cart/decr/{id}/{qty}', [ShoppingController::class, 'decr'])->name('cart.decr');
Route::get('/cart/rapid/add/{id}', [ShoppingController::class, 'rapid_add'])->name('cart.rapid.add');

Route::get('/cart/checkout', [CheckoutController::class, 'index'])->name('cart.checkout');

Route::post('/order', [\App\Http\Controllers\OrderController::class, 'orderPlace'])->name('order.place');
Route::get('/thanks', [FrontEndController::class, 'thankYou'])->name('thank.you');






/*Admin Route*/

Route::group(['prefix'=>'admin', 'middleware'=>['auth', 'admin'], 'as'=>'admin.'], function (){

    Route::get('/dashboard', [ BackEndController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ BackEndController::class, 'profile'])->name('profile');
    Route::post('/update/profile', [BackEndController::class, 'updateProfile'])->name('update.profile');
    Route::post('/update/password/', [BackEndController::class, 'updatePassword'])->name('updatePassword');

    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('shops', App\Http\Controllers\Admin\ShopController::class);
    Route::resource('brands', App\Http\Controllers\Admin\BrandController::class);
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('products', App\Http\Controllers\Admin\ProductController::class);
    Route::resource('sliders', App\Http\Controllers\Admin\SliderController::class);
    Route::resource('banners', App\Http\Controllers\Admin\BannerController::class);

});


/*Merchant or Seller route*/
Route::group(['prefix'=>'merchant', 'middleware'=>['merchant'] ,'as'=>'merchant.'], function (){

    Route::get('/dashboard', [ MerchantController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [ MerchantController::class, 'profile'])->name('profile');
    Route::post('/update/profile', [MerchantController::class, 'updateProfile'])->name('update.profile');
    Route::get('/shop/profile', [ MerchantController::class, 'shopProfile'])->name('shop.profile');
    Route::post('/update/shop/profile', [ MerchantController::class, 'shopUpdateProfile'])->name('update.shop.profile');
    Route::post('/update/password/', [MerchantController::class, 'updatePassword'])->name('updatePassword');

    Route::resource('brands', App\Http\Controllers\Merchant\BrandController::class);
    Route::resource('categories', App\Http\Controllers\Merchant\CategoryController::class);
    Route::resource('products', App\Http\Controllers\Merchant\ProductController::class);
});

/*User Route*/
Route::group(['middleware'=>[ 'auth', 'user', 'verified']], function (){

    Route::get('/dashboard', [ FrontEndController::class, 'index'])->name('frontend.dashboard');
    Route::get('/profile', [FrontEndController::class, 'profile'])->name('user.profile');
    Route::post('/update/profile', [FrontEndController::class, 'updateProfile'])->name('user.updateProfile');
    Route::get('/change/password', [FrontEndController::class, 'changePassword'])->name('user.changePassword');
    Route::post('/update/password/', [FrontEndController::class, 'updatePassword'])->name('user.updatePassword');

});







