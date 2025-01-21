<?php

namespace App\Models;

use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Journey extends Model
{
    use HasFactory;

    protected $table = 'journeys';

    protected $fillable = ['experience', 'employees', 'ratings', 'offices', 'customers','cases'];

    public static function getFullData($data)
    {
        $value =  SELF::select('*');

        return DataTables::of($value)
        ->addColumn('can_delete', function ($row) {
            return Gate::allows('journey-delete');
        })
        ->addColumn('can_edit', function ($row) {
            return Gate::allows('journey-edit'); })
        ->addIndexColumn()
        ->rawColumns(['action', 'edit', 'delete'])
        ->make(true);
    }

    public static function createData($data)
    {
        $value = new Journey;
        $value->experience        = $data->experience;
        $value->employees        = $data->employees;
        $value->ratings  = $data->ratings;
        $value->offices  = $data->offices;
        $value->customers  = $data->customers;
        $value->cases  = $data->cases;
        return $value->save();
    }

    public static function getData($id)
    {
        return SELF::find($id);
    }

    public static function updateData($data)
    {
        $value = Journey::find($data->journey_id);
        $value->experience        = $data->experience;
        $value->employees        = $data->employees;
        $value->ratings  = $data->ratings;
        $value->offices  = $data->offices;
        $value->customers  = $data->customers;
        $value->cases  = $data->cases;
        return $value->save();
    }

    public static function getFullDataForHome(){
        return SELF::first();
    }

    public static function getCount(){
        return SELF::count();
    }
}
