<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
        return view('admin.category.create');
    }
    public function manage()
    {
        $activeCategories = Category::where('status', 1)->count();
        $inactiveCategories = Category::where('status', 0)->count();
        // get 10 categories per page
        $categories = Category::orderBy('category_id', 'DESC')->paginate(10);
        return view('admin.category.manage', compact('categories' , 'activeCategories' , 'inactiveCategories'));

    }
}
