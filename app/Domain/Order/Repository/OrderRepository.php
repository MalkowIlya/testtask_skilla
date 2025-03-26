<?php

namespace App\Domain\Order\Repository;

use App\Models\Order;
use App\Models\OrderWorker;

class OrderRepository implements OrderRepositoryInterface
{
    public function add(Order $order): ?Order
    {
        if ($order->save()) {
            return $order;
        }

        return null;
    }

    public function bindWorker(OrderWorker $orderWorker): bool
    {
        if ($orderWorker->save()) {
            return true;
        }

        return false;
    }

    public function update(Order $order): bool
    {
        return $order->save();
    }
}
