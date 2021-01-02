<?php

namespace App\Http\Controllers;
use App\Actions\Fortify\PasswordValidationRules;
use Illuminate\Support\Facades\Hash;
use Session;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontEndController extends Controller
{
    use PasswordValidationRules;

    public function index(){

        $products = Product::orderBy('id', 'asc')->limit(10)->get();
        $latestProducts = Product::orderBy('id', 'desc')->limit(10)->get();
        $categoryProducts = Product::orderBy('category_id')->get();
        $sliders= Slider::where('status', 1)->orderBy('id', 'desc')->limit(3)->get();
        $banners= Banner::where('status', 1)->where('position', 0)->orderBy('id', 'asc')->limit(3)->get();
        $bannerLongs = Banner::where('status', 1)->where('position', 1)->orderBy('id', 'asc')->limit(2)->get();

        return view('frontend.index', compact('products', 'latestProducts', 'categoryProducts', 'sliders', 'banners','bannerLongs'));
    }


    public function shop(){

        return view('frontend.shop');
    }

    public function profile(){

        $user = Auth::user();

        return view('user.profile', compact('user'));
    }

    public function updateProfile(Request  $request){

        $request->validate([
            'name'      => 'required',
            'email'     => 'required',
        ]);
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $logo_image = $request->avatar;
        if (!empty($logo_image)){
            $logo_image_new_name = time() . $logo_image->getClientOriginalName();
            $logo_image->move('uploads/users', $logo_image_new_name);
            $user->avatar = 'uploads/users/' . $logo_image_new_name;

        }
        $user->save();

        Session::flash('success', 'User has been Updated Successfully');

        return redirect()->back();
    }


    public function changePassword(){
        $user = Auth::user();
        return view('user.changePassword',  compact('user'));
    }

    public function updatePassword(Request  $request){
        $request->validate([
            'password' => 'required|min:8|confirmed',
            'password_confirmation'     => 'required',
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->update();

        Session::flash('success', 'User password has been Updated Successfully');

        return redirect()->back();
    }

    public function singleProduct($alias){

        $product = Product::where('alias', $alias)->first();

        return view('frontend.single', compact('product'));
    }
}
