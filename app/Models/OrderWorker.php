<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $order_id
 * @property int $worker_id
 * @property int $amount
 */
class OrderWorker extends Model
{
    use HasFactory;

    protected $table = "order_worker";

    /**
     * @var list<string>
     */
    protected $fillable = [
        'order_id',
        'worker_id',
        'amount',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function worker(): BelongsTo
    {
        return $this->belongsTo(Worker::class);
    }
}
