<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BasketService;
use Session;

class BasketController extends Controller
{
    public function index(BasketService $basketService)
    {
        $basket = Session::get('basket');
        $basketTotalPrice=Session::get('basketTotalPriceStr');
        $title = 'Корзина';
        return view('basket', compact('basket', 'basketTotalPrice','title'));
    }

    public function add(Request $request, BasketService $basketService)
    {
        $basketService->add($request->productId, $request->count);
        return response()->json([
            'totalCount' => Session::get('basketTotalCount'),
            'totalPrice' => Session::get('basketTotalPriceStr'),
            'product' => Session::get("basket.$request->productId")
        ]);
    }

    public function delete(Request $request, BasketService $basketService)
    {
        $basketService->delete($request->productId);
        return response()->json([
            'totalCount' => Session::get('basketTotalCount'),
            'totalPrice' => Session::get('basketTotalPriceStr')
            ]);
    }
}
