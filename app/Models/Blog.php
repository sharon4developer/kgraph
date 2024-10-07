<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Yajra\DataTables\Facades\DataTables;
use Str;

class Blog extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'blogs';

    protected $fillable = ['title', 'description', 'image', 'intervention_image', 'status','order','date','time','user_image','user_intervention_image','name','topics','slug','alt_tag'];

    public static function getFullData($data)
    {
        $locationData = getLocationData();

        $value =  SELF::select('title','name','date', 'image', 'id', 'status', 'created_at','time')->orderBy('order', 'asc');

        return DataTables::of($value)
            ->editColumn('image', function ($row) use($locationData) {
                return $locationData['storage_server_path'].$locationData['storage_image_path'].$row->image;
            })
            ->editColumn('user_image', function ($row) use($locationData) {
                return $locationData['storage_server_path'].$locationData['storage_image_path'].$row->user_image;
            })
            ->editColumn('date', function ($row) {
                return $row->date.' '.$row->time;
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

    public static function createData($data)
    {
        $value = new Blog;
        $value->title        = $data->title;
        $value->description  = $data->description;
        $value->date  = $data->date;
        $value->time  = $data->time;
        $value->name  = $data->name;
        $value->topics  = $data->topics;
        $slug = Str::slug($data->name);
        $value->slug = $slug;
        $value->alt_tag           =  $data->alt_tag;
        $value->user_alt_tag           =  $data->user_alt_tag;
        if ($data->image) {
            $value->image = Cms::storeImage($data->image, $data->title);
            $intervention_image = $value->image;
            // $intervention_image = Cms::makeInterventionImage($data->image);
            $value->intervention_image = $intervention_image;
        };
        if ($data->user_image) {
            $value->user_image = Cms::storeImage($data->user_image, $data->title);
            $user_intervention_image = $value->user_image;
            // $user_intervention_image = Cms::makeInterventionImage($data->user_image);
            $value->user_intervention_image = $user_intervention_image;
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
        $value = Blog::find($data->blog_id);
        $value->title        = $data->title;
        $value->description  = $data->description;
        $value->date  = $data->date;
        $value->time  = $data->time;
        $value->name  = $data->name;
        $value->topics  = $data->topics;
        $slug = Str::slug($data->title);
        $value->slug = $slug;
        $value->alt_tag           =  $data->alt_tag;
        $value->user_alt_tag           =  $data->user_alt_tag;
        if ($data->image) {
            $value->image = Cms::storeImage($data->image, $data->title);
            $intervention_image = $value->image;
            // $intervention_image = Cms::makeInterventionImage($data->image);
            $value->intervention_image = $intervention_image;
        };
        if ($data->user_image) {
            $value->user_image = Cms::storeImage($data->user_image, $data->title);
            $user_intervention_image = $value->user_image;
            // $user_intervention_image = Cms::makeInterventionImage($data->user_image);
            $value->user_intervention_image = $user_intervention_image;
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
        return SELF::select('image','id','title','description','name','date','time','topics','user_image','alt_tag','user_alt_tag','slug')->orderBy('order','asc')->where('status',1)->get();
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
