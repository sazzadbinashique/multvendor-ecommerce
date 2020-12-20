<?php

use App\Http\Controllers\ShoppingController;
use Illuminate\Support\Facades\Route;

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
Route::get('/product/{alias}', [ FrontEndController::class, 'singleProduct'])->name('single.product');

Route::get('/cart', [ShoppingController::class, 'cart'])->name('cart');
Route::post('/cart/add', [ShoppingController::class, 'add_to_cart'])->name('cart.add');

Route::get('/cart/delete/{id}', [ShoppingController::class, 'cart_delete'])->name('cart.delete');
Route::get('/cart/incr/{id}/{qty}', [ShoppingController::class, 'incr'])->name('cart.incr');
Route::get('/cart/decr/{id}/{qty}', [ShoppingController::class, 'decr'])->name('cart.decr');

Route::get('/cart/rapid/add/{id}', [ShoppingController::class, 'rapid_add'])->name('cart.rapid.add');


Route::get('/home', [ BackEndController::class, 'index'])->middleware('auth');


Route::resource('users', App\Http\Controllers\UserController::class);



