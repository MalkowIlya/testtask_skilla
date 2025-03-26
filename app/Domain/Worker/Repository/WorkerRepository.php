<?php

namespace App\Domain\Worker\Repository;

use App\Models\Worker;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class WorkerRepository implements WorkerRepositoryInterface
{
    public function findFilteredWorker(array $orderTypeIds = []): Collection
    {
        $query = Worker::query();

        if ($orderTypeIds) {
            $query->whereExists(function ($query) use ($orderTypeIds) {
                $query->select(DB::raw(1))
                    ->whereIn('order_type_id', $orderTypeIds)
                    ->whereNotExists(function ($subQuery) {
                        $subQuery->select(DB::raw(1))
                            ->from('workers_ex_order_types as weot')
                            ->whereColumn('weot.worker_id', 'workers.id')
                            ->whereColumn('weot.order_type_id', 'workers_ex_order_types.order_type_id');
                    })
                    ->from('workers_ex_order_types');
            });
        }

        return $query->get();
    }
}
