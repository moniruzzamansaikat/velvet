<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function dashboard()
    {
        $pageTitle             = 'Dashboard';
        
        $widget['total_users'] = User::count();

        return view('admin.dashboard', compact('pageTitle', 'widget'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'max:255|email|required|unique:admins,id,' . auth('admin')->id()
        ]);


        $admin = auth('admin')->user();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->save();

        return back()->withSuccess('Profile updated successfully');
    }
}
