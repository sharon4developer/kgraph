<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;

class PackageContent extends Model
{
    use HasFactory;

    protected $table = 'package_contents';

    protected $fillable = ['package_title', 'package_description'];

    public static function getFullData($data)
    {
        $value =  SELF::select('package_title', 'package_description','id')->get();

        return DataTables::of($value)
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

    public static function createData($data)
    {
        $value = new PackageContent;
        $value->package_title             = $data->package_title;
        $value->package_description       = $data->package_description;

        return $value->save();
    }

    public static function getData($id)
    {
        return SELF::find($id);
    }

    public static function updateData($data)
    {
        $value = PackageContent::find($data->package_id);
        $value->package_title             = $data->package_title;
        $value->package_description       = $data->package_description;

        return $value->save();
    }

    public static function getFullDataForHome(){
        return SELF::first(['package_title', 'package_description','id']);
    }

    public static function getCount(){
        return SELF::count();
    }
}
