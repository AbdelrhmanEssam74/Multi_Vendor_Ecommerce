<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function manage(){
        return view('admin.product.manage');
    }
    public function review(){
        return view('admin.product.review');
    }
}
