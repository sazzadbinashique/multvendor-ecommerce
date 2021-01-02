<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Models\Banner;
use App\Models\Shop;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class BackEndController extends Controller
{
    public function index(){

        $total_users = User::count();
        $total_banners = Banner::count();
        $total_sliders =Slider::count();
        $total_shops = Shop::count();

        return view('backend.index', compact('total_banners', 'total_users', 'total_sliders', 'total_shops'));
    }

    public function profile(){

        $user = Auth::user();

        return view('backend.profile', compact('user'));
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

        Session::flash('success', 'Admin Profile has been Updated Successfully');

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

        Session::flash('success', 'Admin password has been Updated Successfully');

        return redirect()->back();
    }

}
