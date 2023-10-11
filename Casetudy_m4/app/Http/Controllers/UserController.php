<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequet;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', User::class);
        $users = User::orderBy('id', 'DESC')->get();
        // $users = User::search()->paginate(4);
        $param = [
            'users' => $users,
        ];
        return view('users.index', $param);
    }
    public function showAdmin()
    {
        $admins = User::get();
        $param = [
            'admins' => $admins,
        ];
        return view('users.admin', $param);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', User::class);
        $groups = Group::get();
        $param = [
            'groups' => $groups,
        ];
        return view('users.add', $param);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->birthday = $request->birthday;
        $user->gender = $request->gender;
        $user->group_id = $request->group_id;
        $fieldName = 'image';
        if ($request->hasFile($fieldName)) {
            $fullFileNameOrigin = $request->file($fieldName)->getClientOriginalName();
            $fileNameOrigin = pathinfo($fullFileNameOrigin, PATHINFO_FILENAME);
            $extenshion = $request->file($fieldName)->getClientOriginalExtension();
            $fileName = $fileNameOrigin . '-' . rand() . '_' . time() . '.' . $extenshion;
            $path = 'storage/' . $request->file($fieldName)->storeAs('public/images', $fileName);
            $path = str_replace('public/', '', $path);
            $user->image = $path;
        }
        $user->save();

        $data = [
            'name' => $request->name,
            'pass' => $request->password,
        ];


        $notification = [
            'message' => 'Đăng ký thành công!',
            'alert-type' => 'success'
        ];
        return redirect()->route('user.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->authorize('view', User::class);
        $user = User::findOrFail($id);
        $param = [
            'user' => $user,
        ];


        // $productshow-> show();
        return view('users.profile', $param);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $this->authorize('view', User::class);
        $user = User::find($id);
        $groups = Group::get();
        $param = [
            'user' => $user,
            'groups' => $groups
        ];
        return view('users.edit', $param);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        // $user->password = bcrypt($request->password);
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->birthday = $request->birthday;
        $user->gender = $request->gender;
        $user->group_id = $request->group_id;
        $fieldName = 'image';
        if ($request->hasFile($fieldName)) {
            $fullFileNameOrigin = $request->file($fieldName)->getClientOriginalName();
            $fileNameOrigin = pathinfo($fullFileNameOrigin, PATHINFO_FILENAME);
            $extenshion = $request->file($fieldName)->getClientOriginalExtension();
            $fileName = $fileNameOrigin . '-' . rand() . '_' . time() . '.' . $extenshion;
            $path = 'storage/' . $request->file($fieldName)->storeAs('public/images', $fileName);
            $path = str_replace('public/', '', $path);
            $user->image = $path;
        }
        $user->save();
        $notification = [
            'message' => 'Chỉnh Sửa Thành Công!',
            'alert-type' => 'success'
        ];
        return redirect()->route('user.index')->with($notification);
    }
    public function editpass($id)
    {
        // $this->authorize('view', User::class);
        $user = User::find($id);
        $param = [
            'user' => $user,
        ];
        return view('users.editpass', $param);
    }
    public function adminpass($id)
    {
        //  $this->authorize('adminUpdatePass', User::class);
        $user = User::find($id);
        $param = [
            'user' => $user,
        ];
        return view('users.adminpass', $param);
    }
    // chỉ có superAdmin mới có quyền đổi mật khẩu người kh
    public function adminUpdatePass(Request $request, $id)
    {
        // $this->authorize('adminUpdatePass', User::class);
        $user = User::find($id);
        if ($request->renewpassword == $request->newpassword) {
            $item = User::find($id);
            $item->password = bcrypt($request->newpassword);
            $item->save();
            $notification = [
                'message' => 'Đổi mật khẩu thành công!',
                'alert-type' => 'success'
            ];
            return redirect()->route('user.index')->with($notification);
        } else {
            $notification = [
                'sainhap' => 'Bạn nhập mật khẩu không trùng khớp!',
                'alert-type' => 'error'
            ];
            return back()->with($notification);
        }
    }
    public function updatepass(UserRequet $request)
    {
        if ($request->renewpassword == $request->newpassword) {
            if ((Hash::check($request->password, Auth::user()->password))) {
                $item = User::find(Auth()->user()->id);
                $item->password = bcrypt($request->newpassword);
                $item->save();
                $notification = [
                    'message' => 'Đổi mật khẩu thành công!',
                    'alert-type' => 'success'
                ];
                return redirect()->route('user.index')->with($notification);
            } else {
                // dd($request);
                $notification = [
                    'saipass' => '!',

                ];
                return back()->with($notification);
            }
        } else {
            $notification = [
                'sainhap' => '!',
            ];
            return back()->with($notification);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('forceDelete', User::class);
        $notification = [
            'sainhap' => '!',
        ];

        $user = User::find($id);
        if ($user->group->name != 'admin') {
            
            $user->delete();
        } else {
            return dd(__METHOD__);
        }
    }
}
