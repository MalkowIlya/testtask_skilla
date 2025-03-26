<?php

namespace App\Domain\Order\Service;

use App\Domain\Order\Repository\OrderRepository;
use App\Domain\Order\Repository\OrderRepositoryInterface;
use App\Models\OrderWorker;

class BindWorkerToOrderService
{
    private OrderRepositoryInterface $orderRepository;

    public function __construct()
    {
        $this->orderRepository = new OrderRepository();
    }

    public function execute(array $data): bool
    {
        $orderWorker = new OrderWorker();
        $orderWorker->fill($data);

        return $this->orderRepository->bindWorker($orderWorker);
    }
}
