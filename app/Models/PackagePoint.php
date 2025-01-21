<?php

namespace App\Models;

use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PackagePoint extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'package_points';

    protected $fillable = ['title', 'description', 'status','order', 'package_id'];

    public function Packages(){
        return  $this->belongsTo(Package::class,'package_id')->withTrashed();
    }

    public static function getFullData($data)
    {
        $value =  SELF::with('Packages')->select('title', 'id', 'status', 'created_at', 'package_id')
                ->where(function ($query) use ($data) {
                    if (isset($data->package_id)) {
                        $query->where('package_id', $data->package_id);
                    }
                })->orderBy('order', 'asc');

        return DataTables::of($value)
            ->addIndexColumn()
            ->editColumn('package_id', function ($row) {
                return $row->Packages->title;
            })
            ->addColumn('can_delete', function ($row) {
                return Gate::allows('package-points-delete');
            })
            ->addColumn('can_edit', function ($row) {
                return Gate::allows('package-points-edit'); })
            ->addIndexColumn()
            ->rawColumns(['action', 'edit', 'delete'])
            ->make(true);
    }

    public static function createData($data)
    {
        $value = new PackagePoint;
        $value->package_id   = $data->package_id;
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
        $value = PackagePoint::find($data->package_point_id);
        $value->package_id        = $data->package_id;
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
}
