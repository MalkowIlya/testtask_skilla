<?php

namespace App\Http\Controllers;

use App\Domain\Worker\Service\GetFilteredWorkersService;
use App\Http\Requests\GetFilteredWorkers;
use Illuminate\Http\JsonResponse;

class WorkerController extends Controller
{
    private GetFilteredWorkersService $getFilteredWorkersService;

    public function __construct(
        GetFilteredWorkersService $getFilteredWorkersService
    ) {
        $this->getFilteredWorkersService = $getFilteredWorkersService;
    }

    public function get(GetFilteredWorkers $request): JsonResponse
    {
        return response()->json($this->getFilteredWorkersService->execute($request->id_type));
    }
}
