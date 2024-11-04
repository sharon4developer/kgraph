<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageSeo extends Model
{
    use HasFactory;

    protected $table = 'package_seos';

    protected $fillable = ['package_id','meta_title','meta_description','meta_keywords','og_title','og_description','og_url','og_image','schema'];

    public function Package(){
        return  $this->belongsTo(Package::class);
    }

    public static function getData($package_id){
        $returnData = [];
        $locationData = getLocationData();
        $data = SELF::where('package_id',$package_id)->first(['package_id','meta_title','meta_description','meta_keywords','og_title','og_description','og_url','og_image','schema','id']);
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

        $value = SELF::where('package_id',$data->package_id)->first();

        if(!$value)
            $value = new PackageSeo;

        $value->package_id        = $data->package_id;
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

    public static function getSeoDetails($package_id)
    {
        $locationData = getLocationData();
        $data = Package::where('id', $package_id)->first('id');
        if ($data && $data['seo'])
            $data['seo']->og_image = $locationData['storage_server_path'] . $locationData['storage_image_path'] . $data['seo']->og_image;

        return $data;
    }
}
