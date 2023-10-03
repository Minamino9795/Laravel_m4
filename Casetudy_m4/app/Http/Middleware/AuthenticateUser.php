<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if (!$request->session()->has('user')) {
            // Người dùng chưa đăng nhập, chuyển hướng về trang đăng nhập
            return redirect('/login')->with('error', 'Bạn cần đăng nhập để truy cập vào trang sản phẩm.');
        }
        return $next($request);
    }
}