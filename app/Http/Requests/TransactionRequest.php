<?php

namespace App\Http\Requests;

use App\Helper\Helper;
use App\Rules\BankRule;
use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
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
            "cart_number_from" => ["required","exists:carts,cart_number" , "max:16", "numeric", new BankRule()],
            "cart_number_to" => ["required","exists:carts,cart_number" , "max:16", "numeric", new BankRule()],
            "price" => ["required", "numeric"],
            "cvv" => ["required", "numeric"],
            "password" => ["required", "numeric"],
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'cart_number_from' => Helper::toEnglishNumbers($this->input('cart_number_from')),
            'cart_number_to' => Helper::toEnglishNumbers($this->input('cart_number_to'))
        ]);
    }
}
