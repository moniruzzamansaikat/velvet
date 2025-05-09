<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentGateway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaymentGatewayController extends Controller
{
    public function list()
    {
        $title = 'Payment Gateways';

        $paymentGateways = PaymentGateway::paginate();

        return view('admin.payment_gateway.list', compact('title', 'paymentGateways'));
    }

    public function new()
    {
        $title = 'Add Payment Gateway';

        return view('admin.payment_gateway.add', compact('title'));
    }

    public function edit($key)
    {
        $title = 'Edit Payment Gateway';

        $paymentGateway = PaymentGateway::where('key', $key)->firstOrFail();

        return view('admin.payment_gateway.edit', compact('title', 'paymentGateway'));
    }

    public function save(Request $request, $key)
    {
        $request->validate([
            'name'       => 'required|max:255',
            'short_desc' => 'nullable|max:255',
            'image'      => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'config'     => 'nullable',
        ]);

        if ($key) {
            $paymentGateway = PaymentGateway::where('key', $key)->firstOrFail();
        } else {
            $paymentGateway = new PaymentGateway();
        }

        $paymentGateway->name = $request->name;

        if ($request->hasFile('image')) {
            if ($key && $paymentGateway->image && Storage::disk('public')->exists($paymentGateway->image)) {
                Storage::disk('public')->delete($paymentGateway->image);
            }

            $imagePath = $request->file('image')->store('public/assets/images/' . $key . '.png');
            $paymentGateway->image = $imagePath;
        }

        $config = $request->config;

        $paymentGateway->config = $config;
        $paymentGateway->short_desc = $request->short_desc;
        $paymentGateway->save();

        return to_route('admin.payment_gateway.list')->withSuccess(__('Payment gateway saved successfully.'));
    }

}
