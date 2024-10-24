<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    use HasFactory;

    protected $table = 'seos';

    protected $fillable = ['page_id','meta_title','meta_description','meta_keywords','og_title','og_description','og_url','og_image','schema'];

    public function page(){
        return  $this->belongsTo(Page::class);
    }

    public static function getData($page_id){
        $returnData = [];
        $locationData = getLocationData();
        $data = SELF::where('page_id',$page_id)->first(['page_id','meta_title','meta_description','meta_keywords','og_title','og_description','og_url','og_image','schema','id']);
        if($data)
            $data->og_image = $locationData['storage_server_path'].$locationData['storage_image_path'].$data->og_image;

        if($data){
            $returnData = [
                'status' => true,
                'seo' => $data
            ];
        }
        else{
            $returnData = [
                'status' => false
            ];
        }

        return $returnData;
    }

    public static function createData($data){

        $value = SELF::where('page_id',$data->page_id)->first();

        if(!$value)
            $value = new Seo;

        $value->page_id           = $data->page_id;
        $value->meta_title        = $data->meta_title;
        $value->meta_description  = $data->meta_description;
        $value->meta_keywords     = $data->meta_keywords;
        $value->og_title          = $data->og_title;
        $value->og_description    = $data->og_description;
        $value->og_url            = $data->og_url;
        $value->schema            = $data->schema;
        if ($data->og_image) {
            $path = Cms::storeImage($data->og_image,$data->meta_title);
            $value->og_image = $path;
        };
        return $value->save();
    }
}
