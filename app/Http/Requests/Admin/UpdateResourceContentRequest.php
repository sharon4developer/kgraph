<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateResourceContentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'resource_title' => 'required',
            'resource_description' => 'required',
            'resource_content_id' => 'required|exists:resource_contents,id',
        ];
    }
}
