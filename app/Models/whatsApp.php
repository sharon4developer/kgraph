<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;

class whatsApp extends Model
{
    protected $table = 'whats_apps';
    protected $fillable = ['phone','email','youtube','linkedin','instagram','facebook'];


    protected static function createData($data)
    {

        $value = new whatsApp();
        $value->phone = $data->phone;
        $value->email = $data->email;
        $value->facebook = $data->facebook;
        $value->instagram = $data->instagram;
        $value->linkedin = $data->linkedin;
        $value->youtube = $data->youtube;
        $value->status       = 1;
        return $value->save();
    }
    public static function getData($id)
    {

        return SELF::find($id);
    }
    public static function getFullData($data)
    {


        $value =  SELF::select('phone','email', 'created_at','id','youtube','linkedin','instagram','facebook');

        return DataTables::of($value)

            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
    public static function updateData($data)
    {
        $value = whatsApp::find($data->table_id);

        $value->phone = $data->phone;
        $value->email = $data->email;
        $value->facebook = $data->facebook;
        $value->instagram = $data->instagram;
        $value->linkedin = $data->linkedin;
        $value->youtube = $data->youtube;
        $value->status       = 1;
        return $value->save();
    }
}
