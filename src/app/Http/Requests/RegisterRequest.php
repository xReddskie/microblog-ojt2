<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
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
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'birthday' => 'required|date',
            'lot_block' => 'nullable|string|max:255',
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'zip_code' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'username' => 'required|string|max:255|unique:users',
            'phone_number' => 'nullable|string|max:255',
            'password' => 'required|string|confirmed|min:8',
        ];
    }
    /**
     * Prepare the data for validation.
     *
     * @return array<string, mixed>
     */
    public function pascal(): array
    {
        $validated = parent::pascal();

        // Convert first_name and last_name to PascalCase
        $validated['first_name'] = Str::studly($validated['first_name']);
        $validated['last_name'] = Str::studly($validated['last_name']);

        return $validated;
    }
}
