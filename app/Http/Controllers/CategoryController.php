<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $category=Category::where('slug',$request->slug)
            ->withFirstSubCategory()
            ->firstOrFail();
        
        if($category->subCategories->isEmpty()){
            $title=$category->name;
            return view('category',compact('category','title'));
        }

        $redirectUrl='/'.$category->slug.'/'.$category->subCategories[0]->slug;

        return redirect($redirectUrl,301);
    }
}
