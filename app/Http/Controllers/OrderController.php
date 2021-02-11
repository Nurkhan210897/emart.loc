<?php

namespace App\Http\Controllers;

use App\Services\BasketService;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function handle(Request $request,OrderService $orderService,BasketService $basketService)
    {
        $orderId=$orderService->store($request->all());
        $basketService->flush();
        return response()->json(['orderId'=>$orderId]);
    }
}