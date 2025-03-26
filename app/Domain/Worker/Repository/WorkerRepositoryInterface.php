<?php

namespace App\Domain\Worker\Repository;

use Illuminate\Database\Eloquent\Collection;

interface WorkerRepositoryInterface
{
    /**
     * @param int[] $orderTypeIds
     * @return Collection
     */
    public function findFilteredWorker(array $orderTypeIds): Collection;
}
