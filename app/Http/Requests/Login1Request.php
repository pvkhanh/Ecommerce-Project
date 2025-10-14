<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Login1Request extends FormRequest
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

        $login = $this->input('login');


        if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
            return [
                'login' => 'required|email|exists:users,email',
                'password' => 'required|string|min:8',
            ];
        } else {
            return [
                'login' => 'required|string|exists:users,username',
                'password' => 'required|string|min:8',
            ];
        }
    }

    public function messages(): array
    {
        return [
            'login.required' => 'Please enter your email or username.',
            'login.email' => 'Please enter a valid email address.',
            'login.exists' => 'This user does not exist or the account is not registered.',
            'password.required' => 'Please enter your password.',
            'password.min' => 'Password must be at least 8 characters long.',
        ];
    }
}