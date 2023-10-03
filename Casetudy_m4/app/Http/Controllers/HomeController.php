<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category');

        if (isset($request->search)) {
            $search = $request->search;
            $query->where('name', 'like', "%$search%");
        }
        // Sắp xếp theo trường created_at giảm dần
        $products = $query->orderBy('id', 'desc')->paginate(8);
        return view('home.index', compact('products'));
    }
    public function detail(string $id)
    {
        $products = Product::find($id);
        // Lấy các sản phẩm có liên quan (ví dụ: cùng danh mục)
        $relatedProducts = Product::where('category_id', $products->category_id)
            ->where('id', '<>', $products->id) // Loại bỏ sản phẩm hiện tại
            ->inRandomOrder() // Sắp xếp ngẫu nhiên
            ->limit(4) // Giới hạn số lượng sản phẩm hiển thị
            ->get();

        return view('Home.detail', compact('products', 'relatedProducts'));
    }
}
