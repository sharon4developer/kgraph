<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class Crew extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'crews';

    protected $fillable = ['name', 'position', 'image', 'intervention_image', 'status','order','address','email','description','alt_tag'];

    public static function getFullData($data)
    {
        $locationData = getLocationData();

        $value =  SELF::select('name', 'image', 'id', 'status', 'created_at','position','email')->orderBy('order', 'asc');

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


        if (isset($data->main) && (bool) $data->main) {

            Crew::where('main', true)->update(['main' => false]);
        }
        $value = new Crew;
        $value->name        = $data->name;
        $value->position  = $data->position;
        $value->address        = $data->address;
        $value->email        = $data->email;
        $value->description  = $data->description;
        $value->position  = $data->position;
        $value->alt_tag           =  $data->alt_tag;
        $value->main = isset($data->main) ? (bool) $data->main : false;
        if ($data->image) {
            $value->image = Cms::storeImage($data->image, $data->name);
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


        if (isset($data->main) && (bool) $data->main) {

            Crew::where('main', true)->update(['main' => false]);
        }

        $value = Crew::find($data->crew_id);
        $value->name        = $data->name;
        $value->position  = $data->position;
        $value->address        = $data->address;
        $value->description  = $data->description;
        $value->email        = $data->email;
        $value->alt_tag           =  $data->alt_tag;
        $value->main = isset($data->main) ? (bool) $data->main : false;
        if ($data->image) {
            $value->image = Cms::storeImage($data->image, $data->name);
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
            $value->delete();
            return true;
        } else
            return false;
    }

    public static function getFullDataForHome(){

        $locationData = getLocationData();

        return SELF::where('main',1)->select(DB::raw("CONCAT('{$locationData['storage_server_path']}', '{$locationData['storage_image_path']}', image) as image"),'id','address','email','description','name', 'position','alt_tag')->orderBy('order','asc')->where('status',1)->first();
    }

    public static function getFullDataForAbout(){
        $locationData = getLocationData();

        return SELF::where('main',0)->select(DB::raw("CONCAT('{$locationData['storage_server_path']}', '{$locationData['storage_image_path']}', image) as image"),'id','address','email','description','name', 'position','alt_tag')->orderBy('order','asc')->where('status',1)->get();
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
