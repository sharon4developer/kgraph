<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateResourceRequest extends FormRequest
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
            'image' => 'mimes:jpeg,png,jpg,gif,webp',
            'resource_id' => 'required|exists:resources,id',
        ];
    }
}
