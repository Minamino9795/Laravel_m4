<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users=User::get();
        return view('users.index',compact(['users']));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save(); // lưu dữ liệu lại
        return redirect()->route('user.index');
    }

    public function edit($id)
    {
        $user=User::find($id);
        return view('users.edit',compact(['user']));
    }
    public function update(Request $request,$id){
        $user = User::find($id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->save();
            return redirect()->route('user.index');
    }
    public function delete($id){
        $user = User::destroy($id);
      
      return redirect()->route('user.index');

    }
    public function show($id){
$user= User::find($id);

return view('users.show',compact(['user']));

    }
}
