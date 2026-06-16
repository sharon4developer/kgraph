<?php

namespace App\Models;

use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Yajra\DataTables\Facades\DataTables;
use Str;

class Resource extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'resources';

    protected $fillable = ['category_id', 'title', 'slug', 'date', 'time', 'excerpt', 'description', 'image', 'intervention_image', 'status', 'order', 'alt_tag'];

    public function Seo()
    {
        return $this->hasOne(ResourceSeo::class);
    }

    public function Category()
    {
        return $this->belongsTo(ResourceCategory::class, 'category_id');
    }

    public static function getFullData($data)
    {
        $locationData = getLocationData();

        $value = SELF::with('Category')->select('title', 'category_id', 'date', 'image', 'id', 'status', 'created_at', 'time')
            ->orderBy('order', 'asc');

        return DataTables::of($value)
            ->editColumn('image', function ($row) use ($locationData) {
                return $locationData['storage_server_path'] . $locationData['storage_image_path'] . $row->image;
            })
            ->addColumn('category', function ($row) {
                return $row->Category->name ?? '-';
            })
            ->editColumn('date', function ($row) {
                return $row->date . ' ' . $row->time;
            })
            ->addColumn('can_delete', function ($row) {
                return Gate::allows('resources-delete');
            })
            ->addColumn('can_edit', function ($row) {
                return Gate::allows('resources-edit');
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'edit', 'delete'])
            ->make(true);
    }

    public static function createData($data)
    {
        $value = new Resource;
        $value->title = $data->title;
        $value->category_id = $data->category_id;
        $value->description = $data->description;
        $value->excerpt = $data->excerpt;
        $value->date = $data->date;
        $value->time = $data->time;

        $slug = Str::slug($data->title);
        $originalSlug = $slug;
        $count = 1;
        while (Resource::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }
        $value->slug = $slug;
        $value->alt_tag = $data->alt_tag;
        if ($data->image) {
            $value->image = Cms::storeImage($data->image, $data->title);
            $value->intervention_image = $value->image;
        };
        $value->status = 1;
        return $value->save();
    }

    public static function getData($id)
    {
        return SELF::find($id);
    }

    public static function updateData($data)
    {
        $value = Resource::find($data->resource_id);
        $value->title = $data->title;
        $value->category_id = $data->category_id;
        $value->description = $data->description;
        $value->excerpt = $data->excerpt;
        $value->date = $data->date;
        $value->time = $data->time;
        $value->alt_tag = $data->alt_tag;
        if ($data->image) {
            $value->image = Cms::storeImage($data->image, $data->title);
            $value->intervention_image = $value->image;
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

    public static function getFullDataForHome()
    {
        return SELF::with('Category')->select('image', 'id', 'title', 'description', 'excerpt', 'date', 'time', 'category_id', 'alt_tag', 'slug')
            ->orderBy('order', 'asc')->where('status', 1)->get();
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
