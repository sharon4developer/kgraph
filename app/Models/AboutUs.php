<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;

class AboutUs extends Model
{
    use HasFactory;

    protected $table = 'about_us';

    protected $fillable = ['mission', 'vision'];

    public static function getFullData($data)
    {
        $value =  SELF::select('*');

        return DataTables::of($value)
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

    public static function createData($data)
    {
        $value = new AboutUs;
        $value->mission        = $data->mission;
        $value->vision        = $data->vision;
        return $value->save();
    }

    public static function getData($id)
    {
        return SELF::find($id);
    }

    public static function updateData($data)
    {
        $value = AboutUs::find($data->about_us_id);
        $value->mission        = $data->mission;
        $value->vision        = $data->vision;
        return $value->save();
    }

    public static function getFullDataForHome(){
        return SELF::first();
    }

    public static function getCount(){
        return SELF::count();
    }
}
