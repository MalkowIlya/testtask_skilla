<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

/**
 * @property int $id
 * @property string $name
 * @property string $second_name
 * @property string $surname
 * @property string $phone
 */
class Worker extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable;
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
