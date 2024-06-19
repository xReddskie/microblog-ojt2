<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'content' => 'required|string|max:140',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,jfif,webp|max:2048'
        ];
    }
    public function messages(): array
    {
        return [
            'content.required' => 'The content field is required.',
            'content.max' => 'The content field must not be greater than 140 characters.',
            'images.*.image' => 'Each file must be an image.',
            'images.*.mimes' => 'Each image must be of type: jpeg, png, jpg, gif, jfif, webp.',
            'images.*.max' => 'Each image must not exceed 2048 kilobytes.',
        ];

    }
}
