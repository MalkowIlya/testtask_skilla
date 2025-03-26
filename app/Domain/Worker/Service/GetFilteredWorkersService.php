<?php

namespace App\Domain\Worker\Service;

use App\Domain\Worker\Repository\WorkerRepository;
use Illuminate\Database\Eloquent\Collection;

class GetFilteredWorkersService
{
    private WorkerRepository $workerRepository;

    public function __construct()
    {
        $this->workerRepository = new WorkerRepository();
    }

    /**
     * @param int[]|int $data
     */
    public function execute(array|int $data): Collection
    {
        if (is_numeric($data)) {
            $data = [$data];
        }

        return $this->workerRepository->findFilteredWorker($data);
    }
}
