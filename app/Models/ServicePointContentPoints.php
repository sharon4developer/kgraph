<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ServicePointContentPoints extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'service_point_content_points';

    protected $fillable = ['option', 'service_point_content_id'];

    public function SubServicePoint()
    {
        return  $this->belongsTo(SubServicePointContent::class, 'service_point_content_id');
    }

    public static function createDataOld($data)
    {
        $contents = $data->input('titles');
        $servicePointContentId = $contents['service_point_content_id'];
        $titles =  $contents['titles'];
        foreach ($titles as $titleData) {

            $title = Title::create([
                'name' => $titleData['title'],
                'service_point_content_id' => $servicePointContentId, // Associate with service point
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

        // if ($data->option) {
        //     foreach ($data->option as $key => $option) {
        //         if ($option) {
        //             $value = new ServicePointContentPoints;
        //             $value->service_point_content_id = $data->service_point_content_id;
        //             $value->option = $option;
        //             $value->save();
        //         }
        //     }
        // }
        // if ($data->p_option) {
        //     foreach ($data->p_option as $key => $p_option) {
        //         $value = ServicePointContentPoints::find($key);
        //         if ($value) {
        //             $value->option = $p_option;
        //             $value->save();
        //         }
        //     }
        // }
        return true;
    }

    public static function createData($data)
    {
        $contents = $data->input('titles');
        $servicePointContentId = $contents['service_point_content_id'];
        $titles =  $contents['titles'];
        $existingDatas = Title::where('service_point_content_id', $servicePointContentId)->get();

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

            $title = Title::create([
                'name' => $titleData['title'],
                'service_point_content_id' => $servicePointContentId, // Associate with service point
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
