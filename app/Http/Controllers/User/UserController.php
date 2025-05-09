<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function dashboard()
    {
        $title = 'User Dashboard';

        $gateways = [

            [
                'name' => 'Stripe'
            ]
        ];

        return view('user.dashboard', compact('title', 'gateways'));
    }
}
