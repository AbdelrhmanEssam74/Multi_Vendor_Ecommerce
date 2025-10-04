<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function create()
    {
        return view('admin.discount.create');
    }

    public function manage()
    {
        return view('admin.discount.manage');
    }
}
