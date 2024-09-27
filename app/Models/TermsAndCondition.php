<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;

class TermsAndCondition extends Model
{
    use HasFactory;

    protected $table = 'terms_and_conditions';

    protected $fillable = ['description'];

    public static function updateData($data){

        $value = SELF::first();

        if(!$value){
            $value = new TermsAndCondition;
        }

        $value->description = $data->description;
        return $value->save();
    }

    public static function getData(){
        return SELF::first();
    }
}
