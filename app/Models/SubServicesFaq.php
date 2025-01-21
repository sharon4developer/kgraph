<?php

namespace App\Models;

use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubServicesFaq extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'sub_services_faqs';

    protected $fillable = ['title', 'description', 'status','order', 'sub_service_id'];

    public function Services(){
        return  $this->belongsTo(SubServices::class,'sub_service_id');
    }

    public static function getFullData($data)
    {
        $locationData = getLocationData();

        $value =  SELF::with('Services')->select('title', 'id', 'status', 'created_at', 'sub_service_id')
                ->where(function ($query) use ($data) {
                    if (isset($data->service_id)) {
                        $query->where('sub_service_id', $data->service_id);
                    }
                })->orderBy('order', 'asc');

        return DataTables::of($value)
            ->addIndexColumn()
            ->addColumn('service_id', function ($row) {
                return $row->Services->title;
            })
            ->addColumn('can_delete', function ($row) {
                return Gate::allows('sub-service-faq-delete');
            })
            ->addColumn('can_edit', function ($row) {
                return Gate::allows('sub-service-faq-edit'); })
            ->addIndexColumn()
            ->rawColumns(['action', 'edit', 'delete'])
            ->make(true);
    }

    public static function createData($data)
    {
        $value = new SubServicesFaq;
        $value->sub_service_id   = $data->service_id;
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
        $value = SubServicesFaq::find($data->service_faq_id);
        $value->sub_service_id        = $data->service_id;
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
}
