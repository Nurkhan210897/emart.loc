<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index(Request $request)
    {
        $subCategory=SubCategory::with('products')->findOrFail($request->id);
        $title=$subCategory->name;
        return view('subCategory',compact('subCategory','title'));
    }
}
