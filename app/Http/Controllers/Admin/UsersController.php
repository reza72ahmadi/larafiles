<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class UsersController extends Controller
{

    public function __construct()
    {
        if (!Auth::check()) {
            abort(403, 'Unauthorized'); 
        }
    }
   

    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'))->with(['panel_title' => 'لیست کاربران']);
        // $user = User::find(25);
        // $user->packages()->sync([1 => ['amount' => '12000', 'created_at' => date('Y-m-d H:i:s')]]);
    }

    public function create()
    {
        return view('admin.user.create')->with(['panel_title' => 'ایجاد کاربر جدید']);;
    }

    public function store(Request $request, UserRequest $userRequest)
    {
        User::create($request->only(['full_name', 'email', 'password', 'role', 'wallet']));
        return redirect()->route('admin.users.list')->with('success', 'کاربر جدید با موفقیت ذخیره شد');
    }
    // public function store(Request $request, UserRequest $userRequest)
    // {
    //     $user_data = [
    //         'full_name' => $request->full_name,
    //         'email' => $request->email,
    //         'password' => $request->password,
    //         'role' => $request->role,
    //         'wallet' => $request->wallet,
    //     ];
    //     $new_user_object =  User::create($user_data);
    //     if ($new_user_object instanceof User)
    //         return redirect()->route('admin.users.list')->with('success', 'کاربر جدید با موفقیت ذخیره شد');
    // }


    public function edit(string $id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'))->with(['panel_title' => 'ویرایش کاربر ']);
    }


    public function update(Request $request, string $id)
    {
        $user = User::findOrfail($id);

        $user->full_name = $request->full_name;
        $user->email = $request->email;

        if ($request->has('password') && $request->password != null) {
            $user->password = $request->password;
        }

        $user->role = $request->role;
        $user->wallet = $request->wallet;
        $user->save();
        return redirect()->route('admin.users.list')->with('success', 'کاربر با موفقیت ویرایش شد');
    }



    public function destroy(string $id)
    {
        $user = User::findOrfail($id);
        $user->delete();
        return redirect()->route('admin.users.list')->with('success', 'کاربر باموفقیت حذف شد');
    }

    public function packages(Request $request, $user_id)
    {
        $user = User::find($user_id);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }


        $user_packages = $user->packages()->get(); // Assuming packages is a relationship


        return view('admin.user.packages', compact('user_packages'))
            ->with('panel_title', 'نمایش پکیج های کاربر');
    }
}
