<?php

namespace App\Rules;

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
        if (!$this->checkCartDigit($value)) {
            $fail('شماره کارت نا معتبر است');
        }
    }

    public function checkCartDigit($cartNumber)
    {
        $len = strlen($cartNumber);
        if ($len < 16 || intval(substr($cartNumber, 1, 10), 10) == 0 || intval(substr($cartNumber, 10, 6), 10) == 0) return false;
        $s = 0;
        for ($i = 0; $i < 16; $i++) {
            $k = ($i % 2 == 0) ? 2 : 1;
            $d = intval(substr($cartNumber, $i, 1), 10) * $k;
            $s += ($d > 9) ? $d - 9 : $d;
        }
        return (($s % 10) == 0);
    }
}
