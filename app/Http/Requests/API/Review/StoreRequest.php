<?php

namespace App\Http\Requests\API\Review;

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
            'product_id' => 'required|integer|exists:products,id',
            'content' => 'required|string',
        ];
    }

    public function messages() {
        return [
            'product_id.required' => 'Поле product_id комментария должно быть заполнено',
            'product_id.integer' => 'Поле product_id комментария должно быть целым числом',
            'product_id.exists' => 'Поле product_id комментария должно существовать в базе',
            'content.required' => 'Поле Текст комментария должно быть заполнено',
            'content.string' => 'Поле Текст комментария должно быть строкой',
        ];
    }
}
