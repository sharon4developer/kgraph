<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Yajra\DataTables\Facades\DataTables;

class ServicePointContentPoints extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'service_point_content_points';

    protected $fillable = ['option', 'service_point_content_id'];

    public function SubServicePoint(){
        return  $this->belongsTo(SubServicePointContent::class,'service_point_content_id');
    }

    public static function createData($data)
    {
        if ($data->option) {
            foreach ($data->option as $key => $option) {
                if ($option) {
                    $value = new ServicePointContentPoints;
                    $value->service_point_content_id = $data->service_point_content_id;
                    $value->option = $option;
                    $value->save();
                }
            }
        }
        if ($data->p_option) {
            foreach ($data->p_option as $key => $p_option) {
                $value = ServicePointContentPoints::find($key);
                if ($value) {
                    $value->option = $p_option;
                    $value->save();
                }
            }
        }
        return true;
    }

    public static function deleteData($data)
    {
        $value = SELF::find($data->id);
        if ($value) {
            $value->delete();
            return true;
        } else
            return false;
    }

    public static function updateOrder($data)
    {
        foreach ($data->items as $key => $value) {
            $step = SELF::find($value);
            if ($step) {
                $step->order = $key;
                $step->save();
            }
        }
        return true;
    }
}
