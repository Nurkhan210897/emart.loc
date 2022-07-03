<?php

namespace App\Http\Controllers;

use App\Models\RentTerm;
use Illuminate\Http\Request;

class RentTermsController extends Controller
{
    public function index(){
        $title='Условия аренды';
        $rentTerms=RentTerm::orderBy('serial_number')->get();
        return view('rentTerms',compact('title','rentTerms'));
    }
}
