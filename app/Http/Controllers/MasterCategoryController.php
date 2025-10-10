<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;


class MasterCategoryController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|unique:categories',
            'category_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'category_slug' => 'required|unique:categories',
            'parent_id' => 'nullable|exists:categories,category_id',
            'status' => 'required|in:1,0',
        ]);
        if ($request->hasFile('category_image')) {
            $imagePath = $request->file('category_image')->store('categories/' . $validated['category_slug'], 'public');
            $validated['category_image'] = $imagePath;
        } else {
            $validated['category_image'] = null;
        }
        Category::create($validated);
        return redirect()->back()->with('success', 'Category created successfully.');
    }

    public function edit($slug)
    {
        $category = Category::where('category_slug', $slug)->firstOrFail();
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $category_id)
    {
        $validated = $request->validate([
            'category_name' => [
                'required',
                'max:255',
                'string',
                Rule::unique('categories', 'category_name')->ignore($category_id, 'category_id'),
            ],
            'new_category_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'category_slug' => [
                'required',
                'max:255',
                'string',
                Rule::unique('categories', 'category_slug')->ignore($category_id, 'category_id'),
            ],
            'status' => 'required|in:1,0',
        ]);

        $category = Category::findOrFail($category_id);
        $category->category_name = $validated['category_name'];
        $category->category_slug = $validated['category_slug'];
        $category->status = $validated['status'];
        if ($request->hasFile('new_category_image')) {
            if ($category->category_image && Storage::disk('public')->exists($category->category_image)) {
                Storage::disk('public')->delete($category->category_image);
            }
            $imagePath = $request->file('new_category_image')->store(
                'categories/' . $validated['category_slug'],
                'public'
            );
            $category->category_image = $imagePath;
        }
        // Check if any attribute changed
        if (!$category->isDirty()) {
            toastr()->info('No changes made to the category.');
            return redirect()->back();
        }
        $category->save();
        toastr()->success('Category updated successfully.');
        return redirect()->route('admin.category.manage');
    }

    // delete category
    public function destroy($category_id){
        $category = Category::findOrFail($category_id);
        if ($category->category_image && Storage::disk('public')->exists($category->category_image)) {
            // delete the image from the storage
            Storage::disk('public')->delete($category->category_image);
        }
        $category->delete();
        toastr()->success('Category deleted successfully.');
        return redirect()->back();
    }
}
