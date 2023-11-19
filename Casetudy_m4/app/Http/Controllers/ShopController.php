<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ShopController extends Controller
{
    public function register()
    {
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

            $user = Auth::guard('customers')->user();
            $userName = $user->name;
            $request->session()->put('userName', $userName);
            
            return redirect()->route('shop.index')->with('successMessage', 'Login Success');
        } else {
            return redirect()->route('shop.login');
        }
    }


    public function checklogout()
    {
        Auth::guard('customers')->logout(); // Đăng xuất khách hàng
        return redirect()->route('shop.index')->with('successMessage', 'Logout Success'); // Chuyển hướng đến trang đăng nhập
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
            return redirect()->route('shop.loginadmin')->with('errorMessage', 'Username or password is wrong');
        }
    }
    public function logout()
    {
        // Xóa thông tin đăng nhập khỏi Session
        Session::forget('user');
        return redirect()->route('shop.loginadmin')->with('successMessage', 'Logout Success');
    }
    public function checkOuts()
    {
        return view('shop.checkout');
    }
    public function order(Request $request)
    {
        if ($request->product_id == null) {
            return redirect()->back();
        } else {
            $id = Auth::guard('customers')->user()->id;
            $data = Customer::find($id);
            $data->address = $request->address;
            $data->email = $request->email;
            $data->phone = $request->phone;
            if (isset($request->note)) {
                $data->note = $request->note;
            }
            $data->save();

            $order = new Order();
            $order->customer_id = Auth::guard('customers')->user()->id;
            $order->date_at = date('Y-m-d H:i:s');
            $order->date_ship = date('Y-m-d H:i:s');
            $order->note = 'Giao hàng nhanh';

            // $order->total = $request->totalAll;

            // dd($request->all());
            // dd($request->totalAll);

            $order->save();
        }
        $count_product = count($request->product_id);
        for ($i = 0; $i < $count_product; $i++) {
            $orderItem = new OrderDetail();
            $orderItem->order_id =  $order->id;
            $orderItem->product_id = $request->product_id[$i];
            $orderItem->quantity = $request->quantity[$i];
            $orderItem->total = $request->total[$i];
            $orderItem->save();
            session()->forget('cart');
            DB::table('products')
                ->where('id', '=', $orderItem->product_id)
                ->decrement('quantity', $orderItem->quantity);
        }
        $notification = [
            'message' => 'success',
        ];
        $data = [
            'name' => $request->name,
            'pass' => $request->password,
        ];
      


        return redirect()->route('orderview')->with('successMessage', 'Order Success');
    }
    public function orderview()
    {
        return view('order.orderview');
    }
     
}
