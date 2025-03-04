<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Gate;
use Str;

class Link extends Model
{
    use HasFactory;

    protected $table = 'links';

    protected $fillable = ['title', 'description', 'slug', 'status', 'order'];

    public static function getFullData($data)
    {
        $locationData = getLocationData();

        $value =  SELF::select('title', 'id', 'status', 'created_at')->orderBy('created_at', 'desc');

        return DataTables::of($value)
            ->addColumn('can_delete', function ($row) {
                return Gate::allows('links-delete');
            })
            ->addColumn('can_edit', function ($row) {
                return Gate::allows('links-edit');
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }



    public static function createData($data)
    {
        $value = new Link;
        $slug = Str::slug($data->title);
        $count = 1;
        $originalSlug = $slug;
        while (Link::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }
        $value->slug = $slug;
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
        $value = Link::find($data->table_id);
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

    // public static function updateOrder($data)
    // {
    //     foreach ($data->order as $key => $value) {
    //         $step = SELF::find($value['id']);
    //         if ($step) {
    //             $step->order = $key;
    //             $step->save();
    //         }
    //     }
    //     return true;
    // }

    public static function getDataForHome($slug)
    {
        return SELF::where('status', 1)->where('slug', $slug)->first(['title', 'description', 'slug', 'id']);
    }
}
