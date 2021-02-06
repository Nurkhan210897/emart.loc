<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $product=Product::withSpecifications()->findOrFail($request->id);
        $title=$product->name;
        return view('product',compact('product','title'));
    }
}
