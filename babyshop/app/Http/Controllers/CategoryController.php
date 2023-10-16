<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Lấy danh sách tất cả các loại hàng
        $categories = Category::paginate(3);

        // Kiểm tra nếu có tìm kiếm
        if (isset($request->search)) {
            $search = $request->search;
            $categories = Category::where('category_name', 'like', "%$search%")
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
        // $request->validate([
        //     'category_name' => ['required', 'unique:categories', 'max:5'],
        // ], [
        //     'category_name.required' => 'Tên không được để trống',
        //     'category_name.unique' => 'Tên này đã tồn tại',
        //     'category_name.max' => 'Tên không được vượt quá 5 ký tự',
        // ]);
    
        // Kiểm tra validation trước khi tạo đối tượng Category
        $category = Category::create([
            'category_name' => $request->category_name,
            'description' => $request->description,
        ]);
    
        if ($category) {
            $request->session()->flash('successMessage', 'THÊM THÀNH CÔNG!');
        } else {
            $request->session()->flash('errorMessage', 'Thêm thất bại. Vui lòng thử lại sau.');
        }
    
        return redirect()->route('category.index')->with('status', 'Thêm danh mục thành công');
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
        if (Gate::allows('edit-category', $categories)) {
        return view('category.edit', compact(['categories']));
        }
        else{
            return redirect()->route('category.index')->with('error', 'Bạn không có quyền chỉnh sửa bài viết này.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $categories = Category::find($id);
        $categories->category_name = $request->category_name;
        $categories->description = $request->description;


        $categories->save();
        $request->session()->flash('successMessage1', 'CẬP NHẬT THÀNH CÔNG!');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $categories = Category::destroy($id);
        $request->session()->flash('successMessage2', 'XÓA THÀNH CÔNG!');
        return redirect()->route('category.index');
    }
}
