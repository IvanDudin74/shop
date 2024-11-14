<?php

namespace App\Http\Requests\API\Order;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
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
            'products' => 'required',
            'total_sum' => 'required|integer',
        ];
    }

    public function messages() {
        return [
            'products.required' => 'products обязательно для заполнения',
            'total_sum.required' => 'total_sum обязательно для заполнения',
            'total_sum.integer' => 'total_sum должно быть числом',
        ];
    }
}
