<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderTransaction;
use App\Models\User;
use Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orderPlace(Request $request){
        $request->validate([
            'name'      => 'required|string',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|confirmed',
            'city'   => 'required',
            'country'      => 'required',
            'phone'    => 'required',
            'address'   => 'required',
        ]);


        $user = Auth::user();
        if (!Auth::user() && $request->create_account == 'forever' ){
            $user = new User;
            $user->name = $request->name;
            $user->role_id = 3;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
        }


        $transaction = new OrderTransaction;
        $transaction->name = $request->name;
        $transaction->email = $request->email;
        $transaction->amount = Cart::total();
        $transaction->phone = $request->phone;
        $transaction->country = $request->country;
        $transaction->zip_code = $request->zip_code;
        $transaction->city = $request->city;
        $transaction->address = $request->address;
        $transaction->status = 1;
        $transaction->save();


        if ($request->cash_on_delivery= 'cash'){
            $cartItems= Cart::content();
            foreach ($cartItems as $cartItem){
                $order = new Order;
                $order->user_id = $user->id;
                $order->product_id = $cartItem->id;
                $order->transaction_id = $transaction->id;
                $order->amount = $cartItem->price;
                $order->quantity = $cartItem->qty;
                $order->order_code = $this->unique_code(9);
                $order->status = 1;
                $order->save();
            }

        }

        Cart::destroy();

        Session::flash('success', 'Payment has been Successfully Placed.');

        return redirect()->route('thank.you');


    }

    private function unique_code($limit)
    {
        return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
    }

}
