<?php

namespace App\Domain\Order\Service;

use App\Domain\Order\Repository\OrderRepository;
use App\Domain\Order\Repository\OrderRepositoryInterface;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class CreateOrderService
{
    private OrderRepositoryInterface $orderRepository;

    public function __construct()
    {
        $this->orderRepository = new OrderRepository();
    }

    public function execute(array $data): ?array
    {
        $order = new Order();
        $order->fill($data);
        $order->user_id = Auth::user()->getAuthIdentifier();
        if (!$order->status) {
            $order->status = "Создан";
        }

        if ($order = $this->orderRepository->add($order)) {
            return $order->attributesToArray();
        }

        return null;
    }
}
