<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        return view('admin.category.create', compact('categories'));
    }

    public function manage()
    {
        $activeCategories = Category::where('status', 1)->count();
        $inactiveCategories = Category::where('status', 0)->count();
        // get all subcategories
        $subCategories = Category::whereNotNull('parent_id')->get();
        // get 10 categories per page
        $categories = Category::orderBy('category_id', 'DESC')->whereNull('parent_id')->paginate(10);
        return view('admin.category.manage',
            compact('categories', 'activeCategories', 'inactiveCategories', 'subCategories'));

    }
}
