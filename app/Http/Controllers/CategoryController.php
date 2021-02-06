<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $category=Category::with(['subCategories'])->findOrFail($request->id);
        $title=$category->name;
        return view('category',compact('category','title'));
    }
}
