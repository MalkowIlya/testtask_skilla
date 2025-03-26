<?php

namespace App\Domain\Order\Service;

use Illuminate\Support\Facades\Auth;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use App\Domain\Order\Repository\OrderRepository;
use App\Domain\Order\Repository\OrderRepositoryInterface;
use App\Events\OrderStatusUpdated;
use App\Models\Order;


class UpdateOrderService
{
    private OrderRepositoryInterface $orderRepository;

    public function __construct()
    {
        $this->orderRepository = new OrderRepository();
    }

    public function execute($orderId, $status): bool
    {
        $order = Order::query()->findOrFail($orderId);
        if ($order->user_id === Auth::user()->getAuthIdentifier()) {
            $order->status = $status;

            foreach ($order->orderWorkers as $orderWorker) {
                OrderStatusUpdated::dispatch($orderWorker->worker, $order);
            }

            return $this->orderRepository->update($order);
        }

        throw new AccessDeniedException('Заказ не привязан к текущему пользователю');
    }
}
