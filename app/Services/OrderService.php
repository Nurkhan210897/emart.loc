<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\Session;

class OrderService {

    /**
     * @param $data
     */
    public function store($data){
        $orderId=$this->storeOrder($data);
        $this->storeOrderProducts($orderId);
        return $orderId;
    }

    /**
     * @param array $data
     * @return int
     */
    private function storeOrder(array $data):int{
        $order=Order::create([
            'name'=>$data['fName'].' '.$data['sName'],
            'mobile'=>$data['mobile'],
            'address'=>$data['address'],
            'comment_to_delivery'=>$data['commentToDelivery'],
            'total_sum'=>(int)Session::get('basketTotalPrice'),
            'status_id'=>1,
            'created_at'=>date("Y-m-d H:i:s")
        ]);
        return $order->id;
    }

    /**
     * @param int $orderId
     */
    private function storeOrderProducts(int $orderId):void{
        $basket=Session::get('basket');
        foreach ($basket as $product) {
            OrderProduct::create([
                'product_id'=>$product['id'],
                'order_id'=>$orderId,
                'count'=>$product['count'],
                'total_sum'=>(int)$product['price']*(int)$product['count']
            ]);
        }
    }

}


?>