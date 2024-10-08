<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Yajra\DataTables\Facades\DataTables;

class Location extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'locations';

    protected $fillable = ['location','image','second_image','second_intervention_image', 'intervention_image', 'status','order','third_image','third_intervention_image','alt_tag','second_alt_tag','third_alt_tag'];

    public static function getFullData($data)
    {
        $locationData = getLocationData();

        $value =  SELF::select('location','third_image', 'image', 'second_image', 'id', 'status', 'created_at')->orderBy('order', 'asc');

        return DataTables::of($value)
            ->editColumn('image', function ($row) use($locationData) {
                return $locationData['storage_server_path'].$locationData['storage_image_path'].$row->image;
            })
            ->editColumn('second_image', function ($row) use($locationData) {
                return $locationData['storage_server_path'].$locationData['storage_image_path'].$row->second_image;
            })
            ->editColumn('third_image', function ($row) use($locationData) {
                return $locationData['storage_server_path'].$locationData['storage_image_path'].$row->third_image;
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

    public static function createData($data)
    {
        $value = new Location;
        $value->location        = $data->location;
        $value->alt_tag           =  $data->alt_tag;
        $value->second_alt_tag           =  $data->second_alt_tag;
        $value->third_alt_tag           =  $data->third_alt_tag;
        if ($data->image) {
            $value->image = Cms::storeImage($data->image, $data->title);
            $intervention_image = $value->image;
            // $intervention_image = Cms::makeInterventionImage($data->image);
            $value->intervention_image = $intervention_image;
        };
        if ($data->second_image) {
            $value->second_image = Cms::storeImage($data->second_image, $data->title);
            $second_intervention_image = $value->second_image;
            // $intervention_image = Cms::makeInterventionImage($data->image);
            $value->second_intervention_image = $second_intervention_image;
        };
        if ($data->third_image) {
            $value->third_image = Cms::storeImage($data->third_image, $data->title);
            $third_intervention_image = $value->third_image;
            // $intervention_image = Cms::makeInterventionImage($data->image);
            $value->third_intervention_image = $third_intervention_image;
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
        $value = Location::find($data->location_id);
        $value->location        = $data->location;
        $value->alt_tag           =  $data->alt_tag;
        $value->second_alt_tag           =  $data->second_alt_tag;
        $value->third_alt_tag           =  $data->third_alt_tag;
        if ($data->image) {
            $value->image = Cms::storeImage($data->image, $data->title);
            $intervention_image = $value->image;
            // $intervention_image = Cms::makeInterventionImage($data->image);
            $value->intervention_image = $intervention_image;
        };
        if ($data->second_image) {
            $value->second_image = Cms::storeImage($data->second_image, $data->title);
            $second_intervention_image = $value->second_image;
            // $intervention_image = Cms::makeInterventionImage($data->image);
            $value->second_intervention_image = $second_intervention_image;
        };
        if ($data->third_image) {
            $value->third_image = Cms::storeImage($data->third_image, $data->title);
            $third_intervention_image = $value->third_image;
            // $intervention_image = Cms::makeInterventionImage($data->image);
            $value->third_intervention_image = $third_intervention_image;
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
            $value->delete();
            return true;
        } else
            return false;
    }

    public static function getFullDataForHome(){
        return SELF::select('image','id','location','third_image','second_image','alt_tag','second_alt_tag','third_alt_tag')->orderBy('order','asc')->where('status',1)->get();
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
