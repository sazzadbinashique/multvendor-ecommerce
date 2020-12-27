<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontEndController extends Controller
{

    public function index(){

        $products = Product::orderBy('id', 'asc')->limit(10)->get();
        $latestProducts = Product::orderBy('id', 'desc')->limit(10)->get();
        $categoryProducts = Product::orderBy('category_id')->get();


        return view('frontend.index', compact('products', 'latestProducts', 'categoryProducts'));
    }

    public function profile(){

        $user = Auth::user();

        return view('user.profile', compact('user'));
    }

    public function updateProfile(Request  $request){

        $request->validate([
            'name'      => 'required',
            'email'     => 'required',
            'avatar'     => 'required',
        ]);
        $user = Auth::user();
        $user->avatar = $request->avatar;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->back();
    }


    public function changePassword(){

        return view('user.changePassword');
    }

    public function singleProduct($alias){

        $product = Product::where('alias', $alias)->first();

        return view('frontend.single', compact('product'));
    }
}
