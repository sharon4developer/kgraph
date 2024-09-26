<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOurStoryRequest extends FormRequest
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
            'year' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif,webp',
            'second_image' => 'mimes:jpeg,png,jpg,gif,webp',
            'our_story_id' => 'required|exists:our_stories,id',
        ];
    }
}
