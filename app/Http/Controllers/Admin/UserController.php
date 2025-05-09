<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function list()
    {
        $title = 'Users';

        $users = User::paginate();

        return view('admin.users.list', compact('users', 'title'));
    }

    public function new()
    {
        $title = 'Add New User';

        return view('admin.users.add', compact('title'));
    }


    public function edit($id)
    {
        $title = 'Edit User';

        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('title', 'user'));
    }

    public function save(Request $request, $id = null)
    {
        $request->validate([
            'name'     => 'required',
            'password' => 'required|confirmation',
            'username' => [
                'required',
                Rule::unique('users')->ignore($id),
            ],
            'email' => 'required'
        ]);

        $user = $id ? User::findOrFail($id) : new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->save();

        return back()->withSuccess(__('User saved successfully'));
    }
}
