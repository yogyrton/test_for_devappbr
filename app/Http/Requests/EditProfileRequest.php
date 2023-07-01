<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class EditProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:100',
            'email' => 'required|email',
        ];
    }

    public function messages(): array
    {
        return [

            'name.required' => 'Обязательно для заполнения',
            'name.string' => 'Должно быть строкой',
            'name.min' => 'Минимум 3 символа',
            'name.max' => 'Максимум 100 символов',

            'email.required' => 'Обязательно для заполнения',
            'email.email' => 'Должно быть email',

        ];
    }
}
