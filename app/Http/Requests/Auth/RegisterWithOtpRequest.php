<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterWithOtpRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:80'],
            'last_name' => ['nullable', 'string', 'max:80'],
            'email' => ['required', 'email:rfc,dns', 'max:191', 'unique:users,email'],
            'phone' => ['required', 'regex:/^[0-9]{10,15}$/', 'unique:users,phone'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ];
    }
}
