<?php

namespace App\Services;

use App\Models\Product;
use Session;

/**
 * Class BasketService
 * @package App\Services
 */
class BasketService
{

    /**
 * @param int $productId
 * @param int $count
 */
    public function add(int $id, int $count): void
    {
        if(Session::has("basket.$id")){
            $product=Session::get("basket.$id");
        }else{
            $product=Product::select('id','name','cover','price')->firstOrFail($id)->toArray();
        }

        $product['count']=$count;
        $product['totalPrice']=number_format($product['count']*$product['price'],0,'.',' ');

        Session::put("basket.$id", $product);
        Session::save();
        $this->countTotal();
    }

    /**
     * @param int $productId
     */
    public function delete(int $id): void
    {
        Session::forget("basket.$id");
        $this->countTotal();
    }

    /**
     *
     */
    private function countTotal(): void
    {
        $totalCount = 0;
        $totalPrice=0;
        $products = Session::get('basket');
        foreach ($products as $product) {
            $totalCount += $product['count'];
            $totalPrice+=$product['count']*$product['price'];
        }
        Session::put('basketTotalCount', $totalCount);
        Session::put('basketTotalPrice', $totalPrice);
        Session::put('basketTotalPriceStr', number_format($totalPrice,0,'.',' '));
    }

    /**
     *
     */
    public function flush():void{
        Session::forget('basket');
        Session::forget('basketTotalCount');
        Session::forget('basketTotalPrice');
        Session::forget('basketTotalPriceStr');
        Session::save();
    }
}

?>