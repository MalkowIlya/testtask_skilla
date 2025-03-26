<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $type_id
 * @property int $partnership_id
 * @property int $user_id
 * @property string $description
 * @property string $date
 * @property string $address
 * @property int $amount
 * @property string $status
 */
class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    /**
     * @var list<string>
     */
    protected $fillable = [
        'type_id',
        'partnership_id',
        'user_id',
        'description',
        'date',
        'address',
        'amount',
        'status',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'date' => 'datetime',
        ];
    }

    public function partnership(): BelongsTo
    {
        return $this->belongsTo(Partnership::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(OrderType::class);
    }

    public function orderWorkers(): HasMany
    {
        return $this->hasMany(OrderWorker::class);
    }
}
