<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $product = Product::withSpecifications()
            ->where('slug', $request->productSlug)
            ->firstOrFail();
        $title=$product->name;
        return view('product',compact('product','title'));
    }

    public function search(Request $request){
        $products=Product::where('name','like',"%$request->text%")->get();
        $title='Результаты поиска';
        $searched=$request->text;
        return view('search',compact('products','title','searched'));
    }
}
