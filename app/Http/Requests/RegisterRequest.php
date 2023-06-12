<?php

namespace App\Http\Requests;

use App\Helper\Helper;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            "name" => "required|string|max:255",
            "phone" => "required|regex:/(09)[0-9]{9}/|digits:11|numeric,unique:users,phone",
            "password" => "required|string|min:6",
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'phone' => Helper::toEnglishNumbers($this->input('phone'))
        ]);
    }
}
