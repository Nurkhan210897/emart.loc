<?php

namespace App\Http\Controllers;

use App\Models\Category;

class IndexController extends Controller
{
    public function index()
    {
        $categories=Category::all();
        $title='Главная страница';
        return view('index',compact('categories','title'));
    }
}
