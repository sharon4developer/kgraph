<?php

namespace App\Models;

use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faq extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'faqs';

    protected $fillable = ['title', 'description', 'status','order'];

    public static function getFullData($data)
    {
        $locationData = getLocationData();

        $value =  SELF::select('title', 'id', 'status', 'created_at')->orderBy('order', 'asc');

        return DataTables::of($value)
        ->addColumn('can_delete', function ($row)
        { return Gate::allows('faq-delete'); })
         ->addColumn('can_edit', function ($row)
         { return Gate::allows('faq-edit'); })
          ->addIndexColumn()
          ->rawColumns(['action'])
          ->make(true);
    }



    public static function createData($data)
    {
        $value = new Faq;
        $value->title        = $data->title;
        $value->description  = $data->description;
        $value->status       = 1;
        return $value->save();
    }

    public static function getData($id)
    {
        return SELF::find($id);
    }

    public static function updateData($data)
    {
        $value = Faq::find($data->faq_id);
        $value->title        = $data->title;
        $value->description  = $data->description;
        return $value->save();
    }

    public static function changeStatus($data)
    {
        $value = SELF::find($data->id);
        if ($value) {
            $value->status = $value->status == 1 ? 0 : 1;
            $value->save();
            return true;
        } else
            return false;
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
        foreach ($data->order as $key => $value) {
            $step = SELF::find($value['id']);
            if ($step) {
                $step->order = $key;
                $step->save();
            }
        }
        return true;
    }

    public static function getFullDataForHome(){
        return SELF::select('title', 'description', 'id')->orderBy('order','asc')->where('status',1)->get();
    }
}
