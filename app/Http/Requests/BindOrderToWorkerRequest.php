<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BindOrderToWorkerRequest extends FormRequest
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
            'order_id' => ['integer', 'required', 'exists:orders,id',
                Rule::unique('order_worker')->where(function ($query) {
                    $query->where('worker_id', $this->worker_id)->where('order_id', $this->order_id);
                })
            ],
            'worker_id' => ['integer', 'required', 'exists:workers,id',
                Rule::unique('workers_ex_order_types')->where(function ($query) {
                    $query->where('worker_id', $this->worker_id)->where('order_type_id', $this->order_id);
                })
            ],
            'amount' => ['integer', 'required']
        ];
    }

    public function messages(): array
    {
        return [
            'worker_id.unique' => 'Worker exclude this order type',
            'order_id.unique' => 'This worker already bind on this order',
        ];
    }
}
