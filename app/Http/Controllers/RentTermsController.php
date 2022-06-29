<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RentTermsController extends Controller
{
    public function index(){
        $title='Условия аренды';
        return view('rentTerms',compact('title'));
    }
}
