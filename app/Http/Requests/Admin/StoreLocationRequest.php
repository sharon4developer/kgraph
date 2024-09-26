<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreLocationRequest extends FormRequest
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
            'location' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif,webp',
            'second_image' => 'mimes:jpeg,png,jpg,gif,webp',
            'third_image' => 'mimes:jpeg,png,jpg,gif,webp',
        ];
    }
}
