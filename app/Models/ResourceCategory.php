<?php

namespace App\Models;

use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Yajra\DataTables\Facades\DataTables;
use Str;

class ResourceCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'resource_categories';

    protected $fillable = ['name', 'slug', 'status', 'order'];

    public function Resources()
    {
        return $this->hasMany(Resource::class, 'category_id');
    }

    public static function getFullData($data)
    {
        $value = SELF::select('name', 'slug', 'id', 'status', 'created_at')->orderBy('order', 'asc');

        return DataTables::of($value)
            ->addColumn('can_delete', function ($row) {
                return Gate::allows('resource-categories-delete');
            })
            ->addColumn('can_edit', function ($row) {
                return Gate::allows('resource-categories-edit');
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'edit', 'delete'])
            ->make(true);
    }

    public static function createData($data)
    {
        $value = new ResourceCategory;
        $value->name = $data->name;

        $slug = Str::slug($data->name);
        $originalSlug = $slug;
        $count = 1;
        while (ResourceCategory::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }
        $value->slug = $slug;
        $value->status = 1;
        return $value->save();
    }

    public static function getData($id)
    {
        return SELF::find($id);
    }

    public static function updateData($data)
    {
        $value = ResourceCategory::find($data->resource_category_id);
        $value->name = $data->name;
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

    public static function getActiveCategories()
    {
        return SELF::select('id', 'name', 'slug')->where('status', 1)->orderBy('order', 'asc')->get();
    }
}
