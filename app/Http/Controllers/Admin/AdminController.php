<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Checkout\Session;
use Stripe\Stripe;
use Stripe\Token;

class AdminController extends Controller
{

    public function getCharge()
    {
        return view('admin.get-charge');
    }

    public function charge(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $ck = Session::create([
            'mode' => 'payment',
            'success_url' => route('admin.dashboard') . '{{}}',
            'line_items' => [
                [
                    'quantity' => 1,
                    'price_data' => [
                        'currency' => 'usd',
                        'unit_amount' => 2000,
                        'product_data' => [
                            'name' => 'a test payment'
                        ]
                    ]
                ]
            ]
        ]);

        return redirect()->away($ck->url);
    }


    public function dashboard()
    {
        $title                   = 'Dashboard';
        $widget['total_users']   = User::count();
        $widget['total_payment'] = Payment::sum('amount');

        return view('admin.dashboard', compact('title', 'widget'));
    }

    public function profile()
    {
        $title = 'Profile';

        $admin = admin();

        return view('admin.setting.profile', compact('title', 'admin'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:admins,email,' . auth('admin')->id(),
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $admin = auth('admin')->user();
        $admin->name = $request->name;
        $admin->email = $request->email;

        if ($request->hasFile('image')) {
            if ($admin->image && file_exists(public_path('uploads/admins/' . $admin->image))) {
                unlink(public_path('uploads/admins/' . $admin->image));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/admins'), $imageName);
            $admin->image = $imageName;
        }

        $admin->save();

        return back()->withSuccess('Profile updated successfully');
    }

}
