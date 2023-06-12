<?php

namespace App\Rules;

use App\Helper\Helper;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class BankRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!Helper::checkCartDigit($value)) {
            $fail('شماره کارت نا معتبر است');
        }
    }
}
