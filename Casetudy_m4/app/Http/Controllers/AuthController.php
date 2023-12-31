<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        } else {
            return view('admin.login');
        }
    }
    public function postLogin(Request $request)
    {
        $messages = [
            "email.exists" => "Email is incorrect!",
            "password.exists" => "Incorrect password!",
        ];
        $validator = Validator::make($request->all(), [
            'email' => 'exists:users,email',
            'password' => 'exists:users,password',
        ], $messages);
        $data = $request->only('email', 'password');
        if (Auth::attempt($data)) {
            return redirect()->route('product.index');
        } else {
            return back()->withErrors($validator)->withInput();
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
