<?php

namespace App\Models;

use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WhoWeAre extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'who_we_ares';

    protected $fillable = ['title', 'file', 'status','order', 'type'];

    public static function getFullData($data)
    {
        $locationData = getLocationData();

        $value =  SELF::select('title', 'file', 'id', 'status', 'created_at', 'type')->orderBy('order', 'asc');

        return DataTables::of($value)
            ->editColumn('file', function ($row) use($locationData) {
                if($row->type == 1)
                    return $locationData['storage_server_path'].$locationData['storage_image_path'].$row->file;
                else
                    return $locationData['storage_server_path'].$locationData['storage_video_path'].$row->file;

            })
            ->addColumn('can_delete', function ($row) {
                return Gate::allows('who-we-are-delete');
            })
            ->addColumn('can_edit', function ($row) {
                return Gate::allows('who-we-are-edit'); })
            ->addIndexColumn()
            ->rawColumns(['action', 'edit', 'delete'])
            ->make(true);
    }

    public static function createData($data)
    {
        $value = new WhoWeAre;
        $value->title  = $data->title;
        $value->type        = $data->type;

        if ($data->file) {

            $mimeType = $data->file->getMimeType();

            if(str_starts_with($mimeType, 'image/')){

                $value->file = Cms::storeImage($data->file, $data->title);
                $value->type = 1;
            }
            else{

                $value->file = Cms::storeVideo($data->file, $data->title);
                $value->type = 2;
            }
        };

        $value->status       = 1;
        return $value->save();
    }

    public static function getData($id)
    {
        return SELF::find($id);
    }

    public static function updateData($data)
    {
        $value = WhoWeAre::find($data->who_we_are_id);
        $value->title        = $data->title;

        if ($data->file) {

            $mimeType = $data->file->getMimeType();

            if(str_starts_with($mimeType, 'image/')){

                $value->file = Cms::storeImage($data->file, $data->title);
                $value->type = 1;
            }
            else{

                $value->file = Cms::storeVideo($data->file, $data->title);
                $value->type = 2;
            }
        };

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

    public static function getFullDataForHome(){

        return SELF::select('file','id','title','type')->orderBy('order','asc')->where('status',1)->get();
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
