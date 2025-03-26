<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string $name
 * @property string $second_name
 * @property string $surname
 * @property string $phone
 */
class Worker extends Model
{
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'second_name',
        'surname',
        'phone',
    ];

    public function excludedOrderTypes(): HasMany
    {
        return $this->hasMany(WorkerExOrderType::class);
    }
}
