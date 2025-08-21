<?php

namespace App\Api\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string',
            'last_name'  => 'required|string',
            'username'   => 'required|string|unique:users,username|min:6',
            'phone'      => 'required|string|unique:users,phone',
            'email'      => 'required|string|email|unique:users,email',
            'password'   => 'required|string|min:6|confirmed',
        ];
    }

    /**
     * Custom error messages for validation rules.
     */
    public function messages(): array
    {
        return [
            'first_name.required' => 'First name is required.',
            'first_name.string'   => 'First name must be a valid string.',

            'last_name.required'  => 'Last name is required.',
            'last_name.string'    => 'Last name must be a valid string.',

            'username.required'   => 'Username is required.',
            'username.string'     => 'Username must be a valid string.',
            'username.unique'     => 'This username is already taken.',
            'username.min'        => 'Username must be at least :min characters long.',

            'phone.required'      => 'Phone number is required.',
            'phone.string'        => 'Phone number must be a valid string.',
            'phone.unique'        => 'This phone number is already registered.',

            'email.required'      => 'Email address is required.',
            'email.string'        => 'Email must be a valid string.',
            'email.email'         => 'Please provide a valid email address.',
            'email.unique'        => 'This email is already registered.',

            'password.required'   => 'Password is required.',
            'password.string'     => 'Password must be a valid string.',
            'password.min'        => 'Password must be at least :min characters long.',
            'password.confirmed'  => 'Password confirmation does not match.',
        ];
    }
}
