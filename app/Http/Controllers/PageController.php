<?php

namespace App\Http\Controllers;
use App\Models\AboutCompany;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $page=AboutCompany::findOrFail($request->id);
        $title=$page->name;
        return view('companyPage',compact('page','title'));
    }
}
