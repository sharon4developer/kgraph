<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreSeoRequest extends FormRequest
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
            // 'meta_title' => 'required',
            // 'meta_description' => 'required',
            // 'meta_keywords' => 'required',
            // 'og_title' => 'required',
            // 'og_description' => 'required',
            // 'og_url' => 'required',
            // 'og_image' => 'required_if:seo_id,""|mimes:jpeg,png,jpg,gif',
            'page_id' => 'required|exists:pages,id',
        ];
    }
}
