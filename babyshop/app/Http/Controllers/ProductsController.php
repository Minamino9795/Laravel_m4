<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = Product::paginate(3);
        if (isset($request->search)) {
            $search = $request->search;
            $products = Product::where('product_name', 'like', "%$search%")
                ->paginate(3);
        }
        // dd($products);
        return view('Products.index', compact('products',));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();

        return view('Products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $products = new Product();
        $products->product_name = $request->product_name;
        $products->category_id = $request->category_id;
        $products->price = $request->price;
        $products->stock_quantity = $request->stock_quantity;

        $fieldName = 'image_url';
        if ($request->hasFile($fieldName)) {
            $fullFileNameOrigin = $request->file($fieldName)->getClientOriginalName();
            $fileNameOrigin = pathinfo($fullFileNameOrigin, PATHINFO_FILENAME);
            $extenshion = $request->file($fieldName)->getClientOriginalExtension();
            $fileName = $fileNameOrigin . '-' . rand() . '_' . time() . '.' . $extenshion;
            $path = 'storage/' . $request->file($fieldName)->storeAs('public/images', $fileName);
            $path = str_replace('public/', '', $path);
            $products->image_url = $path;
        }
        $products->save();
        return redirect()->route('product.index');

        // return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $products=Product::find($id);
        return view('products.show',compact('products'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $products = Product::find($id);
        $categories = Category::get();
        return view('products.edit', compact('products','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $products = Product::find($id);
        $products->product_name = $request->product_name;
        $products->category_id = $request->category_id;
        $products->price = $request->price;
        $products->stock_quantity = $request->stock_quantity;
        $fieldName = 'image_url';

        if ($request->hasFile($fieldName)) {
            $fullFileNameOrigin = $request->file($fieldName)->getClientOriginalName();
            $fileNameOrigin = pathinfo($fullFileNameOrigin, PATHINFO_FILENAME);
            $extension = $request->file($fieldName)->getClientOriginalExtension();
            $fileName = $fileNameOrigin . '-' . rand() . '_' . time() . '.' . $extension;
            $path = $request->file($fieldName)->storeAs('public/images', $fileName);
        
            // Cập nhật đường dẫn ảnh mới vào sản phẩm
            $products->image_url = str_replace('public/', 'storage/', $path);
        }
        
        $products->save();
        
      
        $products->save();
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $products = Product::destroy($id);
        return redirect()->route('product.index');
    }
}
