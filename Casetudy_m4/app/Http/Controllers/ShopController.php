<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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
            return redirect()->route('shop.login');
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


    public function loginadmin()
    {
        return view('shop.login_admin');
    }
    public function checkloginadmin(Request $request)
    {
        // dd(123);
        $users = User::where('email', $request->input('email'))->first();

        // Xác minh thông tin đăng nhập (đơn giản hóa cho mục đích ví dụ)
        if ($users && Hash::check($request->input('password'), $users->password)) {
            // Lưu trạng thái đăng nhập vào Session
            Session::put('user', 'user1');
           
            return redirect()->route('product.index');
        } else {
            return redirect()->route('shop.loginadmin')->with('errorMessage', 'Username or password is wrong');;
        }
    }
    public function logout()
    {
        // Xóa thông tin đăng nhập khỏi Session
        Session::forget('user');
        return redirect()->route('shop.loginadmin');
    }
   
}
