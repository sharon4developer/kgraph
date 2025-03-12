<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;

class ServiceContentPoint extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'service_content_points';

    protected $fillable = ['title', 'service_point_id', 'status', 'order'];

    public function servicePoint()
    {
        return  $this->belongsTo(ServicePoint::class, 'service_point_id');
    }

    public function Title()
    {
        return $this->hasMany(ServiceContentTitle::class, 'service_content_point_id');
    }

    public function Options()
    {
        return $this->hasMany(ServiceContentOptions::class, 'id', 'service_content_point_id');
    }

    public static function getFullData($data)
    {
        $locationData = getLocationData();

        $value =  SELF::with('servicePoint')->select('title', 'id', 'status', 'created_at', 'service_point_id')
            ->where(function ($query) use ($data) {
                if (isset($data->service_id)) {
                    $query->where('service_point_id', $data->service_id);
                }
            })
            ->whereHas('servicePoint', function ($query) {
                // Ensure servicePoint exists
            })->orderBy('order', 'asc');

        return DataTables::of($value)
            ->addIndexColumn()
            ->addColumn('service_id', function ($row) {
                return @$row->servicePoint->title . ' (' . @$row->servicePoint->Services->title . ')';
            })
            ->addColumn('can_delete', function ($row) {
                return Gate::allows('service-points-delete');
            })
            ->addColumn('can_edit', function ($row) {
                return Gate::allows('service-points-edit');
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'edit', 'delete'])
            ->make(true);
    }

    public static function createData($data)
    {
        $value = new ServiceContentPoint;
        $value->service_point_id   = $data->service_id;
        $value->title        = $data->title;
        $value->status       = 1;
        return $value->save();
    }

    public static function getData($id)
    {
        return SELF::with('Options')->find($id);
    }

    public static function updateData($data)
    {
        $value = ServiceContentPoint::find($data->service_point_content_id);
        $value->service_point_id        = $data->service_id;
        $value->title        = $data->title;
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

    public static function getFullDataForHome()
    {
        return SELF::select('id', 'title')->orderBy('order', 'asc')->where('status', 1)->get();
    }

    public static function createPointData($data)
    {
        $contents = $data->input('titles');

        $servicePointContentId = $contents['service_point_content_id'];
        $titles =  $contents['titles'];
        $existingDatas = ServiceContentTitle::where('service_content_point_id', $servicePointContentId)->get();

        if ($existingDatas->isNotEmpty()) {
            // Use transaction to ensure atomicity
            DB::transaction(function () use ($existingDatas) {
                foreach ($existingDatas as $existingData) {
                    // Delete related options and sub-options for each title
                    foreach ($existingData->options as $option) {
                        $option->subOptions()->delete(); // Delete sub-options
                        $option->delete(); // Delete the option itself
                    }

                    $existingData->paragraphs()->delete(); // Delete related paragraphs
                    $existingData->delete(); // Finally, delete the title
                }
            });
        }
        foreach ($titles as $titleData) {

            // dd($titleData['title'], $servicePointContentId);

            $title = ServiceContentTitle::create([
                'name' => $titleData['title'],
                'service_content_point_id' => $servicePointContentId, // Associate with service point
            ]);

            foreach ($titleData['options'] as $option) {
                if ($option['type'] === 'paragraph') {
                    $title->paragraphs()->create(['content' => $option['content'], 'url' => $option['url']]);
                } elseif ($option['type'] === 'option') {
                    foreach ($option['multiOptions'] as $multiOption) {
                        $mainOption = $title->options()->create(['value' => $multiOption['value']]);

                        foreach ($multiOption['subOptions'] as $subOption) {
                            $mainOption->subOptions()->create(['value' => $subOption]);
                        }
                    }
                }
            }
        }

        return true;
    }
}
