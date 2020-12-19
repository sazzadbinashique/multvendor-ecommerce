<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{

    public function index(){

        $products = Product::orderBy('id', 'asc')->limit(10)->get();
        $latestProducts = Product::orderBy('id', 'desc')->limit(10)->get();

        $categoryProducts = Product::orderBy('category_id')->get();


        return view('frontend.index', compact('products', 'latestProducts', 'categoryProducts'));
    }

    public function singleProduct($alias){

        $product = Product::where('alias', $alias)->first();

//        dd($product['alias']);

        return view('frontend.single', compact('product'));
    }
}
