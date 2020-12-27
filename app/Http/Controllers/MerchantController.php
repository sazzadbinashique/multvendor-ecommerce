<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MerchantController extends Controller
{
    public function registerView(){

        return view('auth.sellerRegister');
    }


    public function createNewRegister(Request  $request){

        $request->validate([
            'name'      => 'required|string',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|confirmed',
            'shop_name' => 'required',
            'licence'   => 'required',
            'logo'      => 'required|image',
            'phone'    => 'required',
            'address'   => 'required',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->role_id = 2;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        $user->id;

        $shop = new Shop;
        $shop->user_id = $user->id;
        $logo_image = $request->logo;
        $logo_image_new_name = time() . $logo_image->getClientOriginalName();
        $logo_image->move('uploads/shops', $logo_image_new_name);
        $shop->shop_name = $request->shop_name;
        $shop->licence = $request->licence;
        $shop->phone = $request->phone;
        $shop->address = $request->address;
        $shop->logo = 'uploads/shops/' . $logo_image_new_name;

        $shop->save();


        return redirect()->route('login');
    }



    public function shopProfile(){

        $user = Auth::user();
        $shops = Shop::where('user_id', $user->id)->limit(1)->get();

        return view('merchant.shopProfile', compact('user', 'shops'));
    }
}
