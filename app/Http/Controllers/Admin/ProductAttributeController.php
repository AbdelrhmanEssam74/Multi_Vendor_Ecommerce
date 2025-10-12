<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attributes;
use Illuminate\Http\Request;

class ProductAttributeController extends Controller
{
    public function create()
    {
        return view('admin.product_attribute.create');
    }

    public function manage()
    {
        $inActiveAttributes = Attributes::where('status', 0)->count();
        $ActiveAttributes = Attributes::where('status', 1)->count();
        $attributes = Attributes::all();
        return view('admin.product_attribute.manage', compact('attributes', 'inActiveAttributes' , 'ActiveAttributes'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:100|unique:attributes,code',
            'type' => 'required',
            'status' => 'required',
        ]);

        // Create a new attribute
        Attributes::create($validated);
        return redirect()->route('admin.productAttribute.manage')->with('success', 'Product attribute created successfully.');
    }
}
