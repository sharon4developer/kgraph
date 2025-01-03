<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EligibilityCheck_nRequest extends FormRequest
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
            'name_n' => 'required|string|max:255',
            'email_n' => 'required|email',
            'country_n' => 'required',
            'mobile_n' => 'required',
            'message_n' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'resume_n' => 'required|file|mimes:pdf,doc,docx|max:10240',
        ];
}
}
