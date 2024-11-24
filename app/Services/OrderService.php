<?php

namespace App\Services;

use App\Models\Order;

class OrderService
{
    public function orderId()
    {
        $order = Order::latest()->first();
        if ($order == null){
            $order = 1;
        }else{
            $order = $order->id;
        }
        return $order;
    }
    public function getAllOrders()
    {
        return Order::latest()->get();
    }
    public function getUserOrders($id)
    {
        return Order::with('package','user')->where('user_id',$id)->latest()->get();
    }

    public function editOrder($packageId)
    {
        return Order::findOrFail($packageId);
    }

    public function storeOrder(array $data)
    {
        return Order::create($data);
    }

    public function updateOrder($packageId, array $data)
    {
        $package = $this->editOrder($packageId);
        $requestAmount = $data['price'];
        if ($data['discount_percent']) {
            if (strpos($data['discount_percent'], '%') !== false) {
                $percentage = (float) str_replace('%', '', $data['discount_percent']);
                $discountAmount = ($percentage / 100) * $requestAmount;
            } else {
                $discountAmount = $data['discount_percent'];
            }
        } else {
            $discountAmount = 0;
        }

        $totalAmount = $requestAmount - $discountAmount;
        $data['final_price'] = $totalAmount;
        $data['feature'] = json_encode($data['feature']);
        $package->update($data);
        return $package;
    }

    public function deleteOrder($packageId)
    {
        $package = $this->getOrderById($packageId);
        $package->delete();
    }
}

?>