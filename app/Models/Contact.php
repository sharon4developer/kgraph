<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';

    protected $fillable = ['email','name','country_code','mobile'];

    public static function getFullData()
    {
        $value =  SELF::select('email', 'id', 'created_at','name','country_code','mobile')->orderBy('created_at', 'desc');

        return DataTables::of($value)
            ->addIndexColumn()
            ->editColumn('mobile', function ($row) {
                return $row->country_code . $row->mobile;
            })
            ->make(true);
    }

    public static function saveContact($data)
    {
        $value = new Contact;
        $value->name = $data->name;
        $value->email = $data->email;
        $value->country_code = $data->country;
        $value->mobile = $data->mobile;
        return $value->save();
    }
}
