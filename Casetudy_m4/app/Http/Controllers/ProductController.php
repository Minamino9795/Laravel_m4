<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = Product::with('category')->paginate(3);
        if (isset($request->search)) {
            $search = $request->search;
            $products = Product::where('name', 'like', "%$search%")
                ->paginate(3);
        }
        // dd($products);
        $successMessage = '';
        if ($request->session()->has('successMessage')) {
            $successMessage = $request->session()->get('successMessage');
        } elseif ($request->session()->has('successMessage1')) {
            $successMessage = $request->session()->get('successMessage1');
        } elseif ($request->session()->has('successMessage2')) {
            $successMessage = $request->session()->get('successMessage2');
        }

        return view('Products.index', compact('products', 'successMessage'));
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
        $products->name = $request->name;
        $products->slug = $request->slug;
        $products->price = $request->price;
        $products->decscription = $request->decscription;
        $products->quantity = $request->quantity;
        $products->status = $request->status;
        $products->category_id = $request->category_id;

        $fieldName = 'image';
        if ($request->hasFile($fieldName)) {
            $fullFileNameOrigin = $request->file($fieldName)->getClientOriginalName();
            $fileNameOrigin = pathinfo($fullFileNameOrigin, PATHINFO_FILENAME);
            $extenshion = $request->file($fieldName)->getClientOriginalExtension();
            $fileName = $fileNameOrigin . '-' . rand() . '_' . time() . '.' . $extenshion;
            $path = 'storage/' . $request->file($fieldName)->storeAs('public/images', $fileName);
            $path = str_replace('public/', '', $path);
            $products->image = $path;
        }
        $products->save();
        $request->session()->flash('successMessage', 'More success');

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $products = Product::find($id);
        $categories = Category::get();
        return view('products.edit', compact('products', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $products = Product::find($id);
        $products->name = $request->name;
        $products->slug = $request->slug;
        $products->price = $request->price;
        $products->decscription = $request->decscription;
        $products->quantity = $request->quantity;
        $products->status = $request->status;
        $products->category_id = $request->category_id;
        $fieldName = 'image';

        if ($request->hasFile($fieldName)) {
            $fullFileNameOrigin = $request->file($fieldName)->getClientOriginalName();
            $fileNameOrigin = pathinfo($fullFileNameOrigin, PATHINFO_FILENAME);
            $extension = $request->file($fieldName)->getClientOriginalExtension();
            $fileName = $fileNameOrigin . '-' . rand() . '_' . time() . '.' . $extension;
            $path = $request->file($fieldName)->storeAs('public/images', $fileName);

            // Cập nhật đường dẫn ảnh mới vào sản phẩm
            $products->image = str_replace('public/', 'storage/', $path);
        }
        $products->save();
        $request->session()->flash('successMessage1', 'CẬP NHẬT THÀNH CÔNG!');

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $products = Product::destroy($id);
        $request->session()->flash('successMessage2', 'Deleted successfully');
        return redirect()->route('product.index');
    }
}
