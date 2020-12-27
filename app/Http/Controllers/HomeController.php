<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    function index(){
        $role = Auth::user()->role->name;
        $checkrole = explode(',', $role);
        if (in_array('Admin', $checkrole)) {

            return redirect()->route('admin.dashboard');

        }elseif(in_array('Merchant', $checkrole)){

            return redirect()->route('merchant.dashboard');

        }elseif (in_array('User', $checkrole)){

            return redirect()->route('frontend.dashboard');
        }else{
            return redirect()->back();
        }
    }
}
