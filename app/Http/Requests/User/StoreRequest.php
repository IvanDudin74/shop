<?php

namespace App\Http\Requests\User;

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
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|confirmed',
            'surname' => 'nullable|string',
            'patronymic' => 'nullable|string',
            'gender' => 'nullable|integer',
            'address' => 'nullable|string',
            'role' => 'required|integer',
        ];
    }

    public function messages() {
        return [
            'name.required' => 'This item is required',
            'name.string' => 'This item must be string',
            'email.required' => 'This item is required',
            'email.string' => 'This item must be string',
            'email.email' => 'This item must be email',
            'email.unique' => 'This item already exists in database',
            'password.required' => 'This item is required',
            'password.string' => 'This item must be string',
            'password.confirmed' => 'passwords dont match',
            'surname.string' => 'This item must be string',
            'patronymic.string' => 'This item must be string',
            'gender.integer' => 'This item must be integer',
            'address.string' => 'This items must be string',
            'role.required' => 'This items is required',
            'role.integer' => 'This items must be integer type',
        ];
    }
}
