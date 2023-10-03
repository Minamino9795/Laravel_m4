<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function register(){
        return view('shop.register');
    }
    public function checkRegister(Request $request)
    {
        // $validated = $request->validate([
        //     'email' => 'required|unique:customers|email',
        //     'password' => 'required|min:6',
        // ]);
        $notifications = [
            'ok' => 'ok',
        ];
        $notification = [
            'message' => 'error',
        ];
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->address =  $request->address;
        $customer->email = $request->email;
        $customer->password = bcrypt($request->psw);
        if ($request->psw == $request->psw_repeat) {
            $customer->save();
            return redirect()->route('shop.index');
        } else {
            return redirect()->route('shop.index')->with($notification);
        }
    }
    public function login()
    {
        return view('shop.login');
    }
    public function checklogin(Request $request)
    {
        // dd(123);
        $arr = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::guard('customers')->attempt($arr)) {
            return redirect()->route('product.index');
        } else {
            return redirect()->route('shop.login');
        }
    }

}
