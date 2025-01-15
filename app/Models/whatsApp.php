<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;

class whatsApp extends Model
{
    protected $table = 'whats_apps';
    protected $fillable = ['phone'];


    protected static function createData($data)
    {

        $value = new whatsApp();
        $value->phone = $data->phone;

        $value->status       = 1;
        return $value->save();
    }
    public static function getData($id)
    {

        return SELF::find($id);
    }
    public static function getFullData($data)
    {


        $value =  SELF::select('phone', 'created_at','id');

        return DataTables::of($value)

            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
    public static function updateData($data)
    {
        $value = whatsApp::find($data->table_id);

        $value->phone = $data->phone;

        $value->status       = 1;
        return $value->save();
    }
}
