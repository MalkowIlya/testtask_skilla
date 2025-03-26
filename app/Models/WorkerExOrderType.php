<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $worker_id
 * @property int $order_type_id
 */
class WorkerExOrderType extends Model
{
    use HasFactory;

    protected $table = 'workers_ex_order_types';

    /**
     * @var list<string>
     */
    protected $fillable = [
        'worker_id',
        'order_type_id',
    ];

    public function workers(): BelongsToMany
    {
        return $this->belongsToMany(Worker::class);
    }

    public function orderTypes(): BelongsToMany
    {
        return $this->belongsToMany(OrderType::class);
    }
}
