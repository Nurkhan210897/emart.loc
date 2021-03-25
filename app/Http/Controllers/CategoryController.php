<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $category=Category::withSubCategories()
            ->withProducts()
            ->where('slug',$request->slug)
            ->firstOrFail();
        $title=$category->name;
        return view('category',compact('category','title'));
    }
}
