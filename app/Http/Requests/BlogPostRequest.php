<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Post;

class BlogPostRequest extends FormRequest
{
    public function rules(): array
    {
        $postModel = new Post();

        $rules = [
            'author' => 'required',
            'body'   => 'required',
        ];

        if ($this->isMethod('post')) {
            // Creating: title must be unique
            $rules['title'] = [
                'bail',
                'required',
                'max:255',
                Rule::unique($postModel->getTable(), 'title'),
            ];
        } elseif ($this->isMethod('put') || $this->isMethod('patch')) {
            // Updating: forbid changing the title (must match existing)
            $postId = $this->route('post') ?? $this->input('id');
            $existing = Post::find($postId);

            if ($existing) {
                $rules['title'] = [
                    'bail',
                    'required',
                    'max:255',
                    function ($attribute, $value, $fail) use ($existing) {
                        if ($value !== $existing->title) {
                            $fail('You are not allowed to change the title.');
                        }
                    },
                ];
            } else {
                // Fallback: require unique except current id (if not found by route)
                $rules['title'] = [
                    'bail',
                    'required',
                    'max:255',
                    Rule::unique($postModel->getTable(), 'title')->ignore($postId, $postModel->getKeyName()),
                ];
            }
        } else {
            $rules['title'] = 'bail|required|max:255';
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'title.required'  => 'field is required.',
            'author.required' => 'field is required.',
            'body.required'   => 'field is required.',
        ];
    }
}