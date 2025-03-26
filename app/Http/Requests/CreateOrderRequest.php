<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


/**
 * @property int $type_id
 * @property int $partnership_id
 * @property int $description
 * @property string $date
 */
class CreateOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type_id' => ['integer', 'required', 'exists:order_types,id'],
            'partnership_id' => ['integer', 'required', 'exists:partnerships,id'],
            'description' => ['string', 'max:1000', 'nullable'],
            'date' => ['date', 'required'],
            'address' => ['string', 'required', 'max:255'],
            'amount' => ['integer', 'required'],
            'status' => ['string', 'max:255'],
        ];
    }
}
