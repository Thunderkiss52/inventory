<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'customer_name' => 'required|string|max:255',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'comment' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'customer_name.required' => 'Укажите ФИО покупателя.',
            'product_id.required' => 'Выберите товар.',
            'product_id.exists' => 'Такого товара не существует.',
            'quantity.required' => 'Укажите количество.',
            'quantity.integer' => 'Количество должно быть целым числом.',
            'quantity.min' => 'Количество не может быть меньше 1.',
        ];
    }
}
