<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    public function login()
    {
        return view('web.auth.login');
    }
    public function doLogin(Request $request)
    {
        $request->validate([
            'mobile' => ['required', 'numeric', 'regex:/^09[0-9]{9}$/'],
            'password' => 'required'
        ]);

        $user = User::where('mobile', $request->mobile)->first();
        if (!$user) {
            return redirect()->back()->withErrors('نام کاربری یا رمز عبور اشتباه است');
        }

        if (Hash::check($request->password, $user->password)) {
            Auth::login($user, true);
            if ($user->is_admin) {
                return redirect()->route('admin.home');
            } else {
                return redirect()->route('user.panel.index');
            }
        }

        return redirect()->back()->withErrors('نام کاربری یا رمز عبور اشتباه است');
    }

    public function logout()
    {
        Auth::logout();
        return Redirect()->route('home.index');
    }

    public function register()
    {
        return view('web.auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'mobile' => ['required', 'numeric', 'regex:/^09[0-9]{9}$/'],
            'password' => 'required|min:8',
            're_password' => 'required|same:password',
        ]);

        if (User::where('mobile', $request->mobile)->first()) {
            return redirect()->route('user.register')->with('error','این شماره قبلا ثبت شده است');
        }
        $user = User::create([
            'name' => ' ',
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);
        return redirect()->route('user.panel.index');
    }
}
