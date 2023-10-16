<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return response()->json(['users' => $users]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    // Validate the incoming data
    $this->validate($request, [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6',
    ]);
    // Create a new user
    $user = User::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => bcrypt($request->input('password')),
    ]);
    return response()->json(['user' => $user], 201); // 201 Created
}
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404); // 404 Not Found
        }
        return response()->json(['user' => $user]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the incoming data
        $this->validate($request, [
            'name' => 'string|max:255',
            'email' => 'email|unique:users,email,' . $id,
            'password' => 'string|min:6',
        ]);
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404); // 404 Not Found
        }
        // Update user fields
        $user->name = $request->input('name', $user->name);
        $user->email = $request->input('email', $user->email);
        if ($request->has('password')) {
            $user->password = bcrypt($request->input('password'));
        }
        $user->save();
        return response()->json(['user' => $user]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $user = User::find($id);
    if (!$user) {
        return response()->json(['message' => 'User not found'], 404); // 404 Not Found
    }
    $user->delete();
    return response()->json(['message' => 'User deleted'], 200); // 200 OK
}
}
