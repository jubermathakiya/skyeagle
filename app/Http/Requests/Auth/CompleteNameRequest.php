<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class CompleteNameRequest extends FormRequest
{
    public function authorize(): bool
    {
        return (bool) $this->user();
    }

    public function rules(): array
    {
        return [
            'full_name' => ['required', 'string', 'max:161'],
        ];
    }

    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator) {
            if ($validator->errors()->isNotEmpty()) {
                return;
            }

            $parts = preg_split('/\s+/', trim((string) $this->input('full_name')), 2);

            if (strlen($parts[0]) > 80) {
                $validator->errors()->add('full_name', 'The first part of your name must not exceed 80 characters.');
            }

            if (isset($parts[1]) && strlen($parts[1]) > 80) {
                $validator->errors()->add('full_name', 'The last part of your name must not exceed 80 characters.');
            }
        });
    }

    /**
     * @return array{first_name: string, last_name: string|null}
     */
    public function nameParts(): array
    {
        $parts = preg_split('/\s+/', trim($this->validated('full_name')), 2);

        return [
            'first_name' => $parts[0],
            'last_name' => $parts[1] ?? null,
        ];
    }
}
