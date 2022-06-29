<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeliveryTermsController extends Controller
{
    public function index(){
        $title='Условия доставки';
        return view('deliveryTerms',compact('title'));
    }
}
