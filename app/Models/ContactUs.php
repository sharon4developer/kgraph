<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;

class ContactUs extends Model
{
    use HasFactory;

    protected $table = 'contact_us';

    protected $fillable = ['description'];

    public static function updateData($data){

        $value = SELF::first();

        if(!$value){
            $value = new ContactUs;
        }

        $value->description = $data->description;
        return $value->save();
    }

    public static function getData(){
        return SELF::first();
    }
}
