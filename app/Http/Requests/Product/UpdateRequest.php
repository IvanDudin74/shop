<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title' => 'required|string',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'preview_image' => 'nullable|file',
            'quantity' => 'required|integer',
            'price' => 'required|integer',
            'is_published' => 'nullable',
            'category_id' => 'nullable|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id',
            'color_ids' => 'nullable|array',
            'color_ids.*' => 'nullable|integer|exists:colors,id',
        ];
    }

    public function messages() {
        return [
            'title.required' => 'This item is required',
            'title.string' => 'This item must be string',
            'description.string' => 'This item must be string',
            'content.string' => 'This item must be string',
            'preview_image.file' => 'This item must be file type',
            'quantity.required' => 'This item is required',
            'quantity.integer' => 'This item must be integer',
            'price.required' => 'This item is required',
            'price.integer' => 'This item must be integer',
            'category_id.integer' => 'This item must be integer type',
            'category_id.exists' => 'This item must be exists in database',
            'tag_ids.array' => 'This item must be array type',
            'tag_ids.*.integer' => 'This items must be integer type',
            'tag_ids.*.exists' => 'This items must be exists in database',
            'color_ids.array' => 'This item must be array type',
            'color_ids.*.integer' => 'This items must be integer type',
            'color_ids.*.exists' => 'This items must be exists in database',
        ];
    }
}
