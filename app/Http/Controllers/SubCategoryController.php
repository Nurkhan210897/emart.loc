<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index(Request $request){
        $category=Category::withSubCategories()
                ->where('slug',$request->categorySlug)
                ->firstOrFail();
        
        $subCategory=Category::where('slug',$request->subCategorySlug)
                            ->withProducts()
                            ->firstOrFail();
        
        $title=$subCategory->name;

        return view('subCategory',compact('category','subCategory','title'));
    }
}
