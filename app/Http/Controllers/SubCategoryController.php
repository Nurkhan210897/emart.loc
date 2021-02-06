<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subCategories=SubCategory::all();
        return view('subCategories',compact('subCategories'));
    }
}
