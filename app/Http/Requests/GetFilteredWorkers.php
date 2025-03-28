<?php

namespace App\Http\Requests;

use App\Rules\WorkerIdOrderType;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property array|int $type_id
 */
class GetFilteredWorkers extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type_id' => [new WorkerIdOrderType],
        ];
    }
}
