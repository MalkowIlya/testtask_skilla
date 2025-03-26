<?php

namespace App\Http\Controllers;

use App\Domain\Order\Service\BindWorkerToOrderService;
use App\Domain\Order\Service\CreateOrderService;
use App\Http\Requests\BindOrderToWorkerRequest;
use App\Http\Requests\CreateOrderRequest;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{
    private CreateOrderService $createOrderService;
    private BindWorkerToOrderService $bindWorkerToOrderService;

    public function __construct(
        CreateOrderService $createOrderService,
        BindWorkerToOrderService $bindWorkerToOrderService,
    ) {
        $this->createOrderService = $createOrderService;
        $this->bindWorkerToOrderService = $bindWorkerToOrderService;
    }

    public function create(CreateOrderRequest $request): JsonResponse
    {
        if ($order = $this->createOrderService->execute($request)) {
            return response()->json($order);
        }

        return response()->json(['error' => 'Не удалось создать заказ'], '422');
    }

    public function bindWorker(BindOrderToWorkerRequest $request)
    {
        return response()->json(['success' => $this->bindWorkerToOrderService->execute($request)]);
    }
}
