<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class SellerStoreController extends Controller
{
    public function create(){
        $AllCategories = Category::select('category_name', 'category_id' , 'category_image')->get();
        return view('seller.store.create' , compact('AllCategories'));
    }
    public function manage(){
        return view('seller.store.manage');

    }
}
