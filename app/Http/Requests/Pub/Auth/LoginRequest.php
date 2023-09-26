<?php

namespace App\Http\Requests\Pub\Auth;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'login' =>
                [
                    'required',
                    'alpha_dash',
                    'exists:users,login',
                ],
            'password' =>
                [
                    'required',
                    'min:6',
                    'max:255',
                    'string',
                    'regex:/^[^\s]+$/', // Without spaces
                ],
        ];
    }
}
