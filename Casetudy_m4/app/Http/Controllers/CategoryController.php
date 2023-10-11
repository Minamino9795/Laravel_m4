<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', Category::class);

        $categories = Category::paginate(4);
        if (isset($request->search)) {
            $search = $request->search;
            $categories = Category::where('name', 'like', "%$search%")
                ->paginate();
        }

        return view('Categories.index', compact('categories'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Category::class);

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
        // $categories = Category::find($id);
        // if (Gate::allows('edit-category', $categories)) {
        // return view('Categories.edit', compact(['categories']));
        // }
        // else{
        //     return redirect()->route('category.index')->with('error', 'Bạn không có quyền chỉnh sửa bài viết này.');
        // }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        $this->authorize('update', Category::class);

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
        $this->authorize('delete', Category::class);


        $category = Category::onlyTrashed()->findOrFail($id);
        $category->forceDelete();
        return redirect()->back()->with('successMessage2', 'Deleted successfully');
    }
    public  function softdeletes($id)
    {
        $this->authorize('delete', Category::class);

        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $category = Category::findOrFail($id);
        $category->deleted_at = date("Y-m-d h:i:s");
        $category->save();
        // $request->session()->flash('successMessage2', 'Deleted successfully');

        return redirect()->route('category.index')->with('successMessage2', 'Deleted successfully');
    }
    public  function trash()
    {
        $this->authorize('viewtrash', Category::class);

        $categories = Category::onlyTrashed()->get();
        $param = ['categories'    => $categories];
        return view('Categories.trash', $param);
    }
    public function restoredelete($id)
    {
        $this->authorize('restore', Category::class);

        $categories = Category::withTrashed()->where('id', $id);
        $categories->restore();
        return redirect()->route('category.trash')->with('successMessage3', 'Restore successfully');
        // return redirect()->route('category.trash');
    }
    public function change(Request $request)
    {
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);
        return redirect()->back();
    }
}
