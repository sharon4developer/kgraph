<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Yajra\DataTables\Facades\DataTables;
use Str;

class ServiceCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'service_categories';

    protected $fillable = ['title', 'image', 'intervention_image', 'status','order','alt_tag','slug','sub_title'];

    public function Service(){
        return  $this->hasMany(Service::class);
    }

    public static function getFullData($data)
    {
        $locationData = getLocationData();

        $value =  SELF::select('title', 'image', 'id', 'status', 'created_at')->orderBy('order', 'asc');

        return DataTables::of($value)
            ->editColumn('image', function ($row) use($locationData) {
                return $locationData['storage_server_path'].$locationData['storage_image_path'].$row->image;
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

    public static function createData($data)
    {
        $value = new ServiceCategory;
        $value->title        = $data->title;
        $value->alt_tag           =  $data->alt_tag;
        $value->sub_title           =  $data->sub_title;
        $slug = Str::slug($data->title);
        $value->slug = $slug;
        if ($data->image) {
            $value->image = Cms::storeImage($data->image, $data->title);
            $intervention_image = $value->image;
            // $intervention_image = Cms::makeInterventionImage($data->image);
            $value->intervention_image = $intervention_image;
        };
        $value->status       = 1;
        return $value->save();
    }

    public static function getData($id)
    {
        return SELF::find($id);
    }

    public static function updateData($data)
    {
        $value = ServiceCategory::find($data->service_category_id);
        $value->title        = $data->title;
        $value->alt_tag           =  $data->alt_tag;
        $value->sub_title           =  $data->sub_title;
        $slug = Str::slug($data->title);
        $value->slug = $slug;
        if ($data->image) {
            $value->image = Cms::storeImage($data->image, $data->title);
            $intervention_image = $value->image;
            // $intervention_image = Cms::makeInterventionImage($data->image);
            $value->intervention_image = $intervention_image;
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

            $services = $value->Service;

            foreach ($services as $service) {

                $service->ServicePoint()->delete();

                $service->ServiceFaq()->delete();

                foreach ($service->SubService as $subService) {

                    $subService->ServicePoint()->delete();
                    $subService->ServiceFaq()->delete();
                    $subService->delete();
                }
            }

            $value->Service()->delete();

            $value->delete();

            return true;
        } else
            return false;
    }

    public static function getFullDataForHome(){
        return SELF::with(['Service'])->select('image','id','title','alt_tag','slug','sub_title')->orderBy('order','asc')->where('status',1)->get();
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
