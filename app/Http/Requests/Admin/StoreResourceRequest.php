<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreResourceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required',
            'category_id' => 'required|exists:resource_categories,id',
            'description' => 'required',
            'date' => 'required',
            'time' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,webp',
        ];
    }
}
