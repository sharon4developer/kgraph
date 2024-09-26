<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Yajra\DataTables\Facades\DataTables;

class OurStory extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'our_stories';

    protected $fillable = ['title', 'description', 'image','second_image','second_intervention_image', 'intervention_image', 'status','order','year'];

    public static function getFullData($data)
    {
        $locationData = getLocationData();

        $value =  SELF::select('title','year', 'image', 'second_image', 'id', 'status', 'created_at')->orderBy('order', 'asc');

        return DataTables::of($value)
            ->editColumn('image', function ($row) use($locationData) {
                return $locationData['storage_server_path'].$locationData['storage_image_path'].$row->image;
            })
            ->editColumn('second_image', function ($row) use($locationData) {
                return $locationData['storage_server_path'].$locationData['storage_image_path'].$row->second_image;
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

    public static function createData($data)
    {
        $value = new OurStory;
        $value->title        = $data->title;
        $value->description  = $data->description;
        $value->year  = $data->year;
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
        $value->status       = 1;
        return $value->save();
    }

    public static function getData($id)
    {
        return SELF::find($id);
    }

    public static function updateData($data)
    {
        $value = OurStory::find($data->our_story_id);
        $value->title        = $data->title;
        $value->description  = $data->description;
        $value->year  = $data->year;
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
        return SELF::select('image','id','title','description','year','second_image')->orderBy('order','asc')->where('status',1)->get();
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
