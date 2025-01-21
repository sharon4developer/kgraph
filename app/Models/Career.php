<?php

namespace App\Models;

use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Career extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'careers';

    protected $fillable = ['title', 'location', 'experience', 'status','order','description','type','overview'];

    public static function getFullData($data)
    {
        $value =  SELF::select('title','location','experience', 'id', 'status', 'created_at')->orderBy('order', 'asc');

        return DataTables::of($value)
            ->addIndexColumn()
            ->addColumn('can_delete', function ($row) {
                return Gate::allows('careers-delete');
            })
            ->addColumn('can_edit', function ($row) {
                return Gate::allows('careers-edit'); })
            ->addIndexColumn()
            ->rawColumns(['action', 'edit', 'delete'])
            ->make(true);
    }

    public static function createData($data)
    {
        $value = new Career;
        $value->title        = $data->title;
        $value->description  = $data->description;
        $value->location  = $data->location;
        $value->experience  = $data->experience;
        $value->type  = $data->type;
        $value->overview  = $data->overview;
        $value->status       = 1;
        return $value->save();
    }

    public static function getData($id)
    {
        return SELF::find($id);
    }

    public static function updateData($data)
    {
        $value = Career::find($data->career_id);
        $value->title        = $data->title;
        $value->description  = $data->description;
        $value->location  = $data->location;
        $value->experience  = $data->experience;
        $value->type  = $data->type;
        $value->overview  = $data->overview;
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
        return SELF::select('location','id','title','description','experience','created_at','type','overview')->orderBy('order','asc')->where('status',1)->get();
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
