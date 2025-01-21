<?php

namespace App\Models;

use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CareerContent extends Model
{
    use HasFactory;

    protected $table = 'career_contents';

    protected $fillable = ['title', 'sub_title', 'description'];

    public static function getFullData($data)
    {
        $value =  SELF::select('title', 'sub_title', 'id')->get();

        return DataTables::of($value)
        ->addColumn('can_delete', function ($row) {
            return Gate::allows('careers-delete');
        })
        ->addColumn('can_edit', function ($row) {
            return Gate::allows('career-contents-edit'); })
        ->addIndexColumn()
        ->rawColumns(['action', 'edit', 'delete'])
        ->make(true);
    }

    public static function createData($data)
    {
        $value = new CareerContent;
        $value->title = $data->title;
        $value->description = $data->description;
        $value->sub_title = $data->sub_title;

        return $value->save();
    }

    public static function getData($id)
    {
        return SELF::find($id);
    }

    public static function updateData($data)
    {
        $value = CareerContent::find($data->career_id);
        $value->title = $data->title;
        $value->description = $data->description;
        $value->sub_title = $data->sub_title;

        return $value->save();
    }

    public static function getFullDataForHome(){
        return SELF::first(['title', 'sub_title', 'id', 'description']);
    }

    public static function getCount(){
        return SELF::count();
    }
}
