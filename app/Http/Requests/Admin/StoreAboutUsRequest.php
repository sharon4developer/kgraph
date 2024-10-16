<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreAboutUsRequest extends FormRequest
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
            'mission' => 'required',
            'vision' => 'required',
            'about_title' => 'required',
            'about_sub_title' => 'required',
            'about_description' => 'required',
            'journey_title' => 'required',
            // 'journey_sub_title' => 'required',
            'journey_description' => 'required',
            'our_story_title' => 'required',
            'location_title' => 'required',
            'about_image_alt_tag' => 'required',
            'journey_image_alt_tag' => 'required',
            'location_image1_alt_tag' => 'required',
            'location_image2_alt_tag' => 'required',
            'location_image3_alt_tag' => 'required',
            'crew_title' => 'required',
            'location_sub_title' => 'required',
        ];
    }
}
