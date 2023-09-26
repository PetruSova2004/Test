<?php

namespace App\Http\Requests\Pub\Auth;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
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
                    'unique:users,login',
                    'min:5',
                    'max:55',
                    'alpha_dash',
                ],
            'gender' =>
                [
                    'required',
                    Rule::in(['Male', 'Female'])
                ],
            'birthdate' =>
                [
                    'required',
                    'date',
                    'before_or_equal:today',
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
