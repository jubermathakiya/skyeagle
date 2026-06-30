<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTourReviewRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'rating' => (int) $this->input('rating'),
        ]);
    }

    public function rules(): array
    {
        return [
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'review' => ['required', 'string', 'max:5000'],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'name',
            'email' => 'email',
            'review' => 'review',
        ];
    }
}
