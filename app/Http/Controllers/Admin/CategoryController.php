<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
        return view('admin.category.create');
    }
    public function manage()
    {
        return view('admin.category.manage');
    }
}
