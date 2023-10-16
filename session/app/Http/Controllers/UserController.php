<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
    public function showLoginForm()
    {
        // if (session()->has('user'))
        return view('login');
    }
    public function login(Request $request)
    {
        $users = User::where('email', $request->input('email'))->first();

        // Xác minh thông tin đăng nhập (đơn giản hóa cho mục đích ví dụ)
        if ($users && Hash::check($request->input('password'), $users->password)) {
            // Lưu trạng thái đăng nhập vào Session
            Session::put('user', 'user1');
           
            return redirect('/product');
        } else {
            return redirect('/login')->with('error', 'Đăng nhập thất bại');
        }
    }
   
    public function logout()
    {
        // Xóa thông tin đăng nhập khỏi Session
        Session::forget('user');
        return redirect('/login');
    }
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $users = new User();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = $request->password;
        $users->save();
        // $request->session()->flash('successMessage', 'More success');
        return redirect('/login');
    }
  
}


