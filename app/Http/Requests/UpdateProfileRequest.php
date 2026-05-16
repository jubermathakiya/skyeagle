<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    public function rules(): array
    {
        $countriesTable = config('geo.countries_table', 'countries');
        $statesTable = config('geo.states_table', 'states');
        $citiesTable = config('geo.cities_table', 'cities');
        $stateCountryCol = config('geo.state_country_id_column', 'country_id');
        $cityStateCol = config('geo.city_state_id_column', 'state_id');

        return [
            'first_name' => ['required', 'string', 'max:191'],
            'last_name' => ['nullable', 'string', 'max:191'],
            'email' => [
                'required',
                'email',
                'max:191',
                Rule::unique('users', 'email')->ignore($this->user()->id),
            ],
            'phone' => ['required', 'string', 'max:20'],

            'address_line1' => ['required', 'string', 'max:255'],
            'address_line2' => ['nullable', 'string', 'max:255'],
            'postal_code' => ['nullable', 'string', 'max:32'],
            'country_id' => ['required', 'integer', Rule::exists($countriesTable, 'id')],
            'state_id' => [
                'required',
                'integer',
                Rule::exists($statesTable, 'id')->where(
                    fn ($q) => $q->where($stateCountryCol, (int) $this->input('country_id'))
                ),
            ],
            'city_id' => [
                'required',
                'integer',
                Rule::exists($citiesTable, 'id')->where(
                    fn ($q) => $q->where($cityStateCol, (int) $this->input('state_id'))
                ),
            ],
        ];
    }
}
