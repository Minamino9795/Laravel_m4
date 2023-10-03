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
        return view('Home.detail', compact('products'));
    }
}
