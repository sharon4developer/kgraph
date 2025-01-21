<?php

namespace App\Models;

use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Explore extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'explores';

    protected $fillable = ['image', 'intervention_image', 'status','order','alt_tag'];

    public static function getFullData($data)
    {
        $locationData = getLocationData();

        $value =  SELF::select('image', 'id', 'status', 'created_at')->orderBy('order', 'asc');

        return DataTables::of($value)
            ->editColumn('image', function ($row) use($locationData) {
                return $locationData['storage_server_path'].$locationData['storage_image_path'].$row->image;
            })
            ->addColumn('can_delete', function ($row) {
                return Gate::allows('explore-delete');
            })
            ->addColumn('can_edit', function ($row) {
                return Gate::allows('explore-edit'); })
            ->addIndexColumn()
            ->rawColumns(['action', 'edit', 'delete'])
            ->make(true);
    }

    public static function createData($data)
    {
        $value = new Explore;
        $value->alt_tag           =  $data->alt_tag;
        if ($data->image) {
            $value->image = Cms::storeImage($data->image, 'crew');
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
        $value = Explore::find($data->explore_id);
        $value->alt_tag           =  $data->alt_tag;
        if ($data->image) {
            $value->image = Cms::storeImage($data->image, 'crew');
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
        return SELF::select('image','id','alt_tag')->orderBy('order','asc')->where('status',1)->get();
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
