<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class MasterCategoryController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|unique:categories',
            'category_image'=>'required|image|mimes:jpeg,png,jpg,gif,svg',
            'category_slug' => 'required|unique:categories',
            'status' => 'required|in:1,0',
        ]);
        if ($request->hasFile('category_image')) {
            $imagePath = $request->file('category_image')->store('categories/' .$validated['category_slug'], 'public');
            $validated['category_image'] = $imagePath;
        }else{
            $validated['category_image'] = null;
        }
        Category::create($validated);
        return redirect()->back()->with('success', 'Category created successfully.');
    }
}
