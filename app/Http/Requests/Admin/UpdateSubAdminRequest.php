<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubAdminRequest extends FormRequest
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
            'name'     => 'required',
            'email'    => 'required',
            'address'  => 'required',
            'password' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->table_id,
            'phone' => 'required|numeric|unique:users,phone,' . $this->table_id,
        ];
    }
}
