<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerMainController extends Controller
{
    public function index()
    {
        return view('customer.profile');
    }

    public function order_history()
    {
        return view('customer.order.history');

    }
    public function payment()
    {
        return view('customer.payment.settings');
    }
public function affiliate()
{
    return view('customer.affiliate');
}
}
