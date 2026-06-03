<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class EmailOrTenDigitPhone implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $value = trim((string) $value);

        if ($value === '') {
            return;
        }

        if (str_contains($value, '@')) {
            if (! filter_var($value, FILTER_VALIDATE_EMAIL)) {
                $fail('The :attribute must be a valid email address.');
            }

            return;
        }

        $digits = preg_replace('/\D+/', '', $value);

        if (! preg_match('/^\d{10}$/', $digits)) {
            $fail('The :attribute must be a valid 10-digit mobile number.');
        }
    }
}
