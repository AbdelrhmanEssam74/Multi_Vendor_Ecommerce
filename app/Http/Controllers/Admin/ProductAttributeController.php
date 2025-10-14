<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attributes;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductAttributeController extends Controller
{
    public function create()
    {
        $categories = Category::select('category_name', 'category_id')->whereNull('parent_id')->get();
        return view('admin.product_attribute.create' , compact('categories'));
    }

    public function manage()
    {
        $inActiveAttributes = Attributes::where('status', 0)->count();
        $ActiveAttributes = Attributes::where('status', 1)->count();
        $attributes = Attributes::withCount('products')->get();
        return view('admin.product_attribute.manage', compact('attributes', 'inActiveAttributes', 'ActiveAttributes'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:100|unique:attributes,code',
            'category_id' => 'nullable|exists:categories,category_id',
            'type' => 'required',
            'status' => 'required',
        ]);

        // Create a new attribute
        Attributes::create($validated);
        return redirect()->route('admin.productAttribute.manage')->with('success', 'Product attribute created successfully.');
    }

    public function edit($att_id)
    {
        $attribute = Attributes::findOrFail($att_id);
        $categories = Category::select('category_name', 'category_id')->whereNull('parent_id')->get();
        return view('admin.product_attribute.edit', compact('attribute', 'categories'));
    }

    public function update($att_id, Request $request)
    {
        $attribute = Attributes::findOrFail($att_id);
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'code' => [
                'required',
                'max:255',
                'string',
                Rule::unique('attributes', 'name')->ignore($att_id, 'attribute_id'),
            ],
            'type' => 'required',
            'status' => 'required',
            'category_id' => 'nullable|exists:categories,category_id'
        ]);
        if ($attribute->hasProduct()) {
            // return warring message if the attribute belongs to any product
            return redirect()->back()->with('error', 'Cannot update attribute "' . $attribute->code . '" because it belongs to a product.');
        }
        $attribute->name = $validate['name'];
        $attribute->code = $validate['code'];
        $attribute->type = $validate['type'];
        $attribute->status = $validate['status'];
        $attribute->category_id = $validate['category_id'];
        // Check if any attribute changed
        if (!$attribute->isDirty()) {
            return redirect()->back()->with('info', 'No changes made to the Attribute.');
        }
        $attribute->save();

        return redirect()->route('admin.productAttribute.manage')->with('success', 'Product attribute updated successfully.');

    }

    public function destroy($att_id)
    {
        // get the attribute by id
        $attribute = Attributes::findOrFail($att_id);
        // check if the attribute belongs to any product
        if ($attribute->hasProduct()) {
            // return warring message if the attribute belongs to any product
            return redirect()->back()->with('error', 'Cannot delete attribute "' . $attribute->code . '" because it belongs to a product.');
        }
        // delete the attribute
        $attribute->delete();
        return redirect()->route('admin.productAttribute.manage')->with('success', 'Product attribute "' . $attribute->code . '" deleted successfully.');
    }
}
