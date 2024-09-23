<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
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
            'description' => 'required',
            'date' => 'required',
            'time' => 'required',
            'name' => 'required',
            'topics' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif,webp',
            'user_image' => 'mimes:jpeg,png,jpg,gif,webp',
            'blog_id' => 'required|exists:blogs,id',
        ];
    }
}
