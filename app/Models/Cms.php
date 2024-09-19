<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;;
use Str;

class Cms extends Model
{
    use HasFactory;

    protected $table = 'cms';

    protected $fillable = [
        'slug', 'title', 'sub_title', 'short_description', 'description', 'first_image', 'second_image',
        'button_enabled', 'button_text', 'button_url', 'status', 'page_id', 'first_image_intervention', 'second_image_intervention'
    ];

    public static function makeInterventionImage($image)
    {
        $img = Image::make($image)->fit(100)->encode('png');
        $str = rand();
        $result = hash("sha256", $str);
        $filename = $result . '.png';
        $locationData = getLocationData();
        $fileNewPath = $locationData['storage_small_image_path'] . $filename;
        Storage::disk('s3')->put($fileNewPath, $img->__toString());

        return $filename;
    }

    public static function getContents($page_id)
    {
        $data = SELF::where('page_id', $page_id)->select(
            'slug',
            'title',
            'sub_title',
            'short_description',
            'description',
            'first_image',
            'second_image',
            'button_enabled',
            'button_text',
            'button_url'
        )->get();
        $returnData = [];
        foreach ($data as $key => $value) {
            $returnData[$value->slug] = $value;
        }
        return $returnData;
    }
    public static function getData($page_id)
    {
        return SELF::where('page_id', $page_id)->get();
    }
    public static function updateData($data)
    {
        if ($data && $data->cms) {
            foreach ($data->cms as $key => $value) {
                $cms = Cms::find($key);
                if ($cms) {
                    // $cms->title = $value['title'] ?? NULL;
                    $cms->sub_title = $value['sub_title'] ?? NULL;
                    $cms->short_description = $value['short_description'] ?? NULL;
                    $cms->description = $value['description'] ?? NULL;
                    $cms->save();
                }
            }
        }
        return true;
    }
    public static function storeVideo($video, $title)
    {
        $fileName = $video->getClientOriginalName();
        $fileName =  str_replace(' ', '', pathinfo($fileName, PATHINFO_FILENAME));
        $slugTitle = str_replace(' ', '', Str::slug($title));
        $filePath =  $slugTitle . '-' . $fileName . '-' . Str::random(15) . '.' . $video->getClientOriginalExtension();
        $locationData = getLocationData();
        $fileNewPath = $locationData['storage_video_path'] . $filePath;
        Storage::disk('s3')->put($fileNewPath, fopen($video, 'r+'), ['visibility' => 'public']);
        return $filePath;
    }


    public static function storeImage($image, $title)
    {
        $fileName = $image->getClientOriginalName();
        $fileName =  str_replace(' ', '', pathinfo($fileName, PATHINFO_FILENAME));
        $slugTitle = str_replace(' ', '', Str::slug($title));
        $filePath =  $slugTitle . '-' . $fileName . '-' . Str::random(15) . '.' . $image->getClientOriginalExtension();
        $locationData = getLocationData();
        $fileNewPath = $locationData['storage_image_path'] . $filePath;
        Storage::disk('s3')->put($fileNewPath, file_get_contents($image));
        return $filePath;
    }
    public static function storeBase64Image($image, $title)
    {
        //get the base-64 from data
        $base64_str = substr($image, strpos($image, ",") + 1);
        //decode base64 string
        $image = base64_decode($base64_str);
        $locationData = getLocationData();
        $imageNmae = Str::random(10) . '.' . 'png';
        $safeName = $locationData['storage_image_path'] . $imageNmae;
        Storage::disk('s3')->put($safeName, $image);
        return $imageNmae;
    }
}
