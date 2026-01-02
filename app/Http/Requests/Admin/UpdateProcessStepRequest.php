<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProcessStepRequest extends FormRequest
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
            'service_id' => 'nullable|integer|exists:services,id',
            'step_number' => 'required|string|max:10',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|in:users,shield,check,award,trending-up,globe,book-open,briefcase,clock,check-circle,users-group',
            'order' => 'required|integer|min:0',
            'status' => 'boolean',
            'timeline' => 'nullable|string|max:50',
            'is_default' => 'boolean',
            'process_step_id' => 'required|exists:process_steps,id',
        ];
    }
}
