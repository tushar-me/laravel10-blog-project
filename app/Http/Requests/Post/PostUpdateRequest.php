<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class PostUpdateRequest extends FormRequest
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
            'title' => 'required',
            'thumbnail' => 'mimes:jpeg, png, jpg',
            'content' => 'required',
            'category' => 'required',
            'author_bio' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'The Title field is required.',
            'thumbnail.mimes' => 'The Thumbnail must be a file of type: jpeg, png, jpg.',
            'content.required' => 'The Body Text field is required.',
            'category.required' => 'Please select a Category.',
            'author_bio.max_words' => 'The Author Bio must not exceed 50 words.',
        ];
    }
    protected $stopOnFirstFailure = true;
}
