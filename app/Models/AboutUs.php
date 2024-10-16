<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;

class AboutUs extends Model
{
    use HasFactory;

    protected $table = 'about_us';

    protected $fillable = ['mission', 'vision','about_title','about_sub_title','about_description','about_image','journey_title','journey_sub_title','journey_description','journey_image','our_story_title','location_title','location_image1','location_image2','location_image3','about_image_alt_tag','journey_image_alt_tag','location_image1_alt_tag','location_image2_alt_tag','location_image3_alt_tag','location_sub_title','crew_title'];

    public static function getFullData($data)
    {
        $value =  SELF::select('mission', 'vision','about_title','about_sub_title','about_description','about_image','journey_title','journey_sub_title','journey_description','journey_image','our_story_title','location_title','location_image1','location_image2','location_image3','about_image_alt_tag','journey_image_alt_tag','location_image1_alt_tag','location_image2_alt_tag','location_image3_alt_tag','id','location_sub_title','crew_title')->get();

        return DataTables::of($value)
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

    public static function createData($data)
    {
        $value = new AboutUs;
        $value->mission             = $data->mission;
        $value->vision              = $data->vision;
        $value->about_title         = $data->about_title;
        $value->about_sub_title     = $data->about_sub_title;
        $value->about_description   = $data->about_description;
        $value->journey_title       = $data->journey_title;
        $value->journey_sub_title   = $data->journey_sub_title;
        $value->journey_description = $data->journey_description;
        $value->our_story_title     = $data->our_story_title;
        $value->location_title      = $data->location_title;
        $value->location_sub_title      = $data->location_sub_title;
        $value->crew_title      = $data->crew_title;
        $value->about_image_alt_tag       = $data->about_image_alt_tag;
        $value->journey_image_alt_tag   = $data->journey_image_alt_tag;
        $value->location_image1_alt_tag = $data->location_image1_alt_tag;
        $value->location_image2_alt_tag     = $data->location_image2_alt_tag;
        $value->location_image3_alt_tag      = $data->location_image3_alt_tag;
        if ($data->about_image) {
            $value->about_image = Cms::storeImage($data->about_image, $data->about_title);
        };
        if ($data->journey_image) {
            $value->journey_image = Cms::storeImage($data->journey_image, $data->journey_title);
        };
        if ($data->location_image1) {
            $value->location_image1 = Cms::storeImage($data->location_image1, $data->location_title);
        };
        if ($data->location_image2) {
            $value->location_image2 = Cms::storeImage($data->location_image2, $data->location_title);
        };
        if ($data->location_image3) {
            $value->location_image3 = Cms::storeImage($data->location_image3, $data->location_title);
        };
        return $value->save();
    }

    public static function getData($id)
    {
        return SELF::find($id);
    }

    public static function updateData($data)
    {
        $value = AboutUs::find($data->about_us_id);
        $value->mission             = $data->mission;
        $value->vision              = $data->vision;
        $value->about_title         = $data->about_title;
        $value->about_sub_title     = $data->about_sub_title;
        $value->about_description   = $data->about_description;
        $value->journey_title       = $data->journey_title;
        $value->journey_sub_title   = $data->journey_sub_title;
        $value->journey_description = $data->journey_description;
        $value->our_story_title     = $data->our_story_title;
        $value->location_title      = $data->location_title;
        $value->location_sub_title      = $data->location_sub_title;
        $value->crew_title      = $data->crew_title;
        $value->about_image_alt_tag       = $data->about_image_alt_tag;
        $value->journey_image_alt_tag   = $data->journey_image_alt_tag;
        $value->location_image1_alt_tag = $data->location_image1_alt_tag;
        $value->location_image2_alt_tag     = $data->location_image2_alt_tag;
        $value->location_image3_alt_tag      = $data->location_image3_alt_tag;
        if ($data->about_image) {
            $value->about_image = Cms::storeImage($data->about_image, $data->about_title);
        };
        if ($data->journey_image) {
            $value->journey_image = Cms::storeImage($data->journey_image, $data->journey_title);
        };
        if ($data->location_image1) {
            $value->location_image1 = Cms::storeImage($data->location_image1, $data->location_title);
        };
        if ($data->location_image2) {
            $value->location_image2 = Cms::storeImage($data->location_image2, $data->location_title);
        };
        if ($data->location_image3) {
            $value->location_image3 = Cms::storeImage($data->location_image3, $data->location_title);
        };
        return $value->save();
    }

    public static function getFullDataForHome(){
        return SELF::first(['mission', 'vision','about_title','about_sub_title','about_description','about_image','journey_title','journey_sub_title','journey_description','journey_image','our_story_title','location_title','location_image1','location_image2','location_image3','about_image_alt_tag','journey_image_alt_tag','location_image1_alt_tag','location_image2_alt_tag','location_image3_alt_tag','location_sub_title','id','crew_title']);
    }

    public static function getCount(){
        return SELF::count();
    }
}
