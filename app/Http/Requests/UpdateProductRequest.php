<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'price' => 'required|decimal:2|min:0|max:10000',
            'count' => 'required|integer|min:0|max:10000',
        ];
    }

    public function messages(): array
    {
        return [

            'price.required' => 'Обязательно для заполнения',
            'price.decimal' => 'Должно быть 2 знака после точки',
            'price.min' => 'Больше 0',
            'price.max' => 'Меньше 10000',

            'count.required' => 'Обязательно для заполнения',
            'count.integer' => 'Должно быть числом',
            'count.min' => 'Больше 0',
            'count.max' => 'Меньше 10000',
        ];
    }
}
