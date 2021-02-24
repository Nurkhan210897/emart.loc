<?php

namespace App\Http\Controllers;

use App\Services\BasketService;
use App\Services\OrderService;
use App\Http\Requests\OrderCreateRequest;

class OrderController extends Controller
{
    public function handle(OrderCreateRequest $request,OrderService $orderService,BasketService $basketService)
    {
        $orderId=$orderService->store($request->all());
        $basketService->flush();
        return response()->json(['orderId'=>$orderId]);
    }
}