<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Category::orderBy('id', 'desc')->paginate(3);

        // Kiểm tra nếu có tìm kiếm
        if (isset($request->search)) {
            $search = $request->search;
            $categories = Category::where('name', 'like', "%$search%")
                ->orderBy('id', 'desc')
                ->paginate(3);
        }


        // Kiểm tra session để lấy thông báo thành công
        $successMessage = '';
        if ($request->session()->has('successMessage')) {
            $successMessage = $request->session()->get('successMessage');
        } elseif ($request->session()->has('successMessage1')) {
            $successMessage = $request->session()->get('successMessage1');
        } elseif ($request->session()->has('successMessage2')) {
            $successMessage = $request->session()->get('successMessage2');
        }

        // Trả về view với danh sách loại hàng và thông báo thành công
        return view('Categories.index', compact('categories', 'successMessage'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $categories = new Category();
        $categories->name = $request->name;
        $categories->save();      
        return redirect()->route('category.index')->with('successMessage', 'More success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categories = Category::find($id);
        return view('Categories.show', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::find($id);
        return view('Categories.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        $categories = Category::find($id);
        $categories->name = $request->name;
        $categories->save();
        return redirect()->route('category.index')->with('successMessage1', 'Update successful');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        
        $category = Category::onlyTrashed()->findOrFail($id);
        $category->forceDelete();
        return redirect()->back()->with('successMessage2', 'Deleted successfully');
    }
    public  function softdeletes($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $category = Category::findOrFail($id);
        $category->deleted_at = date("Y-m-d h:i:s");
        $category->save();
        // $request->session()->flash('successMessage2', 'Deleted successfully');

        return redirect()->route('category.index')->with('successMessage2', 'Deleted successfully');
    }
    public  function trash()
    {
        $categories = Category::onlyTrashed()->get();
        $param = ['categories'    => $categories];
        return view('Categories.trash', $param);
    }
    public function restoredelete($id)
    {      
        $categories = Category::withTrashed()->where('id', $id);
        $categories->restore();
        return redirect()->route('category.trash')->with('successMessage3', 'Restore successfully');
        // return redirect()->route('category.trash');
    }
}
