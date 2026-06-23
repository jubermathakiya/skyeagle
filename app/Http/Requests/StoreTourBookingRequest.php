<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class StoreTourBookingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'adults' => (int) $this->input('adults', 1),
            'children' => (int) $this->input('children', 0),
            'infants' => (int) $this->input('infants', 0),
            'travel_from_date' => $this->normalizeDate($this->input('travel_from_date')),
            'travel_to_date' => $this->normalizeDate($this->input('travel_to_date')),
        ]);
    }

    public function rules(): array
    {
        return [
            'package_id' => ['required', 'integer', 'exists:packages,id'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'digits_between:10,15'],
            'travel_from_date' => ['required', 'date', 'after_or_equal:today'],
            'travel_to_date' => ['required', 'date', 'after_or_equal:travel_from_date'],
            'adults' => ['required', 'integer', 'min:1', 'max:50'],
            'children' => ['nullable', 'integer', 'min:0', 'max:50'],
            'infants' => ['nullable', 'integer', 'min:0', 'max:50'],
            'special_request' => ['nullable', 'string', 'max:5000'],
        ];
    }

    private function normalizeDate(?string $value): ?string
    {
        if (blank($value)) {
            return null;
        }

        foreach (['d-m-Y', 'Y-m-d'] as $format) {
            try {
                $date = Carbon::createFromFormat($format, $value);

                if ($date !== false) {
                    return $date->format('Y-m-d');
                }
            } catch (\Throwable) {
                //
            }
        }

        return $value;
    }
}
