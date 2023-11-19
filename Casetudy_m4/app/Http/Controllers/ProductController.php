<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
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
        // $this->authorize('viewAny', Product::class);
        $query = Product::with('category');

        if (isset($request->search)) {
            $search = $request->search;
            $query->where('name', 'like', "%$search%");
        }

        // Sắp xếp theo trường created_at giảm dần
        $products = $query->orderBy('id', 'desc')->paginate(15);



        // dd($products);

       
        return view('Products.index', compact('products'));
     
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Product::class);
        $categories = Category::get();
        return view('Products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
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
        return redirect()->route('product.index')->with('successMessage', 'More success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $products = Product::find($id);
        return view('products.show', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize('update', Product::class);
        $products = Product::find($id);
        $categories = Category::get();
        return view('products.edit', compact('products', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {
        $this->authorize('update', Product::class);

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
            // Người dùng đã tải lên một tệp mới, thực hiện việc xử lý tệp mới
            $fullFileNameOrigin = $request->file($fieldName)->getClientOriginalName();
            $fileNameOrigin = pathinfo($fullFileNameOrigin, PATHINFO_FILENAME);
            $extension = $request->file($fieldName)->getClientOriginalExtension();
            $fileName = $fileNameOrigin . '-' . rand() . '_' . time() . '.' . $extension;
            $path = $request->file($fieldName)->storeAs('public/images', $fileName);

            // Cập nhật đường dẫn ảnh mới vào sản phẩm
            $products->image = str_replace('public/', 'storage/', $path);
        } else {
            // Người dùng không tải lên tệp mới, giữ nguyên đường dẫn ảnh cũ

        }
        $products->save();
        return redirect()->route('product.index')->with('successMessage1', 'Update successful');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('delete', Product::class);

        $products = Product::onlyTrashed()->findOrFail($id);
        $products->forceDelete();

        return redirect()->back()->with('successMessage2', 'Deleted successfully');
    }
    public  function softdeletes($id)
    {
        $this->authorize('delete', Product::class);

        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $products = Product::findOrFail($id);
        $products->deleted_at = date("Y-m-d h:i:s");
        $products->save();
        return redirect()->route('product.index')->with('successMessage2', 'Deleted successfully');
    }
    public  function trash()
    {
        $this->authorize('viewtrash', Product::class);

        $products = Product::onlyTrashed()->get();
        $param = ['products' => $products];
        return view('products.trash', $param);
    }
    public function restoredelete($id)
    {
        $this->authorize('restore', Product::class);
        $products = Product::withTrashed()->where('id', $id);
        $products->restore();
        return redirect()->route('product.trash')->with('successMessage3', 'Restore successfully');
    }
}
