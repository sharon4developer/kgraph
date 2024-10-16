<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;

class Home extends Model
{
    use HasFactory;

    protected $table = 'homes';

    protected $fillable = [
        // Services section
        'service_first_title', 'service_second_title', 'service_sub_title', 'service_description',

        // Who We Are section
        'who_we_are_first_title', 'who_we_are_second_title', 'who_we_are_sub_title',

        // Journey section
        'journey_title', 'journey_description', 'journey_image1', 'journey_image2', 'journey_image3',
        'journey_image1_alt_tag', 'journey_image2_alt_tag', 'journey_image3_alt_tag',

        // Certificate section
        'certificate_title', 'certificate_description', 'certificate_image1', 'certificate_image2', 'certificate_image3',
        'certificate_image1_alt_tag', 'certificate_image2_alt_tag', 'certificate_image3_alt_tag',

        // Testimonial section
        'testimonial_title', 'testimonial_sub_title', 'testimonial_description',

        // Blog section
        'blog_title', 'blog_sub_title', 'blog_description',

        // Explore section
        'explore_title', 'explore_sub_title',

        // FAQ section
        'faq_title', 'faq_sub_title'
    ];

    // Fetch data for DataTables
    public static function getFullData($data)
    {
        $value =  SELF::select([
            'service_first_title', 'service_second_title', 'service_sub_title', 'service_description',
            'who_we_are_first_title', 'who_we_are_second_title', 'who_we_are_sub_title',
            'journey_title', 'journey_description', 'journey_image1', 'journey_image2', 'journey_image3',
            'journey_image1_alt_tag', 'journey_image2_alt_tag', 'journey_image3_alt_tag',
            'certificate_title', 'certificate_description', 'certificate_image1', 'certificate_image2', 'certificate_image3',
            'certificate_image1_alt_tag', 'certificate_image2_alt_tag', 'certificate_image3_alt_tag',
            'testimonial_title', 'testimonial_sub_title', 'testimonial_description',
            'blog_title', 'blog_sub_title', 'blog_description',
            'explore_title', 'explore_sub_title',
            'faq_title', 'faq_sub_title',
            'id'
        ])->get();

        return DataTables::of($value)
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

    // Create new Home entry
    public static function createData($data)
    {
        $value = new Home;

        // Services
        $value->service_first_title     = $data->service_first_title;
        $value->service_second_title    = $data->service_second_title;
        $value->service_sub_title       = $data->service_sub_title;
        $value->service_description     = $data->service_description;

        // Who We Are
        $value->who_we_are_first_title  = $data->who_we_are_first_title;
        $value->who_we_are_second_title = $data->who_we_are_second_title;
        $value->who_we_are_sub_title    = $data->who_we_are_sub_title;

        // Journey
        $value->journey_title           = $data->journey_title;
        $value->journey_description     = $data->journey_description;
        $value->journey_image1_alt_tag  = $data->journey_image1_alt_tag;
        $value->journey_image2_alt_tag  = $data->journey_image2_alt_tag;
        $value->journey_image3_alt_tag  = $data->journey_image3_alt_tag;

        // Certificate
        $value->certificate_title       = $data->certificate_title;
        $value->certificate_description = $data->certificate_description;
        $value->certificate_image1_alt_tag = $data->certificate_image1_alt_tag;
        $value->certificate_image2_alt_tag = $data->certificate_image2_alt_tag;
        $value->certificate_image3_alt_tag = $data->certificate_image3_alt_tag;

        // Testimonial
        $value->testimonial_title       = $data->testimonial_title;
        $value->testimonial_sub_title   = $data->testimonial_sub_title;
        $value->testimonial_description = $data->testimonial_description;

        // Blog
        $value->blog_title              = $data->blog_title;
        $value->blog_sub_title          = $data->blog_sub_title;
        $value->blog_description        = $data->blog_description;

        // Explore
        $value->explore_title           = $data->explore_title;
        $value->explore_sub_title       = $data->explore_sub_title;

        // FAQ
        $value->faq_title               = $data->faq_title;
        $value->faq_sub_title           = $data->faq_sub_title;

        // Handle image uploads
        if ($data->journey_image1) {
            $value->journey_image1 = Cms::storeImage($data->journey_image1, $data->journey_title);
        };
        if ($data->journey_image2) {
            $value->journey_image2 = Cms::storeImage($data->journey_image2, $data->journey_title);
        };
        if ($data->journey_image3) {
            $value->journey_image3 = Cms::storeImage($data->journey_image3, $data->journey_title);
        };

        if ($data->certificate_image1) {
            $value->certificate_image1 = Cms::storeImage($data->certificate_image1, $data->certificate_title);
        };
        if ($data->certificate_image2) {
            $value->certificate_image2 = Cms::storeImage($data->certificate_image2, $data->certificate_title);
        };
        if ($data->certificate_image3) {
            $value->certificate_image3 = Cms::storeImage($data->certificate_image3, $data->certificate_title);
        };

        return $value->save();
    }

    // Fetch data by ID
    public static function getData($id)
    {
        return SELF::find($id);
    }

    // Update Home entry
    public static function updateData($data)
    {
        $value = Home::find($data->home_page_id);

        // Services
        $value->service_first_title     = $data->service_first_title;
        $value->service_second_title    = $data->service_second_title;
        $value->service_sub_title       = $data->service_sub_title;
        $value->service_description     = $data->service_description;

        // Who We Are
        $value->who_we_are_first_title  = $data->who_we_are_first_title;
        $value->who_we_are_second_title = $data->who_we_are_second_title;
        $value->who_we_are_sub_title    = $data->who_we_are_sub_title;

        // Journey
        $value->journey_title           = $data->journey_title;
        $value->journey_description     = $data->journey_description;
        $value->journey_image1_alt_tag  = $data->journey_image1_alt_tag;
        $value->journey_image2_alt_tag  = $data->journey_image2_alt_tag;
        $value->journey_image3_alt_tag  = $data->journey_image3_alt_tag;

        // Certificate
        $value->certificate_title       = $data->certificate_title;
        $value->certificate_description = $data->certificate_description;
        $value->certificate_image1_alt_tag = $data->certificate_image1_alt_tag;
        $value->certificate_image2_alt_tag = $data->certificate_image2_alt_tag;
        $value->certificate_image3_alt_tag = $data->certificate_image3_alt_tag;

        // Testimonial
        $value->testimonial_title       = $data->testimonial_title;
        $value->testimonial_sub_title   = $data->testimonial_sub_title;
        $value->testimonial_description = $data->testimonial_description;

        // Blog
        $value->blog_title              = $data->blog_title;
        $value->blog_sub_title          = $data->blog_sub_title;
        $value->blog_description        = $data->blog_description;

        // Explore
        $value->explore_title           = $data->explore_title;
        $value->explore_sub_title       = $data->explore_sub_title;

        // FAQ
        $value->faq_title               = $data->faq_title;
        $value->faq_sub_title           = $data->faq_sub_title;

        if ($data->journey_image1) {
            $value->journey_image1 = Cms::storeImage($data->journey_image1, $data->journey_title);
        };
        if ($data->journey_image2) {
            $value->journey_image2 = Cms::storeImage($data->journey_image2, $data->journey_title);
        };
        if ($data->journey_image3) {
            $value->journey_image3 = Cms::storeImage($data->journey_image3, $data->journey_title);
        };

        if ($data->certificate_image1) {
            $value->certificate_image1 = Cms::storeImage($data->certificate_image1, $data->certificate_title);
        };
        if ($data->certificate_image2) {
            $value->certificate_image2 = Cms::storeImage($data->certificate_image2, $data->certificate_title);
        };
        if ($data->certificate_image3) {
            $value->certificate_image3 = Cms::storeImage($data->certificate_image3, $data->certificate_title);
        };

        // Handle other updates here (testimonials, blog, explore, FAQ, etc.)

        return $value->save();
    }

    // Fetch data for the homepage
    public static function getFullDataForHome(){
        return SELF::first([
            'service_first_title', 'service_second_title', 'service_sub_title', 'service_description',
            'who_we_are_first_title', 'who_we_are_second_title', 'who_we_are_sub_title',
            'journey_title', 'journey_description', 'journey_image1', 'journey_image2', 'journey_image3',
            'journey_image1_alt_tag', 'journey_image2_alt_tag', 'journey_image3_alt_tag',
            'certificate_title', 'certificate_description', 'certificate_image1', 'certificate_image2', 'certificate_image3',
            'certificate_image1_alt_tag', 'certificate_image2_alt_tag', 'certificate_image3_alt_tag',
            'testimonial_title', 'testimonial_sub_title', 'testimonial_description',
            'blog_title', 'blog_sub_title', 'blog_description',
            'explore_title', 'explore_sub_title',
            'faq_title', 'faq_sub_title',
            'id'
        ]);
    }

    // Get count of all entries
    public static function getCount(){
        return SELF::count();
    }
}
