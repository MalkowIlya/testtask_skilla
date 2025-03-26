<?php

namespace App\Http\Controllers;

use App\Domain\Order\Service\BindWorkerToOrderService;
use App\Domain\Order\Service\CreateOrderService;
use App\Domain\Order\Service\UpdateOrderService;
use App\Http\Requests\BindOrderToWorkerRequest;
use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{
    public function __construct(
        readonly CreateOrderService $createOrderService,
        readonly BindWorkerToOrderService $bindWorkerToOrderService,
        readonly UpdateOrderService $updateOrderService,
    ) {
    }

    public function create(CreateOrderRequest $request): JsonResponse
    {
        if ($order = $this->createOrderService->execute($request->validated())) {
            return response()->json($order);
        }

        return response()->json(['error' => 'Не удалось создать заказ'], '422');
    }

    public function bindWorker(BindOrderToWorkerRequest $request): JsonResponse
    {
        return response()->json(['success' => $this->bindWorkerToOrderService->execute($request->validated())]);
    }

    public function update(UpdateOrderRequest $request): JsonResponse
    {
        try {
            $success = $this->updateOrderService->execute($request->order_id, $request->status);

            return response()->json(['success' => $success]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false, 'error' => $exception->getMessage()], "400");
        }
    }
}
