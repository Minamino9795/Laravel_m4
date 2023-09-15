<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::paginate(3); 

        if(isset($request->search)){
            $search = $request->search;
            $users = User::where('name', 'like', "%$search%")
            ->paginate(3);
        }
        return view('users.index', compact(['users']));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save(); // lưu dữ liệu lại
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user= User::find($id);
        return view('users.show', compact(['user']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('users.edit', compact(['user']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::destroy($id);
        return redirect()->route('user.index');
    }

}
