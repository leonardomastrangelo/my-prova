<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'category_id' => ['nullable', 'exists:categories,id'],
            'title' => ['required', 'min:3', 'max:200', 'unique:projects'],
            'logo' => ['nullable', 'min:4', 'max:255'],
            'image' => ['nullable', 'image'],
            'github' => ['required', 'url', 'unique:projects', 'min:4', 'max:255'],
            'description' => ['nullable'],
            'status' => ['nullable'],
            'technologies' => ['exists:technologies,id'],
        ];
    }
    public function messages(): array
    {
        return [
            'category_id.exists' => 'The category field is invalid.',
            'title.required' => 'The title field is required.',
            'title.min' => 'The title must be at least :min characters.',
            'title.max' => 'The title may not be greater than :max characters.',
            'title.unique' => 'The title has already been taken.',
            'logo.min' => 'The logo must be at least :min characters.',
            'logo.max' => 'The logo may not be greater than :max characters.',
            'image.image' => 'The image must be an image.',
            'github.required' => 'The github field is required.',
            'github.url' => 'The github field is invalid.',
            'github.unique' => 'The github link has already been taken.',
            'github.min' => 'The github field must be at least :min characters.',
            'github.max' => 'The github field must be at least :max characters.',
            'technologies.exists' => 'The technologies field is invalid.',
        ];
    }
}
