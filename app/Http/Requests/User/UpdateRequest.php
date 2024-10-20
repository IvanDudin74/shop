<?php

namespace App\Http\Requests\User;

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
            'name' => 'required|string',
            'surname' => 'nullable|string',
            'patronymic' => 'nullable|string',
            'address' => 'nullable|string',
        ];
    }

    public function messages() {
        return [
            'name.required' => 'This item is required',
            'name.string' => 'This item must be string',
            'surname.string' => 'This item must be string',
            'patronymic.string' => 'This item must be string',
            'address.string' => 'This items must be string',
        ];
    }
}
