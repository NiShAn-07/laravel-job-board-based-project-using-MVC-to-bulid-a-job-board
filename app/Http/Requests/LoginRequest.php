<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            "email"=> "bail|required|string|email",
            "password"=> "bail|required|string|min:8",
            //
        ];
    }

    function messages(): array
    {
        return [
            "email.required"=> "Email is required",
            "email.email"=> "Email must be a valid email address",
            "password.required"=> "Password is required",
            "password.min"=> "Password must be at least 8 characters",
        ];
    }
}
