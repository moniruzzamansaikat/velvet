<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        $title = 'User login';

        return view('user.auth.login', compact('title'));
    }

    public function loginStore(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (\Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->intended('/user/dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ])->withInput($request->only('email'));
    }

    public function logout()
    {
        \Auth::logout();
        return to_route('home')->withSuccess(__('You are logged out'));
    }
}
