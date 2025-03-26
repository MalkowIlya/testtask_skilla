<?php

namespace App\Domain\Order\Repository;

use App\Models\Order;
use App\Models\OrderWorker;

interface OrderRepositoryInterface
{
    public function add(Order $order): ?Order;
    public function bindWorker(OrderWorker $orderWorker): bool;
    public function update(Order $order): bool;
}
