<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class OrderType extends Model
{
    /**
     * @var list<string>
     */
    protected $fillable = [
        'name',
    ];

    public function workerExOrderTypes(): HasMany
    {
        return $this->hasMany(WorkerExOrderType::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function exWorkers(): HasManyThrough
    {
        return $this->workerExOrderTypes()->workers();
    }
}
