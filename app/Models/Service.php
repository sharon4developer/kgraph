<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Yajra\DataTables\Facades\DataTables;
use Str;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'services';

    protected $fillable = ['title', 'sub_title', 'image', 'intervention_image', 'status','order','alt_tag','slug','service_category_id','inner_title','banner_image','banner_image_alt_tag'];

    public function ServicePoint(){
        return  $this->hasMany(ServicePoint::class)->orderBy('order', 'asc');
    }

    public function ServiceFaq(){
        return  $this->hasMany(ServiceFaq::class)->orderBy('order', 'asc');
    }

    public function SubService(){
        return  $this->hasMany(SubServices::class)->orderBy('order', 'asc');
    }

    public function ServiceCategory(){
        return  $this->belongsTo(ServiceCategory::class);
    }

    public function Seo(){
        return  $this->hasOne(ServiceSeo::class);
    }

    public static function getFullData($data)
    {
        $locationData = getLocationData();

        $value =  SELF::select('title', 'image', 'id', 'status', 'created_at','service_category_id')
                    ->where(function ($query) use ($data) {
                        if (isset($data->service_category_id)) {
                            $query->where('service_category_id', $data->service_category_id);
                        }
                    })->orderBy('order', 'asc');


        return DataTables::of($value)
            ->editColumn('image', function ($row) use($locationData) {
                return $locationData['storage_server_path'].$locationData['storage_image_path'].$row->image;
            })
            ->editColumn('service_category_id', function ($row) {
                return $row->ServiceCategory->title;
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

    public static function createData($data)
    {
        $value = new Service;
        $value->title        = $data->title;
        $value->sub_title  = $data->sub_title;
        $value->inner_title  = $data->inner_title;
        $value->alt_tag           =  $data->alt_tag;
        $value->service_category_id           =  $data->service_category_id;
        $slug = Str::slug($data->title);
        $value->slug = $slug;
        $value->banner_image_alt_tag           =  $data->banner_image_alt_tag;
        if ($data->image) {
            $value->image = Cms::storeImage($data->image, $data->title);
            $intervention_image = $value->image;
            // $intervention_image = Cms::makeInterventionImage($data->image);
            $value->intervention_image = $intervention_image;
        };
        if ($data->banner_image) {
            $value->banner_image = Cms::storeImage($data->banner_image, $data->title);
        };
        $value->status       = 1;
        return $value->save();
    }

    public static function getData($id)
    {
        return SELF::with(['ServicePoint','ServiceFaq','SubService'])->find($id);
    }

    public static function updateData($data)
    {
        $value = Service::find($data->service_id);
        $value->title        = $data->title;
        $value->sub_title  = $data->sub_title;
        $value->inner_title  = $data->inner_title;
        $value->alt_tag           =  $data->alt_tag;
        $value->service_category_id           =  $data->service_category_id;
        $slug = Str::slug($data->title);
        $value->slug = $slug;
        $value->banner_image_alt_tag           =  $data->banner_image_alt_tag;
        if ($data->image) {
            $value->image = Cms::storeImage($data->image, $data->title);
            $intervention_image = $value->image;
            // $intervention_image = Cms::makeInterventionImage($data->image);
            $value->intervention_image = $intervention_image;
        };
        if ($data->banner_image) {
            $value->banner_image = Cms::storeImage($data->banner_image, $data->title);
        };
        return $value->save();
    }

    public static function changeStatus($data)
    {
        $value = SELF::find($data->id);
        if ($value) {
            $value->status = $value->status == 1 ? 0 : 1;
            $value->save();
            return true;
        } else
            return false;
    }

    public static function deleteData($data)
    {
        $value = SELF::find($data->id);

        if ($value) {

            foreach ($value->SubService as $subService) {

                $subService->ServicePoint()->delete();
                $subService->ServiceFaq()->delete();
                $subService->delete();
            }

            $value->ServicePoint()->delete();

            $value->ServiceFaq()->delete();

            $value->delete();

            return true;
        } else
            return false;
    }

    public static function getFullDataForHome(){
        return SELF::with(['ServicePoint','ServiceFaq'])->select('image','id','title','sub_title','alt_tag','slug','inner_title','banner_image')->orderBy('order','asc')->where('status',1)->get();
    }

    public static function updateOrder($data)
    {
        foreach ($data->order as $key => $value) {
            $step = SELF::find($value['id']);
            if ($step) {
                $step->order = $key;
                $step->save();
            }
        }
        return true;
    }
}
