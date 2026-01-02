<?php

namespace App\Models;

use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProcessStep extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'process_steps';

    protected $fillable = ['service_id', 'step_number', 'title', 'description', 'icon', 'order', 'status', 'timeline', 'is_default'];

    public function Service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public static function getFullData($data)
    {
        $value = SELF::with('Service')->select('step_number', 'title', 'id', 'status', 'created_at', 'service_id', 'order', 'icon')
            ->where(function ($query) use ($data) {
                if (isset($data->service_id) && $data->service_id != '' && $data->service_id != null) {
                    $query->where('service_id', $data->service_id);
                } else {
                    $query->whereNull('service_id');
                }
            })->orderBy('order', 'asc');

        return DataTables::of($value)
            ->addIndexColumn()
            ->editColumn('service_id', function ($row) {
                return $row->Service ? $row->Service->title : 'Default/Homepage';
            })
            ->addColumn('can_delete', function ($row) {
                return Gate::allows('process-steps-delete');
            })
            ->addColumn('can_edit', function ($row) {
                return Gate::allows('process-steps-edit');
            })
            ->rawColumns(['action', 'edit', 'delete'])
            ->make(true);
    }

    public static function createData($data)
    {
        $value = new ProcessStep;
        $value->service_id = $data->service_id ?? null;
        $value->step_number = $data->step_number;
        $value->title = $data->title;
        $value->description = $data->description;
        $value->icon = $data->icon;
        $value->order = $data->order ?? 0;
        $value->status = isset($data->status) ? $data->status : 1;
        $value->timeline = $data->timeline ?? null;
        $value->is_default = isset($data->is_default) ? $data->is_default : false;
        return $value->save();
    }

    public static function getData($id)
    {
        return SELF::find($id);
    }

    public static function updateData($data)
    {
        $value = ProcessStep::find($data->process_step_id);
        $value->service_id = $data->service_id ?? null;
        $value->step_number = $data->step_number;
        $value->title = $data->title;
        $value->description = $data->description;
        $value->icon = $data->icon;
        $value->order = $data->order ?? 0;
        $value->status = isset($data->status) ? $data->status : 1;
        $value->timeline = $data->timeline ?? null;
        $value->is_default = isset($data->is_default) ? $data->is_default : false;
        return $value->save();
    }

    public static function changeStatus($data)
    {
        $value = SELF::find($data->id);
        if ($value) {
            $value->status = $value->status == 1 ? 0 : 1;
            $value->save();
            return true;
        } else {
            return false;
        }
    }

    public static function deleteData($data)
    {
        $value = SELF::find($data->id);
        if ($value) {
            $value->delete();
            return true;
        } else {
            return false;
        }
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

    public static function getFullDataForHome()
    {
        return SELF::select('id', 'step_number', 'title', 'description', 'icon', 'order', 'timeline')
            ->where(function($query) {
                $query->whereNull('service_id')
                      ->orWhere('is_default', true);
            })
            ->where('status', 1)
            ->orderBy('order', 'asc')
            ->get();
    }

    public static function getFullDataForService($serviceId)
    {
        return SELF::select('id', 'step_number', 'title', 'description', 'icon', 'order', 'timeline')
            ->where('service_id', $serviceId)
            ->where('status', 1)
            ->orderBy('order', 'asc')
            ->get();
    }
}
