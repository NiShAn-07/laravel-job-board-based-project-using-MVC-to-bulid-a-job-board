<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Post;

class BlogPostRequest extends FormRequest
{
    public function rules(): array
    {
       return [
            'title' => "bail|required|unique:post,title,{$this->input('id')}", // $this->input('id') is used to ignore the current post when checking for uniqueness on update
            'body' => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required'  => 'field is required.',
            'body.required'   => 'field is required.',
        ];
    }
}