<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function login()
    {
        return view('frontend.users.login');
    }


    public function dologin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        $remember = $request->has('remember');
        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ], $remember)) {
            return redirect('/');
        }

        return redirect()->back()->with('loginError', 'ایمیل یا کلمه عبور درست نیست');
    }



    public function register()
    {
        return view('frontend.users.register');
    }

    public function doRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:user,email',
            'pswd' => 'required|string|min:6',
        ]);

        $userData = [
            'full_name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->pswd), // Hashing the password
        ];

        $newUser = User::create($userData);

        if ($newUser instanceof User) { // Correct instance check
            return redirect('/');
        }

        return redirect()->back()->with('registerError', 'ثبت نام مشکل دارد');
    }

    public function logout()
    {

        Auth::logout();
        return redirect('/');
    }
}
