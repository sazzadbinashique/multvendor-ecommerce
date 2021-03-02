<?php

namespace App\Http\Controllers\Merchant;

use File;
use Session;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;


class MerchantController extends Controller
{

    public function dashboard(){
        $total_categories = Category::count();
        $total_brands = Brand::count();
        $total_products = Product::count();
        return view('merchant.dashboard', compact('total_categories', 'total_brands', 'total_products'));
    }

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
//        $user = User::firstOrNew(['email' =>  request('email')]);
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
        $str = strtolower($request->shop_name);

        $shop->shop_name = $request->shop_name;
        $shop->alias = preg_replace('/\s+/', '-', $str);
        $shop->licence = $request->licence;
        $shop->phone = $request->phone;
        $shop->address = $request->address;
        $shop->logo = 'uploads/shops/' . $logo_image_new_name;

        $shop->save();

        Session::flash('success', 'Merchant Shop has been Created Successfully');

        return redirect()->route('login');
    }



    public function shopProfile(){

        $user = Auth::user();
        $shops = Shop::where('user_id', $user->id)->limit(1)->get();

        return view('merchant.shopProfile', compact('user', 'shops'));
    }


    public function profile(){

        $user = Auth::user();
        return view('merchant.profile', compact('user'));
    }


    public function updateProfile(Request  $request){

        $request->validate([
            'name'      => 'required|string',
        ]);
        $user = Auth::user();
        /*
                if ($request->hasFile('avatar')) {

                    dd('sdfsdf');
                }*/
        $logo_image = $request->avatar;
        if (!empty($logo_image)){
            $logo_image_new_name = time() . $logo_image->getClientOriginalName();
            $logo_image->move('uploads/users', $logo_image_new_name);
            $user->avatar = 'uploads/users/' . $logo_image_new_name;

        }
        $user->name = $request->name;
        $user->save();

        Session::flash('success', 'Merchant Profile has been Updated Successfully');

        return redirect()->back();
    }

    public function updatePassword(Request  $request){
        $request->validate([
            'password' => 'required|min:8|confirmed',
            'password_confirmation'     => 'required',
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->update();

        Session::flash('success', 'Merchant password has been Updated Successfully');

        return redirect()->back();
    }


    public function shopUpdateProfile(Request  $request){

//        dd($request->all());
        $request->validate([
            'shop_name'      => 'required|string',
            'licence'      => 'required',
            'phone'      => 'required',
            'address'      => 'required',
        ]);
        $user = Auth::user();
        $shop = Shop::where('user_id', $user->id)->first();

        if(request()->hasFile('logo') && request('logo') != ''){
            $imagePath = public_path($shop->logo);

            if(File::exists($imagePath)) {
                File::delete($imagePath);
//                 unlink($imagePath);
            }
            $logo_image = $request->logo;
            $logo_image_new_name = time() . $logo_image->getClientOriginalName();
            $logo_image->move('uploads/shops', $logo_image_new_name);
            $shop->logo = 'uploads/shops/' . $logo_image_new_name;
        }
        $shop->shop_name = $request->shop_name;
        $shop->licence = $request->licence;
        $shop->phone = $request->phone;
        $shop->address = $request->address;
        $shop->save();

        Session::flash('success', 'Merchant shop has been Updated Successfully');

        return redirect()->back();

    }
}
