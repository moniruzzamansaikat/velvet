<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function list()
    {
        $title = 'Payments';

        $payments = Payment::with('paymentGateway')->paginate(10);

        return view('admin.payment.list', compact('title', 'payments'));
    }
}
