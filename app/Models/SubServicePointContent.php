<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Yajra\DataTables\Facades\DataTables;

class SubServicePointContent extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'sub_service_point_contents';

    protected $fillable = ['title', 'sub_service_point_id', 'status','order'];

    public function SubServicePoint(){
        return  $this->belongsTo(SubServicesPoint::class,'sub_service_point_id');
    }


    public function Options()
    {
        return $this->hasMany(ServicePointContentPoints::class,'service_point_content_id')->orderBy('order', 'asc');
    }

    public static function getFullData($data)
    {
        $locationData = getLocationData();

        $value =  SELF::with('SubServicePoint')->select('title', 'id', 'status', 'created_at', 'sub_service_point_id')
                ->where(function ($query) use ($data) {
                    if (isset($data->service_id)) {
                        $query->where('sub_service_point_id', $data->service_id);
                    }
                })->orderBy('order', 'asc');

        return DataTables::of($value)
            ->addIndexColumn()
            ->addColumn('service_id', function ($row) {
                return $row->SubServicePoint->title;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public static function createData($data)
    {
        $value = new SubServicePointContent;
        $value->sub_service_point_id   = $data->service_id;
        $value->title        = $data->title;
        $value->status       = 1;
        return $value->save();
    }

    public static function getData($id)
    {
        return SELF::with('Options')->find($id);
    }

    public static function updateData($data)
    {
        $value = SubServicePointContent::find($data->service_point_content_id);
        $value->sub_service_point_id        = $data->service_id;
        $value->title        = $data->title;
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

     public static function getFullDataForHome(){
        return SELF::select('id','title')->orderBy('order','asc')->where('status',1)->get();
    }
}
