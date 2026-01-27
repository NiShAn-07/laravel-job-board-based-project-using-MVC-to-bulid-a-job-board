<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Post;

class CommentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'author' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'author.required' => 'field is required.',
            'content.required'   => 'field is required.',
        ];
    }
}