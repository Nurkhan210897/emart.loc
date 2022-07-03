<?php

namespace App\Http\Controllers;

use App\Models\DeliveryTerm;
use Illuminate\Http\Request;

class DeliveryTermsController extends Controller
{
    public function index(){
        $title='Условия доставки';
        $deliveryTerms=DeliveryTerm::orderBy('serial_number')->get();
        return view('deliveryTerms',compact('title','deliveryTerms'));
    }
}
