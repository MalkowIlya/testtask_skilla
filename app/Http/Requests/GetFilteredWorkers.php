<?php

namespace App\Http\Requests;

use App\Rules\WorkerIdOrderType;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property array|int $id_type
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
            'id_type' => [new WorkerIdOrderType],
        ];
    }
}
