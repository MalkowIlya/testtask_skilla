<?php

namespace App\Domain\Order\Service;

use App\Domain\Order\Repository\OrderRepository;
use App\Domain\Order\Repository\OrderRepositoryInterface;
use App\Http\Requests\BindOrderToWorkerRequest;
use App\Models\OrderWorker;

class BindWorkerToOrderService
{
    private OrderRepositoryInterface $orderRepository;

    public function __construct()
    {
        $this->orderRepository = new OrderRepository();
    }

    public function execute(BindOrderToWorkerRequest $request): bool
    {
        $orderWorker = new OrderWorker();
        $orderWorker->fill($request->validated());
        return $this->orderRepository->bindWorker($orderWorker);
    }
}
