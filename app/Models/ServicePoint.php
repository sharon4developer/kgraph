<?php

namespace App\Models;

use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServicePoint extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'service_points';

    protected $fillable = ['title', 'description', 'status', 'order', 'service_id'];

    public function Services()
    {
        return  $this->belongsTo(Service::class, 'service_id');
    }

    public function ServicePointContents()
    {
        return  $this->hasMany(ServiceContentPoint::class, 'service_point_id')->orderBy('order', 'asc');
    }

    public static function getFullData($data)
    {
        $locationData = getLocationData();

        $value =  SELF::with('Services')->select('title', 'id', 'status', 'created_at', 'service_id')
            ->where(function ($query) use ($data) {
                if (isset($data->service_id)) {
                    $query->where('service_id', $data->service_id);
                }
            })->orderBy('order', 'asc');

        return DataTables::of($value)
            ->addIndexColumn()
            ->editColumn('service_id', function ($row) {
                return $row->Services->title;
            })
            ->addColumn('can_delete', function ($row) {
                return Gate::allows('service-points-delete');
            })
            ->addColumn('can_edit', function ($row) {
                return Gate::allows('service-points-edit');
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'edit', 'delete'])
            ->make(true);
    }

    public static function createData($data)
    {
        $value = new ServicePoint;
        $value->service_id   = $data->service_id;
        $value->title        = $data->title;
        $value->description  = $data->description;
        $value->status       = 1;
        return $value->save();
    }

    public static function getData($id)
    {
        return SELF::find($id);
    }

    public static function updateData($data)
    {
        $value = ServicePoint::find($data->service_point_id);
        $value->service_id        = $data->service_id;
        $value->title        = $data->title;
        $value->description  = $data->description;
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

    public static function getFullDataForHome()
    {
        return SELF::with('Services')->select('id', 'title', 'service_id')->orderBy('order', 'asc')->where('status', 1)->get();
    }
}
