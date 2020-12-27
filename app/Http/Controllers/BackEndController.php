<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BackEndController extends Controller
{
    public function index(){

        return view('backend.index');
    }

    public function dashboard(){

        return view('merchant.dashboard');
    }


    public function profile(){

        $user = Auth::user();

        return view('backend.profile', compact('user'));
    }


    public function updateProfile(Request  $request){

        $request->validate([
            'name'      => 'required|string',
            'email'     => 'required|email',
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
        $user->email = $request->email;
        $user->save();

        return redirect()->back();
    }

}
