<?php

namespace App\Http\Controllers;

use Cart;
use Session;
use App\Models\Product;
use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    public function add_to_cart(Request  $request){

        $pdt = Product::where( 'alias', request()->pdt_alias)->first();


        $cartItem = Cart::add([
            'id' => $pdt->id,
            'name' => $pdt->name,
            'qty' => request()->quantity,
            'price' => $pdt->price
        ]);
        $cartItem->associate('App\Models\Product');

//        dd($cartItem->model->image);

        return redirect()->route('cart');
    }

    public function cart(){

        return view('frontend.cart');
    }

    public function cart_delete($id){
        Cart::remove($id);

        Session::flash('success', 'Product removed from cart.');
        return redirect()->back();

    }

    public function incr($id, $qty){
        Cart::update($id, $qty + 1);

//        Session::flash('success', 'Product qunatity updated.');

        return redirect()->back();
    }
    public function decr($id, $qty){
        Cart::update($id, $qty - 1);

//        Session::flash('success', 'Product qunatity updated.');

        return redirect()->route('cart');
    }

    public function rapid_add($alias)
    {
        $pdt = Product::where( 'alias', $alias)->first();


        $cartItem = Cart::add([
            'id' => $pdt->id,
            'name' => $pdt->name,
            'qty' => 1,
            'price' => $pdt->price
        ]);

        Cart::associate($cartItem->rowId, 'App\Models\Product');

        Session::flash('success', 'Product added to cart.');

        return redirect()->back();
    }

}
