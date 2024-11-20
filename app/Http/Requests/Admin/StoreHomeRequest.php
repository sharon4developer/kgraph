<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreHomeRequest extends FormRequest
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
            // Services section
            'service_first_title' => 'required',
            'service_second_title' => 'required',
            'service_sub_title' => 'required',
            'service_description' => 'required',

            // Who We Are section
            'who_we_are_first_title' => 'required',
            'who_we_are_second_title' => 'required',
            'who_we_are_sub_title' => 'required',

            // Journey section
            'journey_title' => 'required',
            'journey_sub_title' => 'required',
            'journey_description' => 'required',
            'journey_image1_alt_tag' => 'required',
            'journey_video' => 'mimes:mp4,mov,avi,mkv,wmv,webm',
            // 'journey_image2_alt_tag' => 'required',
            // 'journey_image3_alt_tag' => 'required',
            'journey_image1' => 'mimes:jpeg,png,jpg,gif,webp',
            // 'journey_image2' => 'mimes:jpeg,png,jpg,gif,webp',
            // 'journey_image3' => 'mimes:jpeg,png,jpg,gif,webp',
            // Certificate section
            'certificate_title' => 'required',
            'certificate_description' => 'required',
            'certificate_image1_alt_tag' => 'required',
            // 'certificate_image2_alt_tag' => 'required',
            // 'certificate_image3_alt_tag' => 'required',
            'certificate_image1' => 'mimes:jpeg,png,jpg,gif,webp',
            // 'certificate_image2' => 'mimes:jpeg,png,jpg,gif,webp',
            // 'certificate_image3' => 'mimes:jpeg,png,jpg,gif,webp',
            // Testimonial section
            'testimonial_title' => 'required',
            'testimonial_sub_title' => 'required',
            'testimonial_description' => 'required',

            // Blog section
            'blog_title' => 'required',
            'blog_sub_title' => 'required',
            'blog_description' => 'required',

            // Explore section
            'explore_title' => 'required',
            'explore_sub_title' => 'required',

            // FAQ section
            'faq_title' => 'required',
            'faq_sub_title' => 'required',
        ];
    }
}
