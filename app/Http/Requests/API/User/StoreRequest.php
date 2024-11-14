<?php

namespace App\Http\Requests\API\User;

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
            'name.required' => 'Имя обязательно для заполнения',
            'name.string' => 'Имя должно быть строкой',
            'email.required' => 'Email обязательно для заполнения',
            'email.string' => 'Email должно быть строкой',
            'email.email' => 'Email указан в неверном формтате',
            'email.unique' => 'Данный Email уже существует',
            'password.required' => 'Пароль обязательно для заполнения',
            'password.string' => 'Пароль должен быть строкой',
            'password.confirmed' => 'Пароли не совпадают',
            'surname.string' => 'Фамилия должна быть строкой',
            'patronymic.string' => 'Отчество должно быть строкой',
            'address.string' => 'Адрес должен быть строкой',
        ];
    }
}
