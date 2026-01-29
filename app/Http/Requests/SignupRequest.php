<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            "name" => "bail|required|string|max:255",
            "email" => "bail|required|email|unique:users,email",
            "password" => "bail|required|string|min:8|confirmed",
            //
        ];
    }

    public function messages(): array{
        return [
            "name.required" => "Name is required",
            "name.string" => "Name must be string",
            "name.max" => "Name must be less than 255 characters",
            "email.required" => "Email is required",
            "email.email" => "Email must be a valid email address",
            "email.unique" => "Email is already taken",
            "password.required" => "Password is required",
            "password.string" => "Password must be string",
            "password.min" => "Password must be at least 8 characters",
            "password.confirmed" => "Password confirmation does not match",
        ];
    }
}
