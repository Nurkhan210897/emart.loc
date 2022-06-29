<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\FrequentlyAskedQuestion;
use App\Models\IndexAboutCompanySlider;
use App\Models\IndexTopSlider;

class IndexController extends Controller
{
    public function index()
    {
        $categories=Category::where('category_id',null)->get();
        $topSliders=IndexTopSlider::orderBy('serial_number')->get();
        $aboutCompanySliders=IndexAboutCompanySlider::orderBy('serial_number')->get();
        $brands=Brand::orderBy('serial_number')->get();
        $questions=FrequentlyAskedQuestion::orderBy('serial_number')->get();
        $title='Главная страница';
        return view('index',compact('categories'
                                    ,'title'
                                    ,'topSliders'
                                    ,'aboutCompanySliders'
                                    ,'brands'
                                    ,'questions'
                                    ));
    }


}
