<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;

class PrivacyPolicy extends Model
{
    use HasFactory;

    protected $table = 'privacy_policies';

    protected $fillable = ['description'];

    public static function updateData($data){

        $value = SELF::first();

        if(!$value){
            $value = new PrivacyPolicy;
        }

        $value->description = $data->description;
        return $value->save();
    }

    public static function getData(){
        return SELF::first();
    }
}
