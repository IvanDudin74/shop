<?php

namespace App\Http\Requests\API\Product;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
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
            'categories' => 'nullable|array',
            'categories.*' => 'nullable|integer',
            'colors' => 'nullable|array',
            'colors.*' => 'nullable|integer',
            'tags' => 'nullable|array',
            'tags.*' => 'nullable|integer',
            'prices' => 'nullable|array',
            'prices.*' => 'nullable|integer',
            'sort' => 'nullable|integer',
            'page' => 'required|integer',
            'title' => 'nullable|string',
        ];
    }
}
