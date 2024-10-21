<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;

class ServiceContent extends Model
{
    use HasFactory;

    protected $table = 'service_contents';

    protected $fillable = ['service_title', 'service_description','certificate_title','certificate_description'];

    public static function getFullData($data)
    {
        $value =  SELF::select('service_title', 'service_description','certificate_title','certificate_description','id')->get();

        return DataTables::of($value)
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

    public static function createData($data)
    {
        $value = new ServiceContent;
        $value->service_title             = $data->service_title;
        $value->service_description              = $data->service_description;
        $value->certificate_title         = $data->certificate_title;
        $value->certificate_description     = $data->certificate_description;

        return $value->save();
    }

    public static function getData($id)
    {
        return SELF::find($id);
    }

    public static function updateData($data)
    {
        $value = ServiceContent::find($data->service_id);
        $value->service_title             = $data->service_title;
        $value->service_description              = $data->service_description;
        $value->certificate_title         = $data->certificate_title;
        $value->certificate_description     = $data->certificate_description;

        return $value->save();
    }

    public static function getFullDataForHome(){
        return SELF::first(['service_title', 'service_description','certificate_title','certificate_description','id']);
    }

    public static function getCount(){
        return SELF::count();
    }
}
