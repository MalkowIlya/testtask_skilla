<?php

namespace App\Http\Controllers;

use App\Domain\Worker\Service\GetFilteredWorkersService;
use App\Http\Requests\GetFilteredWorkers;
use Illuminate\Http\JsonResponse;

class WorkerController extends Controller
{
    public function __construct(
        readonly GetFilteredWorkersService $getFilteredWorkersService
    ) {
    }

    public function get(GetFilteredWorkers $request): JsonResponse
    {
        return response()->json($this->getFilteredWorkersService->execute($request->type_id));
    }
}
